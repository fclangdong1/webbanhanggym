<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'comment', 'comment_name', 'comment_date', 'id_products'
    ];
    protected $primaryKey = 'id_comment';
    protected $table = 'comment';

    // public function product()
    // {
    //     return $this->belongsTo('App\Product', 'comment_product_id');
    // }
}
