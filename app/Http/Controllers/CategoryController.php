<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('shop.index')->with('categories',$categories); 
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
        {
        //
        $category = Category::create($request->except('_token'));
        $path = $request->file('photo')->store('photos', 'public');

        $category->photo = $path;

        $category->save();

        return redirect()->route('shop.index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            //
            $category = Category::findOrFail($id);
            return view('shop.category', ['category' => $category]);
        }
    }
    /**
     * 
     * 
     * @param mixed $id
     * @return \Illuminate\Http\Response
     */
    public function productshow($id){
        $category = Category::findOrFail($id);
        return view('shop.product', ['category' => $category]);
    }

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
    /*
    public function getCategory($category) {
        $singleCategory = Category::find($category);
        return view('shop.category', ['category' => $singleCategory]);
    } */
}
