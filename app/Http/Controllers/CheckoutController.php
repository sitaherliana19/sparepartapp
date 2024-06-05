<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->cart;
        $totalHargaProduk = 0;

        // Hitung total harga produk
        foreach ($cartItems as $item) {
            $subtotal = floatval(preg_replace("/[^0-9.]/", "", $item['price'])) * $item['quantity'];
            $totalHargaProduk += $subtotal;
        }

        // Hitung total ongkos kirim (misalnya saya menghitung 10% dari total harga produk)
        $totalOngkosKirim = $totalHargaProduk * 0.1;

        return view('checkout.index', compact('cartItems', 'user', 'totalHargaProduk', 'totalOngkosKirim'));
    }

    public function process(Request $request)
    {
    $request->validate([
        'address' => 'required|string',
        'city' => 'required|string',
        'postal_code' => 'required|string',
    ]);

    $user = Auth::user();
    $cartItems = $user->cart;
    $totalHargaProduk = 0;

    // Cek stok produk dan simpan data ke dalam tabel barang keluar
    foreach ($cartItems as $item) {
        $product = Product::find($item['product_id']);
        if ($product && $product->stock >= $item['quantity']) {
            // Ambil harga satuan dari produk
            $harga_satuan = $product->price;

            // Buat entri baru dalam tabel BarangKeluar
            BarangKeluar::create([
                'tanggal_keluar' => now(),
                'kode_barang' => $product->product_code,
                'nama_barang' => $product->title,
                'jumlah_keluar' => $item['quantity'],
                'jumlah_stock' => $product->stock,
                'harga_satuan' => $harga_satuan,
            ]);
        } else {
            // Jika stok tidak mencukupi, kembalikan dengan pesan kesalahan
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk ' . $product->title);
        }
    }

    // Hitung total harga produk
    foreach ($cartItems as $item) {
        $subtotal = floatval(preg_replace("/[^0-9.]/", "", $item['price'])) * $item['quantity'];
        $totalHargaProduk += $subtotal;
    }

    // Hitung total ongkos kirim (misalnya saya menghitung 10% dari total harga produk)
    $totalOngkosKirim = $totalHargaProduk * 0.1;

    // Hitung grand total
    $grandtotal = $totalHargaProduk + $totalOngkosKirim;

    // Simpan grand total dalam sesi
    session()->put('grandtotal', $grandtotal);

    // Buat transaksi baru untuk setiap item di keranjang
    foreach ($cartItems as $item) {
        $product = Product::find($item['product_id']);
        if ($product) {
            // Hitung total price dari setiap pesanan sebagai jumlah dari totalHargaProduk dan totalOngkosKirim
            $total_price = $totalHargaProduk + $totalOngkosKirim;

            Transaction::create([
                'user_id' => $user->id,
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal_code'),
                'total_price' => $total_price,
                'product_code' => $product->product_code,
                'product_name' => $product->title,
            ]);

            // Buat pesanan baru
            $order = new Order();
            $order->address = $request->input('address');
            $order->city = $request->input('city');
            $order->postal_code = $request->input('postal_code');
            $order->user_id = $user->id;
            $order->product_id = $item->product_id;
            $order->product_name = $product->title;
            $order->quantity = $item->quantity;
            $order->total_price = $total_price; // Menggunakan total_price yang sudah dihitung
            $order->status = 'belum dibayar';

            // Simpan pesanan ke database
            $order->save();

            // Kurangi stok produk
            $product->stock -= $item['quantity'];
            $product->save();
        }
    }

    // Hapus keranjang setelah transaksi
    $user->cart()->delete();

    return redirect()->route('pesanan.index')->with('success', 'Pesanan Anda Telah Berhasil Dibuat');
    }



}

