@extends('layout.app')
@section('body')
@section('title', 'Checkout')
<style>
.buttonbasket{
  display:none;
} 
</style>
<div class="container  w-full h-200 inline-flex border"> 
 <!-- push address and name etc into customer session data-->
  <div class="h-full   mx-auto px-5 py-4 sticky  " >
    <form action="{{ route('cart.pay') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class='p-4 mx-7 inline-flex flex-col border'>
                        <label>First name:</label><input type="text" placeholder="first name*" value='' name="first_name"><br>
                        <label>Last name:</label><input type="text" placeholder="last name*" value='' name="last_name"><br>
                        <label>Phone:</label><input type="number" placeholder=" phone*"value='' name="phone1"><br>
                        <label>Email:</label><input type="text" placeholder="email*" value='' name="email"><br>
                        <label>second phone:</label><input type="number" placeholder="phone(optional)" value='' name="phone2"><br>
                        </div>
                        <div class="p-4 mx-7 inline-flex flex-col border ">
                        <label>Primary address: <!-- dit werkte niet qua link, nu wel--></label>
                        <label>Last name:</label><input type="text" placeholder="address* " value='' name="address1"><br>
                        <label>Last name:</label><input type='text' placeholder='House number* ' value='' name='house_number1'><br>
                        <label>Postal code:</label><input type='text' placeholder='Postal code* ' value='' name='postal_code1' ><br>
                        <label>City:</label><input type='text' placeholder='City* ' value='' name='city1'><br>
                        </div>
                        <div class="p-4  mx-7 inline-flex flex-col border">
                        <label>Deliver instead to:</label>
                        <label>Address:</label><input type="text" placeholder="Address" value=''  name="address2"><br>
                        <label>House number:</label><input type='text' placeholder='House number' value='' name='house_number2'><br>
                        <label>Postal code:</label><input type='text' placeholder='Postal code ' value='' name='postal_code2' ><br>
                        <label>City:</label><input type='text' placeholder='City ' value='' name='city2'><br>
  </div>

  
  
  <div>
    <div class="p-8 inline-flex flex-col ">
                        <strong> Total: ${{number_format((double)Cart::getTotal(), 2, '.', '')}} </strong><br>
    
    <div class="p-2 inline-flex flex-col">
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
  </div>
</div>
</div>

@endsection

