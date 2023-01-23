<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Order;
use \Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('admin.main');
        } 
        else return view('auth.login');
    }

    public function showPending(){

    }

    public function showOrders(){

    }

    public function showStatistics(){
        if(Auth::check()){
            $orders = Order::all();
            return view('admin.statistics')->with('orders', $orders);
        }
        else 
            return view('auth.login');
    }
}
