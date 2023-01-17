<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function Customer_Order(){
        {
            return $this->belongsTo('App\Models\Customer_Order', 'id');
        }
    }
}
