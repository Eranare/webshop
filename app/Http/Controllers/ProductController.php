<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $products = Product::all();
            $category = Category::all();
            return view('shop.index')->with('products',$products)->with('categories', $category); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //
                $product = Product::create($request->except('_token'));
                $path = $request->file('photo')->store('photos', 'public');
                $product->photo = $path;
                $product->save();
                return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Product::findOrFail($id);
        //$prodcat = $product->category_id;
        $category = Category::findOrFail($product->category_id);
        return view('shop.product', ['product' => $product, 'category' =>$category]);
    }
/*
    public function showProduct($id, $category_id)
    {
        $product = Product::findOrFail($id);
        $category = Category::findOrFail($category_id);
        return view('shop.product', compact(['product', 'category']));
    }
  */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
