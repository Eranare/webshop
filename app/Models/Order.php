<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer_Order(){
        {
            return $this->belongsTo('App\Models\Customer_Order', 'id');
        }
    }
}
