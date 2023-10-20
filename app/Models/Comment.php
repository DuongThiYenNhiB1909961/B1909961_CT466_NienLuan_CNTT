<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'comment_content', 'comment_name', 'comment_date','product_id', 'comment_status', 'comment_parent_cmt'
    ];
    protected $primaryKey = 'comment_id';
    protected $table = 'tb_comment';

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
