<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\LaporanBarangKeluar;
use App\Models\LaporanBarangMasuk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    // Menampilkan data barang keluar
    public function index()
    {
        $data = BarangKeluar::paginate(10);
        return view('barang_keluar.index', compact('data'));
    }

    
    public function create()
    {
        return view('barang_keluar.create');
    }

  
    public function store(Request $request)
    {
    // Validasi input
    $request->validate([
        'tanggal_keluar' => 'required',
        'nama_barang' => 'required',
        'jumlah_keluar' => 'required|integer|min:1', 
        'jumlah_stock' => 'required|integer|min:0',
    ]);
    
    // Ambil data produk dari database berdasarkan nama barang yang diterima dari halaman checkout
    $product = Product::where('nama_barang', $request->nama_barang)->first();

    if ($product) {
        // Jika produk ditemukan, gunakan harga_satuan dari produk tersebut
        $harga_satuan = $product->price;

        // Membuat entri baru dalam tabel BarangKeluar
        $barangKeluar = BarangKeluar::create([
            'tanggal_keluar' => $request->tanggal_keluar,
            'kode_barang' => $product->product_code,
            'nama_barang' => $request->nama_barang,
            'jumlah_keluar' => $request->jumlah_keluar,
            'jumlah_stock' => $request->jumlah_stock,
            'harga_satuan' => $harga_satuan,
        ]);

        $user = Auth::user();
        $cartItems = $user->cart;
        $totalHargaProduk = 0;
        $totalOngkosKirim = 0;

        // Hitung total harga produk
        foreach ($cartItems as $item) {
            $subtotal = $item->product->price * $item->quantity;
            $totalHargaProduk += $subtotal; // Menambahkan subtotal ke total harga produk
        }

        // Hitung total ongkos kirim (misalnya menghitung 10% dari total harga produk)
        $totalOngkosKirim = $totalHargaProduk * 0.1;

        // Hitung grand total
        $grandTotal = $totalHargaProduk + $totalOngkosKirim;

        LaporanBarangKeluar::create([
            'nama' => $user->name,
            'tanggal_keluar' => $barangKeluar->tanggal_keluar,
            'kode_barang' => $barangKeluar->kode_barang,
            'nama_barang' => $barangKeluar->nama_barang,
            'stock_keluar' => $barangKeluar->jumlah_keluar,
            'total_belanja' => $grandTotal,
        ]);
        
        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Keluar berhasil ditambahkan');
    } else {
        // Jika produk tidak ditemukan, kembalikan dengan pesan kesalahan
        return redirect()->back()->with('error', 'Produk tidak ditemukan');
    }
    }

}