<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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

     //  total ongkos kirim (misalnya saya menghitung 10% dari total harga produk)
     $totalOngkosKirim = $totalHargaProduk * 0.1; 

    return view('checkout.index', compact('cartItems', 'user', 'totalHargaProduk', 'totalOngkosKirim', ));
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

    // Hitung total harga produk
    foreach ($cartItems as $item) {
        $subtotal = floatval(preg_replace("/[^0-9.]/", "", $item['price'])) * $item['quantity'];
        $totalHargaProduk += $subtotal;
    }

    //  total ongkos kirim (misalnya saya menghitung 10% dari total harga produk)
    $totalOngkosKirim = $totalHargaProduk * 0.1; 

    // subtotal 
    $grandtotal = $totalHargaProduk + $totalOngkosKirim;

    // Buat transaksi baru
    $transaksi = Transaction::create([
        'user_id' => $user->id,
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'postal_code' => $request->input('postal_code'),
        'total_price' => $grandtotal,
    ]);

    // Hapus keranjang setelah transaksi
    session()->forget('cart');

    return redirect()->route('checkout.index')->with('success', 'Pembayaran berhasil dilakukan.');
    }

}
