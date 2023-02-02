<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;
use App\models\Discount;

use \Illuminate\Support\Facades\Auth;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::check()) {
        $products = Product::all();
        $categories = Category::all();
        $discounts = Discount::all();
        return view('admin.product.adminproduct')->with('products',$products)->with('categories', $categories)->with('discounts',$discounts); 
       }
       else return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.createproduct')->with('categories',$categories);
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
            'name' => 'required',
            'photo' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $product = Product::create($request->except('_token'));

        $path = $request->file('photo')->store('photos/Products', 'public');


        $product->photo = $path;

        $product->save();

        return redirect()->route('adminproduct.index')
            ->with('success', 'Product added successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $catid = $product->category_id;
        $category = Category::findOrFail($catid);
        $discounts = Discount::all();


        return view('admin.product.showproduct')->with('product',$product)->with('category', $category)->with('discounts',$discounts); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $discounts = Discount::all();
        return view('admin.product.editproduct', compact('product','categories', 'discounts'));
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
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'discount_id' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->update($request->except('discount_id','photo'));
        if($request->discount_id == 'None'){
            
            $product->discount_id = 0;    
        } else
            $product->discount_id = $request->discount_id;
        
        if($request->hasFile('photo')){
        $path = $request->file('photo')->store('photos/Products', 'public');
    
        $product->photo = $path;
    }

        $product->save();

        return redirect()->route('adminproduct.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('adminproduct.index')
                        ->with('success','Product deleted successfully');
    }
}