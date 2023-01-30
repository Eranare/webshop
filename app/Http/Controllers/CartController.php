<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\models\Order;
use App\models\Product;
use App\models\Order_Product;
class CartController extends Controller
{
    //
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'stock' => $request->stock,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfull !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfull !');

        return redirect()->route('cart.list');
    }
    public function checkOutCart()
    {

        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {
            $id = $item->id;
            $prodstock = Product::findOrFail($id);
            if ($item->quantity > $prodstock->stock) {
                session()->flash('success', 'Error ! Too many '.$item->name.', there should be no more than '.$prodstock->stock.' , you have '.$item->quantity. '!');
                return redirect()->route('cart.list');
            }
            return view('checkout.checkout', compact('cartItems'));
        }
    }

    public function payCart(Request $request){

        //$order = new Order();
        $orderProduct = new Order_Product();
        $cartItems = \Cart::getContent();
        

        $customer = new Customer();
        
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->phone1 = $request->input('phone1'); 
        $customer->phone2 = $request->input('phone2');
        $customer->email = $request->input('email');
        $customer->Address1 = $request->input('address1');
        $customer->house_number1 = $request->input('house_number1');
        $customer->postal_code1 = $request->input('postal_code1');
        $customer->city1 = $request->input('city1');
        $customer->Address2 = $request->input('address2');
        $customer->house_number2 = $request->input('house_number2');
        $customer->postal_code2 = $request->input('postal_code2');
        $customer->city2 = $request->input('city2');
        $customer->save();
        
        $customer_id=$customer->id;
 

        $order= Order::create([
            'customer_id'=>$customer->id,
            'payment_id'=>'order'.rand(1000, 9999),
            'orderstatus'=> 1,
            'price'=> \Cart::getTotal(),

        ]);
        
        
       //Loop through cart items to deduct cart quantity from product stock
       foreach ($cartItems as $item){
            Order_Product::create([
                'order_id'=>$order->id,
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'image' =>$item->attributes->image,
                'quantity' => $item->quantity,
            ]);
            $id = $item->id;
            $prodstock  =  Product::findOrFail($id);
            $prodstock->stock -= $item->quantity;
            $prodstock->save();
        
       } 


        return view('checkout.payment', compact('cartItems'));

        
    }
    //---
    public function postCheckout(Request $request){
     

        


        \Cart::clear();
        return view('checkout.confirm');
        }
}
