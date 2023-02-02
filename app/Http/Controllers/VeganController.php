<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
class VeganController extends Controller
{
    //
    public function index()
    {
        //
        $veganproducts = Product::all()->where('vegan', 1);

        $discounts = Discount::all();
        return view('shop.vegan')->with('veganproducts',$veganproducts)->with('discounts', $discounts); 

    }
}
