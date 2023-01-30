<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\models\Order;
 use App\models\Order_Product;
 use App\models\Customer;
use \Illuminate\Support\Facades\Auth;


class OrderCancelledController extends Controller
{
    //
    public function index()
    {
        if(Auth::check()){

            $cancelledorders = Order::all()->where('orderstatus', '=', 3);
           
            return view('admin.pending.admincancelledd')->with('cancelledorders',$cancelledorders); 
        } else
            return view('auth.login');
    }

    
    public function setCancelled( $id)
    {
        if (Auth::check()) {
            $order=Order::findOrFail($id);
            $order->orderstatus = 3;
            $order->save();
            //$pendingorders = Order::all()->where('orderstatus', '=', 1);

            return redirect()->route('adminpending.index');
            
        
        } 
        else return view('auth.login');
    }
}
