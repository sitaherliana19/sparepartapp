<?php

namespace App\Http\Controllers;

use App\Models\DataPelanggan;
use Illuminate\Http\Request;

class DataPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;

        if (strlen($katakunci)) {
            $data = DataPelanggan::where('nama_pelanggan', 'like', '%'.$katakunci.'%')
                ->orWhere('nama_pelanggan', 'like', '%'.$katakunci.'%')
                ->paginate($jumlahbaris);        
        } else {
            $data = DataPelanggan::orderBy('id', 'desc')->paginate($jumlahbaris);
        }

        return view('data_pelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
        ];

        DataPelanggan::create($data);

        return redirect()->route('data_pelanggan.index')->with('success', 'Data Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DataPelanggan::find($id); 
        return view('data_pelanggan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
        ];

        DataPelanggan::where('id', $id)->update($data); 

        return redirect()->route('data_pelanggan.index')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataPelanggan::destroy($id); 

        return redirect()->route('data_pelanggan.index')->with('success', 'Berhasil menghapus data');
    }
}
