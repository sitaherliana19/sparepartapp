<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil data pesanan dari pengguna yang sedang login
        $user = Auth::user();
        $transaksis = Transaksi::with('detailTransaksi')
            ->where('nama', $user->name)
            ->get();
        $snapToken = session('snapToken');
        $transaksi = session('transaksi');

        return view('pesanan.index', compact('snapToken', 'transaksis', 'user'));
    }

    public function getOrderStatus(Request $request)
    {
        $user = Auth::user();
        
        // Ambil status pesanan berdasarkan nama pengguna
        $detailTransaksi = DetailTransaksi::whereHas('transaksi', function($query) use ($user) {
            $query->where('nama', $user->name);
        })->get(['id', 'status', 'tracking_number']);

        return response()->json($detailTransaksi);
    }

    public function update(Request $request, DetailTransaksi $detailTransaksi)
    {
        $request->validate([
            'status' => 'required|string',
            'tracking_number' => 'nullable|string'
        ]);

        $detailTransaksi->status = $request->input('status');
        $detailTransaksi->tracking_number = $request->input('tracking_number');
        $detailTransaksi->save();

        return redirect()->route('data_pesanan.index')->with('success', 'Status dan nomor resi berhasil diperbarui');
    }
}
