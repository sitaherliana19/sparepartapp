<?php

namespace App\Http\Controllers;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BarangKeluarController extends Controller
{
    public function index()
    {
        $data = BarangKeluar::paginate(10);
       
        return view('barang_keluar.index', compact('data'));
    }

    // Menampilkan halaman create
    public function create()
    {
        // Mengirimkan view create.blade.php di dalam folder barang_masuk
        return view('barang_keluar.create');
    }

    public function store(Request $request)
    {

            Session::flash('id',$request->id);    
            Session::flash('tanggal_keluar',$request->tanggal_keluar);
            Session::flash('kode_barang',$request->kode_barang);
            Session::flash('nama_barang',$request->nama_barang);
            Session::flash('jumlah_keluar',$request->jumlah_keluar);
            Session::flash('jumlah_stock',$request->jumlah_stock);
            Session::flash('harga_satuan',$request->harga_satuan);

            $data =[
                'id' =>$request->id,
                'tanggal_keluar'=>$request->tanggal_keluar,
                'kode_barang'=>$request->kode_barang,
                'nama_barang'=>$request->nama_barang,
                'jumlah_keluar'=>$request->jumlah_keluar,
                'jumlah_stock'=>$request->jumlah_stock,
                'harga_satuan'=>$request->harga_satuan,
            ];
            // Proses penyimpanan data baru
            BarangKeluar::create($data);

            // Redirect ke halaman utama dengan pesan sukses
            return redirect()->route('barang_keluar.index')->with('success', 'Data Barang Masuk berhasil ditambahkan');
    }
}
