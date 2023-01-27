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
    protected $fillable = ['name', 'photo', 'description', 'ingredients', 'allergens', 'stock', 'price', 'category_id'];


}
