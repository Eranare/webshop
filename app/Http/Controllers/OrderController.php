<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\models\Order;
class OrderController extends Controller
{

    public function showPending(){
        $orders = Order::findOrFail('orderstatus' === 0);
        return view('admin.pending')->with('orders', $orders);
    }
    //
}
