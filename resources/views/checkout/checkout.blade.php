@extends('layout.app')
@section('body')

<div ><!--Container voor form -->
 <!-- push address and name etc into customer session data-->
Fill in data
 <form action="{{ route('cart.pay') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="first name" name="first_name">Req<br>
                        <input type="text" placeholder="last name" name="last_name">Req<br>
                        <input type="number" placeholder="primary phone" name="phone1">Req<br>
                        <input type="number" placeholder="secondary phone"  name="phone2"><br> <!-- dit werkte niet qua link, nu wel-->
                        <input type="text" placeholder="address 1"  name="address1">Req<br>
                        <input type='text' placeholder='House number 1' name='house_number1'>Req<br>
                        <input type='text' placeholder='Postal code 1' name='postal_code1' >Req<br>
                        <input type='text' placeholder='City 1' name='city1'>Req<br>
                        <input type="text" placeholder="address 1"  name="address2"><br>
                        <input type='text' placeholder='House number 1' name='house_number2'><br>
                        <input type='text' placeholder='Postal code 1' name='postal_code2' ><br>
                        <input type='text' placeholder='City 1' name='city2'><br>
                        <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
            hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">voeg toe</button>
                    


</form>
</div>

<div><!--Container voor mini cart lijst -->
<div>
                         Total: ${{ Cart::getTotal() }}
                        
</div>

                          <form action="{{ route('cart.pay') }}">
                            Please confirm shipping Address and payment option <br>
                            Payment option:
                            <select id ='payment option'><option>iDeal </option>
                            <option>CreditCard  </option>
                            <option>DebitCard</option></select>
                            
                            <select id='Ideal' name ='ideal'>
                                <option value='INGB'>INGB</option>
                            </select>
                            
                            <button class="px-6 py-2 text-green-800 bg-green-300">Confirm</button>
                          </form>
@endsection

