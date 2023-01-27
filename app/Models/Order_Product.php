<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_Product extends Model
{
    use HasFactory;
    public $table = 'order_Products';
    public function order(){
        {
            return $this->belongsTo('App\Models\Order', 'id');
        }
    }
    public function products(){
        return $this->hasMany('App\Models\Products','id');
    }
    protected $fillable = ['order_id','product_id', 'name', 'price', 'quantity'];


}
