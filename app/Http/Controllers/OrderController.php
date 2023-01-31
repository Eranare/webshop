<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\models\Order;
 use App\models\Order_Product;
 use App\models\Customer;
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

    public function indexPending()
    {
        if(Auth::check()){

            $pendingorders = Order::all()->where('orderstatus', '=', 1);
           
            return view('admin.pending.adminpending')->with('pendingorders',$pendingorders); 
        } else
            return view('auth.login');
    }

    public function indexCompleted()
    {
        if(Auth::check()){

            $completedorders = Order::all()->where('orderstatus', '=', 2);
           
            return view('admin.pending.admincompleted')->with('completedorders',$completedorders); 
        } else
            return view('auth.login');
    }
    
    public function indexCancelled()
    {
        if(Auth::check()){

            $cancelledorders = Order::all()->where('orderstatus', '=', 3);
           
            return view('admin.pending.admincancelledd')->with('cancelledorders',$cancelledorders); 
        } else
            return view('auth.login');
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function setCompleted( $id)
    {
        if (Auth::check()) {
            $order=Order::findOrFail($id);
            if ($order->orderstatus != 3) {
                $order->orderstatus = 2;
                $order->save();
            }
            else{
                session()->flash('succes'."Cant set cancelled to completed");
            }
            //$pendingorders = Order::all()->where('orderstatus', '=', 1);

            return redirect()->route('adminpending.index');
            
        
        } 
        else return view('auth.login');
    }

    public function setCancelled( $id)
     {
            if (Auth::check()) {
                $order = Order::findOrFail($id);
                $order->orderstatus = 3;
                $order->save();
                //$pendingorders = Order::all()->where('orderstatus', '=', 1);

                return redirect()->route('adminpending.index');


            } else
                return view('auth.login');

        }
    

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

