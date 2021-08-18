<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_products', 'id_orders', 'oders_code', 'product_coupon', 'product_name', 'product_price', 'product_quantity', 'created_at', 'update_at'
    ];
    protected $primaryKey = 'id_order_details';
    protected $table = 'order_details';
}
