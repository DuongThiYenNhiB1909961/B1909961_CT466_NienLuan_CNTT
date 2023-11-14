<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vnpay extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'vnp_Amount','vnp_BankCode','vnp_BankTranNo','vnp_CardType','vnp_OrderInfo','vnp_PayDate','vnp_ResponseCode','vnp_TmnCode','vnp_TransactionNo','vnp_TransactionStatus','vnp_TxnRef','vnp_SecureHash'
    ];
    protected $primaryKey = 'vnp_id';
 	protected $table = 'tb_vnpay';
}
