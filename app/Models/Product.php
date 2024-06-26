<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'category_id',
        'price',
        'product_code',
        'stock',
        'description',
        'image',
        
    ];
    protected $table = 'products';
    public $timestamps = false;
}
