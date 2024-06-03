<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Product;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    // Menampilkan data barang keluar
    public function index()
    {
        $data = BarangKeluar::paginate(10);
        return view('barang_keluar.index', compact('data'));
    }

    // Menampilkan halaman form untuk input data barang keluar
    public function create()
    {
        return view('barang_keluar.create');
    }

    // Menyimpan data barang keluar yang diinputkan oleh pengguna
    public function store(Request $request)
    {
    // Validasi input
    $request->validate([
        'tanggal_keluar' => 'required',
        'nama_barang' => 'required',
        'jumlah_keluar' => 'required|integer|min:1', // Minimal 1 barang harus keluar
        'jumlah_stock' => 'required|integer|min:0',
    ]);
    
    // Ambil data produk dari database berdasarkan nama barang yang diterima dari halaman checkout
    $product = Product::where('nama_barang', $request->nama_barang)->first();

    if ($product) {
        // Jika produk ditemukan, gunakan harga_satuan dari produk tersebut
        $harga_satuan = $product->price;

        // Membuat entri baru dalam tabel BarangKeluar
        BarangKeluar::create([
            'tanggal_keluar' => $request->tanggal_keluar,
            'kode_barang' => $product->product_code,
            'nama_barang' => $request->nama_barang,
            'jumlah_keluar' => $request->jumlah_keluar,
            'jumlah_stock' => $request->jumlah_stock,
            'harga_satuan' => $harga_satuan,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Keluar berhasil ditambahkan');
    } else {
        // Jika produk tidak ditemukan, kembalikan dengan pesan kesalahan
        return redirect()->back()->with('error', 'Produk tidak ditemukan');
    }
    }

}