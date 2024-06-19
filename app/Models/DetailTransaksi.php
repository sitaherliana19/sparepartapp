<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'id_transaksi',
        'no_transaksi',
        'nama',
        'alamat',
        'nama_produk',
        'jumlah',
        'tracking_number',
        'total',
        'status',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'no_transaksi', 'no_transaksi');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'nama_produk', 'title');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
