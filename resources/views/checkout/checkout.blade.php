@extends('layout.app')
@section('body')
@section('title', 'Checkout')
<style>
.buttonbasket{
  display:none;
} 
</style>
<div class="container border w-1/3" ><!--Container voor form -->
 <!-- push address and name etc into customer session data-->
Fill in data
 <form action="{{ route('cart.pay') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="first name" value='' name="first_name">Req<br>
                        <input type="text" placeholder="last name" value='' name="last_name">Req<br>
                        <input type="number" placeholder="primary phone"value='' name="phone1">Req<br>
                        <input type="text" placeholder="email" value='' name="email">Req<br>
                        <input type="number" placeholder="secondary phone" value='' name="phone2"><br> <!-- dit werkte niet qua link, nu wel-->
                        <input type="text" placeholder="address 1" value='' name="address1">Req<br>
                        <input type='text' placeholder='House number 1' value='' name='house_number1'>Req<br>
                        <input type='text' placeholder='Postal code 1' value='' name='postal_code1' >Req<br>
                        <input type='text' placeholder='City 1' value='' name='city1'>Req<br>
                        <input type="text" placeholder="address 1" value=''  name="address2"><br>
                        <input type='text' placeholder='House number 1' value='' name='house_number2'><br>
                        <input type='text' placeholder='Postal code 1' value='' name='postal_code2' ><br>
                        <input type='text' placeholder='City 1' value='' name='city2'><br>
                        <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
            hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">voeg toe</button>

</div>

<div><!--Container voor mini cart lijst -->
  <div>
                         Total: ${{ Cart::getTotal() }}                        
  </div>
  <div>
                            Please confirm shipping Address and payment option <br>
                            Payment option:
                            
                            <select id ='payment option'><option>iDeal </option>
                            <option>CreditCard  </option>
                            <option>DebitCard</option></select>
                            
                            <select id='Ideal' name ='ideal'>
                                <option value='INGB'>INGB</option>
                            </select>
                            
                            <button type='submit' class="px-6 py-2 text-green-800 bg-green-300">Confirm</button>
                          </form>
  </div>
  <div class="float-r container w-1/3 border">
    Shopping list
  </div>
</div>

@endsection

