<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuks';
    protected $fillable = [
        'id',
        'tanggal_masuk',
        'kode_barang',
        'nama_barang',
        'jumlah_masuk',
        'jumlah_stock',
        'harga_satuan'
    ];

    public $timestamps = false;
}
