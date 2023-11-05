<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'address_ip', 'date_visitor'
    ];
    protected $primaryKey = 'visitor_id';
 	protected $table = 'tb_visitors';
}
