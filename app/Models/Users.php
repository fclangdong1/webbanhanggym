<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_role', 'fullname', 'email', 'password', 'phone', 'address'
    ];
    protected $primaryKey = 'id_users';
    protected $table = 'users';
}
