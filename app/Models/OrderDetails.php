<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_code', 'product_id', 'product_name','product_price','product_sales_quantity','coupon','feeship'
    ];
    protected $primaryKey = 'order_details_id';
    protected $table = 'tb_order_details';
}
