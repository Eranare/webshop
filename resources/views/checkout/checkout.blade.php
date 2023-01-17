@extends('layout.app')
@section('body')

<div ><!--Container voor form -->
 <!-- push address and name etc into customer session data-->
<form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ url('storage/'.$product->photo) }}"  name="image"> <!-- dit werkte niet qua link, nu wel-->
                        <input type="number" value="1" min="1" name="quantity">
                        <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
            hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">voeg toe</button>
                    

first_name'
last_name');
            phone1');
            phone2');
            email');
            Address1');
            house_number1');
            postal_code1');
            city1');
            Address2
            house_number2
            postal_code2
            city2
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

