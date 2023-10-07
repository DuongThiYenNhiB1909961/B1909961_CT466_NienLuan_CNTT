<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'fee_matp', 'fee_maqh','fee_xaid','fee_feeship'
    ];
    protected $primaryKey = 'fee_id';
 	protected $table = 'tb_feeship';

 	public function city(){
 		return $this->belongsTo('App\Models\City', 'fee_matp');
 	}
 	public function district(){
 		return $this->belongsTo('App\Models\District', 'fee_maqh');
 	}
 	public function wards(){
 		return $this->belongsTo('App\Models\Wards', 'fee_xaid');
 	}
}
