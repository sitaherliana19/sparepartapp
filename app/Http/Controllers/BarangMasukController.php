<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
use App\Models\LaporanBarangMasuk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data = BarangMasuk::paginate(10);
       
        return view('barang_masuk.index', compact('data'));
    }

    // Menampilkan halaman create
    public function create()
    {
        // Mengirimkan view create.blade.php di dalam folder barang_masuk
        return view('barang_masuk.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'tanggal_masuk' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah_masuk' => 'required|integer',
            'harga_satuan' => 'required',
        ]);
        
        // Periksa apakah produk sudah ada
        $product = Product::where('product_code', $request->kode_barang)->first();


        if ($product) {
            // Jika stok produk 0, update stok dengan jumlah masuk baru
            if ($product->stock == 0) {
                $stoksekarang = $request->jumlah_masuk;
                $product->update([
                    'stok' => $request->jumlah_masuk,
                ]);
                
                
            } else {
                $stoksekarang = $product->stock + $request->jumlah_masuk;
                // Jika stok produk tidak 0, tambahkan stok yang sudah ada dengan stok masuk baru
                $product->update([
                    'stok' => $product->stok + $request->jumlah_masuk,
                ]);
            }
        }
        $data = [
            'tanggal_masuk' => $request->tanggal_masuk,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_masuk' => $request->jumlah_masuk,
            'jumlah_stock' => $stoksekarang,
            'harga_satuan' => $request->harga_satuan,
        ];

        BarangMasuk::create($data);
    
        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('barang_masuk.index')->with('success', 'Data Barang Masuk berhasil ditambahkan');
    }
}
