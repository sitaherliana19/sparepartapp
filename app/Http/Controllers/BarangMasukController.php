<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
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

        // $request->validate([
        //     'tanggal_masuk' => 'required',
        //     'kode_barang' => 'required',
        //     'nama_barang' => 'required',
        //     'jumlah_masuk' => 'required|integer',
        //     'jumlah_stock' => 'required',
        //     'harga_satuan' => 'required',
            
        // ]);

            Session::flash('id',$request->id);    
            Session::flash('tanggal_masuk',$request->tanggal_masuk);
            Session::flash('kode_barang',$request->kode_barang);
            Session::flash('nama_barang',$request->nama_barang);
            Session::flash('jumlah_masuk',$request->jumlah_masuk);
            Session::flash('jumlah_stock',$request->jumlah_stock);
            Session::flash('harga_satuan',$request->harga_satuan);

            $data =[
                'id' =>$request->id,
                'tanggal_masuk'=>$request->tanggal_masuk,
                'kode_barang'=>$request->kode_barang,
                'nama_barang'=>$request->nama_barang,
                'jumlah_masuk'=>$request->jumlah_masuk,
                'jumlah_stock'=>$request->jumlah_stock,
                'harga_satuan'=>$request->harga_satuan,
            ];
            // Proses penyimpanan data baru
            BarangMasuk::create($data);

            // Redirect ke halaman utama dengan pesan sukses
            return redirect()->route('barang_masuk.index')->with('success', 'Data Barang Masuk berhasil ditambahkan');
    }
}