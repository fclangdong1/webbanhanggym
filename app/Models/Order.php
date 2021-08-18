<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'payment_id', 'id_users', 'id_shipping', 'order_status', 'order_total', 'order_date'
    ];
    protected $primaryKey = 'id_order';
    protected $table = 'order';
}
