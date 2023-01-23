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
    protected $fillable = ['cart', 'customer_id','price','payment_id', 'orderstatus' ];
}
