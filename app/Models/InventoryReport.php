<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tanggal',
        'nama_barang',
        'harga',
        'total_barang',
        'total_harga'
        
    ];
    protected $table = 'inventory_reports';
    public $timestamps = false;
}
