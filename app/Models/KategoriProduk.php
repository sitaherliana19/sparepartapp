<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'nama_kategori',
        'kode_tag_kategori',
    ];

    protected $table = 'kategori_produks';
    public $timestamps = false;
}
