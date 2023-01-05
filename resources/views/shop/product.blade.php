@extends('layout.app')

@section('body')
@extends('partials.basket')

Back button
<br>
category van product moet hier ergens staan

<br>
Product page

<ul>
<li>
<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class ="flex items-center"> 
            <span class="h-15 w-15 square-full overflow-hidden bg-gray-100">
                <img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' >
            </span>
            <div class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            Product: {{$product->name}}<br>
            Price ={{$product->price}} <br>

            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->photo }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                    </form>

            <input type='number' id="quantity" placeholder='1'></input><button type ='submit' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">add to cart</button>
</div>
            
        </div>
        Description: {{$product->description}}
    </div>
</div>
</li>

</ul>

@endsection