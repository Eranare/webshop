<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\models\Order;

use \Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param int $orderstatus
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::check()) {
        $pendingorders = Order::all()->where('orderstatus', '=', 1);

        return view('admin.pending.adminpending')->with('pendingorders',$pendingorders); 
       }
       else return view('auth.login');
    }

    public function setCompleted(){

    }
    public function setCancelled(){
        
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.pending.showpending', compact('order'));
    }

}

