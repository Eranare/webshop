<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Order extends Model
{
    use HasFactory;

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function customer(){
        return $this->hasmany(Customer::class);
    }
}
