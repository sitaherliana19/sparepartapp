<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryReport;
use Illuminate\Support\Facades\Session;

class InventoryReportController extends Controller
{
    public function index(Request $request)
    {
        $jumlahbaris = 5;
        $data = InventoryReport::paginate($jumlahbaris);
    
        return view('inventory_reports.index', compact('data'));
    }
    public function create()
    {
        return view('inventory_reports.create');
    }

    public function store(Request $request)
    {
        Session::flash('id',$request->id);
        Session::flash('tanggal',$request->tanggal);
        Session::flash('nama_barang',$request->nama_barang);
        Session::flash('harga',$request->harga);
        Session::flash('total_barang',$request->total_barang);
        Session::flash('total_harga',$request->total_harga);

        $data =[
            'id' =>$request->id,
            'tanggal'=>$request->tanggal,
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'total_barang'=>$request->total_barang,
            'total_harga'=>$request->total_harga,
        ];
        InventoryReport::create($data);

        return redirect()->to('InventoryReport')->with('sucess', 'Berhasil menambahkan data');
    }

    public function show(InventoryReport $inventoryReport)
    {
        return view('inventory_reports.show', compact('inventoryReport'));
    }

    public function edit(InventoryReport $inventoryReport)
    {
        return view('inventory_reports.edit', compact('inventoryReport'));
    }

    public function update(Request $request, InventoryReport $inventoryReport)
    {
        $data =[
            'id' =>$request->id,
            'tanggal'=>$request->tanggal,
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'total_barang'=>$request->total_barang,
            'total_harga'=>$request->total_harga,
        ];

        InventoryReport::create($data);

        return redirect()->to('InventoryReport')->with('sucess', 'Berhasil menambahkan data');
    }

    public function destroy(InventoryReport $inventoryReport)
    {
        $inventoryReport->delete();

        return redirect()->route('inventory_reports.index')->with('success', 'Berhasil menghapus data');
    }
}
