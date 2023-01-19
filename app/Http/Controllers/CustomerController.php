<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;

class CustomerController extends Controller
{
    //
    public function __construct($session, $events, $instanceName, $session_key, $config)
    {
        $this->events = $events;
        $this->session = $session;
        $this->instanceName = $instanceName;
        $this->sessionKey = $session_key;
        $this->sessionKeyCartItems = $this->sessionKey . '_customerData';
        $this->sessionKeyCartConditions = $this->sessionKey . '_cart_conditions';
        $this->config = $config;
        $this->currentItem = null;
        $this->fireEvent('created');
    }




    public function customerStore(Request $request){
        {
            Customer::add([
                
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email' => $request->email,
                'address1' => $request->address1,
                'house_number1' => $request->house_number1,
                'postal_code1' => $request->postal_code1,
                'city1' => $request->city1,
                'address2' => $request->address2,
                'house_number2' => $request->house_number2,
                'postal_code2' => $request->postal_code2,
                'city2' => $request->city2,
            ]);

            //session()->flash('success', 'Product is Added to Cart Successfully !');
            return redirect()->view('checkout.payment');
            //Redirect to payment confirm
    
            //return redirect()->route('cart.list');
        }

    }

    public function customerStoreSave(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone1' => 'required',
            'email' => 'required',
            'address1' => 'required',
            'house_number1' => 'required',
            'postal_code1' => 'required',
            'city1' => 'required',
        ]);
        
    }

}
