<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_handphone',
        'jumlah_belanja',
    ];
}
