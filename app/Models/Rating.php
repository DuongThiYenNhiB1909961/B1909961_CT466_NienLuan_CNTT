<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'rating', 'product_id'
    ];
    protected $primaryKey = 'rating_id';
    protected $table = 'tb_rating';
}
