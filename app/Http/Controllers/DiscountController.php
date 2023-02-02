<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Discount;
use App\models\Product;
class DiscountController extends Controller
{
    //

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $discounts = Discount::all();
            $products = Product::all();     
            return view('admin.discounts.admindiscount')->with('discounts',$discounts)->with('products', $products); 
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.discounts.creatediscount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
        $discount = new Discount;
        
        
        $discount->active = $request->input('active');
        $discount->discount = $request->input('discount');






        $discount->save();

        return redirect()->route('discount.index')
            ->with('success', 'discount added successfully');
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.editdiscounts', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'active' => 'required',
            'discount' => 'required',
        ]);
        
        $discount = Discount::findOrFail($id);
        $discount->update($request->all());
        
        $discount->save();

        return redirect()->route('discount.index')
            ->with('success', 'Category updated successfully');
    }
}