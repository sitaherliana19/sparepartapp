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
            $subtotal = $item->product->price * $item->quantity;
            $totalHargaProduk = $subtotal;
        }

        // Total ongkos kirim (misalnya saya menghitung 10% dari total harga produk)
        $totalOngkosKirim = $totalHargaProduk * 0.1;

        $grandTotal = $totalHargaProduk + $totalOngkosKirim;

        return view('checkout.index', compact('cartItems', 'user', 'totalHargaProduk', 'totalOngkosKirim'));
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        $address = $user->alamat;
        $cartItems = $user->cart;
        $totalHargaProduk = 0;

        // Cek stok produk dan simpan data ke dalam tabel barang keluar
        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product && $product->stock >= $item->quantity) {
                $harga_satuan = $product->price;

                // Buat data baru untuk tabel BarangKeluar
                BarangKeluar::create([
                    'tanggal_keluar' => now(),
                    'kode_barang' => $product->product_code,
                    'nama_barang' => $product->title,
                    'jumlah_keluar' => $item->quantity,
                    'jumlah_stock' => $product->stock,
                    'harga_satuan' => $harga_satuan,
                ]);
            } else {
                // Jika stok tidak mencukupi
                return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk ' . $product->title);
            }
        }

        // Hitung total harga produk
        foreach ($cartItems as $item) {
            $subtotal = $item->product->price * $item->quantity;
            $totalHargaProduk = $subtotal;
        }

        // Hitung total ongkos kirim (misalnya saya menghitung 10% dari total harga produk)
        $totalOngkosKirim = $totalHargaProduk * 0.1;

        // Hitung grand total
        $grandTotal = $totalHargaProduk + $totalOngkosKirim;


        // Buat transaksi baru dari setiap item di keranjang
        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                // Hitung total price = total harga produk + ongkos kirim
                $grandTotal= $totalHargaProduk + $totalOngkosKirim;

                Transaction::create([
                    'user_id' => $user->id,
                    'address' => $address,
                    'total_price' => $grandTotal,
                    'product_code' => $product->product_code,
                    'product_name' => $product->title,
                ]);

                // Buat pesanan baru
                $order = new Order();
                $order->address = $address;
                $order->user_id = $user->id;
                $order->product_id = $item->product_id;
                $order->product_name = $product->title;
                $order->quantity = $item->quantity;
                $order->total_price = $grandTotal; 
                $order->status = 'belum dibayar';
                
                $order->save();

                // Kurangi stok produk
                $product->stock -= $item->quantity;
                $product->save();
            }
        }

        // Hapus keranjang setelah transaksi
        $user->cart()->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan Anda Telah Berhasil Dibuat');
    }
}
