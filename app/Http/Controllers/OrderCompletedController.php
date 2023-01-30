<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\models\Order;
 use App\models\Order_Product;
 use App\models\Customer;
use \Illuminate\Support\Facades\Auth;


class OrderCompletedController extends Controller
{
    //
    public function index()
    {
        if(Auth::check()){

            $completedorders = Order::all()->where('orderstatus', '=', 2);
           
            return view('admin.completed.admincompleted')->with('completedorders',$completedorders); 
        } else
            return view('auth.login');
    }
    public function show($id)
    {
        if (Auth::check()) {
            
            
            $order = Order::findOrFail($id);
            $customer_id = $order->customer_id;            
            $products = Order_Product::get()->where('order_id', $id);

            $customer = Customer::findOrFail($customer_id);
            
            return view('admin.completed.showcompleted', compact('order', 'products', 'customer'));
        }
        else return view('auth.login');
    }
}
