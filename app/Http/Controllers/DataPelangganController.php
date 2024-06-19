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
            $data = DataPelanggan::where('nama', 'like', '%'.$katakunci.'%')
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:15',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
        ];

        DataPelanggan::create($data);

        return redirect()->route('data_pelanggan.index')->with('success', 'Data Pelanggan Berhasil Ditambahkan');
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'alamat' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:15',
        ]);

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
