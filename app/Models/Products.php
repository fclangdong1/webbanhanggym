<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_brand', 'product_name', 'product_quantity', 'product_slug', 'product_image', 'product_price', 'product_desc', 'product_content', 'product_status', 'id_type'
    ];
    protected $primaryKey = 'id_products';
    protected $table = 'products';
}
