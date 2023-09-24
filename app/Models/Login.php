<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'admin_name', 'admin_email', 'admin_password','admin_phone'
    ];
    protected $primaryKey = 'admin_id';
    protected $table = 'tb_admin';
}
