<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;

use \Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(Auth::check()){
        $categories = Category::all();
        return view('admin.category.admincategory')->with('categories',$categories); }
      else return view('auth.login');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('admin.category.createcategory');
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
        ]);

        $category = Category::create($request->except('_token'));

        $path = $request->file('photo')->store('photos', 'public');

        $category->photo = $path;

        $category->save();



        return redirect()->route('admincategory.index')
            ->with('success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.showcategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.editcategory', compact('category'));
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
        ]);
        
        $category = Category::findOrFail($id);

        $category->update($request->except('photo'));

        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('photos', 'public');
        
            $category->photo = $path;
        }

        $category->save();

        return redirect()->route('admincategory.index')
            ->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admincategory.index')
                        ->with('success','Category deleted successfully');
    }
}
