<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        // user sudah login yang dapat mengakses
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        // Validasi request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan produk
        $product = Product::findOrFail($request->product_id);

        // buat keranjang pengguna untuk produk 
        $cart = Auth::user()->cart()->where('product_id', $product->id)->first();
        if ($cart) {
            // Jika produk sudah ada di keranjang, perbarui jumlah produk
            $cart->increment('quantity', $request->quantity);
        } else {
            // Jika produk belum ada di keranjang, tambahkan produk baru
            Auth::user()->cart()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function index()
    {
        // Ambil semua item keranjang untuk pengguna yang sedang login
        $cartItems = Auth::user()->cart;

        // Hitung total untuk setiap item dalam keranjang
        foreach ($cartItems as $item) {
            $price = floatval($item->product->price); // Konversi harga produk menjadi float
            $quantity = intval($item->quantity); // Gunakan nilai integer untuk jumlah produk
            $total = $price * $quantity; // Hitung total
        }
        return view('cart.index', compact('cartItems'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:0',
            'selected_products' => 'required|array',
            'selected_products.*' => 'required|integer|exists:products,id',
        ]);

        // Ambil array kuantitas dan id produk terpilih
        $quantities = $request->input('quantity');
        $selectedProductIds = $request->input('selected_products');

        foreach ($selectedProductIds as $index => $productId) {
            // Temukan item keranjang yang akan diperbarui
            $cartItem = Auth::user()->cart()->where('product_id', $productId)->firstOrFail();

            // Perbarui jumlah barang dalam keranjang
            $cartItem->update([
                'quantity' => $quantities[$index],
            ]);

            // Jika jumlah barang 0, hapus item keranjang
            if ($quantities[$index] == 0) {
                $cartItem->delete();
            }
        }

        return redirect()->route('cart.index')->with('success', 'Cart items updated successfully.');
    }

    public function remove($id)
    {
        $cartItem = Auth::user()->cart()->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Barang telah dikeluarkan dari troli.');
        } else {
            return redirect()->back()->with('error', 'Barang tidak ditemukan di keranjang.');
        }
    }
    
}
