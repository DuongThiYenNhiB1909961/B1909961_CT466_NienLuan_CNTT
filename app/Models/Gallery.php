<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'gallery_name', 'gallery_image', 'product_id'
    ];
    protected $primaryKey = 'gallery_id';
    protected $table = 'tb_gallery';
}
