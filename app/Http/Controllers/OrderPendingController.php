<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\models\Order;
 use App\models\Order_Product;
 use App\models\Customer;
use \Illuminate\Support\Facades\Auth;


class OrderPendingController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $pendingorders = Order::all()->where('orderstatus', '=', 1);

            return view('admin.pending.adminpending')->with('pendingorders', $pendingorders);
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
            
            return view('admin.pending.showpending', compact('order', 'products', 'customer'));
        }
        else return view('auth.login');
    }
}
