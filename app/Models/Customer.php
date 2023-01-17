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
    protected $fillable = ['first_name', 'last_name', 'phone1', 'phone2', 'email', 'address1', 'house_number1', 'postal_code1', 'city1', 'address2', 'house_number2', 'postal_code2', 'city2'];
}
