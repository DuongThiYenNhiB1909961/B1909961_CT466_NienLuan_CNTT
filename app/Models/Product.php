<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'category_id', 'brand_id','meta_keywords','product_desc','product_content','product_price','product_qty','product_sold','product_price_buy','product_image','product_status'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tb_product';

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}
