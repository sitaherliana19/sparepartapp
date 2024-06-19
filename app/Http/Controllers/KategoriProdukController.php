<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\Session;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;

        if (strlen($katakunci)) {
            $data = KategoriProduk::where('nama_kategori', 'like', '%'.$katakunci.'%')
                ->orWhere('kode_tag_kategori', 'like', '%'.$katakunci.'%')
                ->paginate($jumlahbaris);        
        } else {
            $data = KategoriProduk::orderBy('id', 'desc')->paginate($jumlahbaris);
        }

        return view('kategori_produk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori_produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'kode_tag_kategori' => 'required',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'kode_tag_kategori' => $request->kode_tag_kategori,
        ];

        // Proses penyimpanan data baru
        KategoriProduk::create($data);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('kategori_produk.index')->with('success', 'Data Barang Masuk berhasil ditambahkan');
    }

    
    public function edit(string $id)
    {
        $data = KategoriProduk::find($id); 
        return view('kategori_produk.edit')->with('data', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'kode_tag_kategori' => 'required',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'kode_tag_kategori' => $request->kode_tag_kategori,
        ];

        KategoriProduk::where('id', $id)->update($data); 

        return redirect()->route('kategori_produk.index')->with('success', 'Berhasil melakukan update data');

    }

   
    public function destroy(string $id)
    {
        KategoriProduk::destroy($id); 
        return redirect()->route('kategori_produk.index')->with('success', 'Berhasil menghapus data');
    }
}
