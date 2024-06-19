<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusUpdated;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $detailTransaksi = DetailTransaksi::all();
        return view('data_pesanan.index', compact('detailTransaksi'));
    }
    

    public function updateStatus(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'status' => 'required|in:Pesanan Diterima,Pembayaran Terverifikasi,Pesanan Diproses,Pesanan Dikirim,Pesanan Selesai',
        ]);

        $detailTransaksi->update(['status' => $request->status]);

        broadcast(new OrderStatusUpdated($detailTransaksi));
    
        return redirect()->route('data_pesanan.index')->with('success', 'Status pesanan berhasil diperbarui.');
    }


    public function updateTrackingNumber(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'tracking_number' => 'nullable|string|max:255',
        ]);

        $detailTransaksi->update(['tracking_number' => $request->tracking_number]);

        broadcast(new OrderStatusUpdated($detailTransaksi));

        return redirect()->route('data_pesanan.index')->with('success', 'No. Resi berhasil diperbarui.');
    }

    
}
