<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'laporan_barang_keluar';
    protected $fillable = [
        'id',
        'nama',
        'tanggal_keluar',
        'kode_barang',
        'nama_barang',
        'stock_keluar',
        'total_belanja'
    ];

    public $timestamps = false;
}
