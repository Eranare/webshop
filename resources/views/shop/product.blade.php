@extends('layout.app')

@section('body')
@extends('partials.basket')

Back button
<br>
category van product moet hier ergens staan

<br>
Product page
Category {{$category->name}}
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
                        <input type="hidden" value="{{ url('storage/'.$product->photo) }}"  name="image"> <!-- dit werkte niet qua link, nu wel-->
                        <input type="number" value="1" name="quantity" >  <!--negative number protection -->
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                    </form>

</div>
            
        </div>
        Description: {{$product->description}}
    </div>
</div>
</li>

</ul>

@endsection