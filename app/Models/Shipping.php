<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'shipping_name', 'id_users', 'shipping_address', 'shipping_phone', 'shipping_email', 'shipping_method', 'shipping_note', 'created_at', 'update_at'
    ];
    protected $primaryKey = 'id_shipping';
    protected $table = 'shipping';
}
