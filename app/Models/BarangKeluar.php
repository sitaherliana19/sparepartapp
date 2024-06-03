<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluars';
    protected $fillable = [
        'id',
        'tanggal_keluar',
        'kode_barang',
        'nama_barang',
        'jumlah_keluar',
        'jumlah_stock',
        'harga_satuan'
    ];

    public $timestamps = false;
    
}
