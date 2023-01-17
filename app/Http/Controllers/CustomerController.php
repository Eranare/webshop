<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;

class CustomerController extends Controller
{
    //

    public function customerStore(Request $request){
        {
            Customer::add([
                
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone1'=>$request->phone1,
                'phone2'=>$request->phone2,
                'email'=>$request->email,
                'address1' => $request->address1,
                'house_number1'=>$request->house_number1,
                'postal_code1'=>$request->postal_code1,
                'city1'=>$request->city1,
                'address2'=>$request->address2,
                'house_number2'=>$request->house_number2,
                'postal_code2'=>$request->postal_code2,
                'city2'=>$request->city2,
            ]);
            //session()->flash('success', 'Product is Added to Cart Successfully !');

            //Redirect to payment confirm
    
            //return redirect()->route('cart.list');
        }
    }
}
