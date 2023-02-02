<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class VeganController extends Controller
{
    //
    public function index()
    {
        //
        $veganproducts = Product::all()->where('vegan', 1);
        
        
        return view('shop.vegan')->with('veganproducts',$veganproducts); 
    }
}
