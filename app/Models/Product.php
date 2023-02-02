<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';


    public function Category() 
{
    return $this->belongsTo('App\Models\Category', 'id');
}
    public function Discount(){
        return $this->belongsTo('App\Models\Discount', 'id');
    }
    protected $fillable = ['name', 'photo', 'description', 'ingredients', 'vegan', 'stock', 'price', 'discount_id', 'category_id'];


}
