<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk; // Import model BarangMasuk
use App\Models\BarangKeluar; // Import model BarangKeluar
use App\Models\LaporanBarangKeluar;
use App\Models\LaporanBarangMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class LaporanController extends Controller
{
    public function index()
    {
        // dd(LaporanBarangMasuk::all());
        $dataBarangMasuk = LaporanBarangMasuk::all();
        $dataBarangKeluar = LaporanBarangKeluar::all();

        return view('laporan.index', compact('dataBarangMasuk', 'dataBarangKeluar'));
    }

}
