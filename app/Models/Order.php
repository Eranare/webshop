<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public function customer(){
        {
            return $this->belongsTo('App\Models\Customer', 'id');
        }
    }
    public function orderProducts()
    {
        return $this->hasMany('App\Models\Order_Products','id');
    }
    protected $fillable = ['customer_id','price','payment_id', 'orderstatus' ];
}
