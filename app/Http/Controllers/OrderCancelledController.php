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
           
            return view('admin.cancelled.admincancelled')->with('cancelledorders',$cancelledorders); 
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
    public function show($id)
    {
        if (Auth::check()) {
            
            
            $order = Order::findOrFail($id);
            $customer_id = $order->customer_id;            
            $products = Order_Product::get()->where('order_id', $id);

            $customer = Customer::findOrFail($customer_id);
            
            return view('admin.cancelled.showcancelled', compact('order', 'products', 'customer'));
        }
        else return view('auth.login');
    }
}
