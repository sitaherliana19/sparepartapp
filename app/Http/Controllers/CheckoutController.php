<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DetailTransaksi;
use App\Models\LaporanBarangKeluar;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->cart;
        $totalHargaProduk = 0;
        foreach ($cartItems as $item) {
            $subtotal = $item->quantity * $item->product->price;
            $totalHargaProduk += $subtotal;
        }
        // Menghitung total ongkos kirim sebagai 10% dari total harga produk
        $totalOngkosKirim = $totalHargaProduk * 0.1;
        // Menghitung grand total
        $grandtotal = $totalHargaProduk + $totalOngkosKirim;

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

        // Menghitung total harga produk
        $totalHargaProduk = 0;
        foreach ($cartItems as $item) {
            $subtotal = $item->quantity * $item->product->price;
            $totalHargaProduk += $subtotal;
        }
        // Menghitung total ongkos kirim sebagai 10% dari total harga produk
        $totalOngkosKirim = $totalHargaProduk * 0.1;
        // Menghitung grand total
        $grandtotal = $totalHargaProduk + $totalOngkosKirim;

        $Notransaksi = 'BA-' . strtoupper(uniqid());

        // Membuat transaksi
        $transaksi = Transaksi::create([
            'no_transaksi' => $Notransaksi,
            'nama' => $user->name,
            'tgl_transaksi' => now(),
            'alamat' => $address,
            'jumlah' => $cartItems->sum('quantity'), 
            'nama_produk' => $product->title,
            'total' => $grandtotal,
            'snap_token' => null,
        ]);
        
        $items_details = [];
        $itemId = 1;
       

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $detailTransaksi = DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'no_transaksi' => $Notransaksi,
                    'nama' => $user->name,
                    'alamat' => $address,
                    'nama_produk' => $product->title,
                    'jumlah' => $item->quantity,
                    'tracking_number' => null,
                    'total' => $grandtotal,
                    'status' => 'Pesanan Diterima',
                ]);

                LaporanBarangKeluar::create([
                    'nama' => $user->name,
                    'tanggal_keluar' => now(),
                    'kode_barang' => $product->product_code,
                    'nama_barang' => $product->title,
                    'stock_keluar' => $item->quantity,
                    'total_belanja' => $grandtotal,
                ]);
        
                // Kurangi stok produk
                $product->stock -= $item->quantity;
                $product->save();

                $items_details[] = [
                    'id' => $itemId++,
                    'price' => $product->price,
                    'quantity' => $item->quantity,
                    'name' => $product->title,
                ];
            }
        }

        // Hapus keranjang setelah transaksi
        $user->cart()->delete();
        

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-qdoyJDt-Lm8v9SfTUfJSsH_1';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $Notransaksi,
                'gross_amount' => 1000,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->nomor_handphone,
            ],
            'item_details' => $items_details,
        ];

        $snapToken = Snap::getSnapToken($params);

        $transaksi->snap_token = $snapToken;
        $transaksi->save(); 

        return view('checkout.pay', compact('snapToken', 'transaksi', 'cartItems'));

    }
}
