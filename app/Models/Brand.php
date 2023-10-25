<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'brand_keywords', 'slug_brand_product', 'brand_name', 'brand_desc', 'brand_status'
    ];
    protected $primaryKey = 'brand_id';
 	protected $table = 'tb_brand';
    
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
