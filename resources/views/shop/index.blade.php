@extends('layout.app')

@section('body')

@extends('partials.basket')

Home stuff here <br>
welcome to the shop


<h2>Categories</h2>


        
        
<ul class="grid grid-cols-6 gap-4">
@foreach ($categories as $category)
<li>
<div > 
<label>{{$category->id}} </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class ="flex items-center"> 
            <span class="h-15 w-15 square-full overflow-hidden bg-gray-100">
                <a href="{{route('categories.show', $category->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$category->photo) }}" width='300px' height='200px' ></a>
            </span>
        </div>
    </div>
</div>
</li>
@endforeach
</ul>
<br>
spacing here
<!-- features -->
<h1>Show featured/sale?</h1>
Banner, carousel maybe
<ul class="grid grid-cols-6 gap-4"> 
@foreach ($category->products as $product)
<li>
<div class="">

    <div class="">
        <div class =""> 
            <span class="">
                <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' ></a>
            </span>
            <div class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            Product: {{$product->name}}<br>
            Price ={{$product->price}} <br>

            <input type='number' id="quantity" placeholder='1'></input><button type ='submit' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">add to cart</button>
            </div>
        </div>

    </div>
</div>
</li>
@endforeach
</ul>
<br>
Spacing here
<br>

<h1>Show alles </h1>
<ul class="grid grid-cols-8 gap-6   ">
@foreach ($categories as $category)
@foreach ($category->products as $product)
<li>
<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class =""> 
            <span class="h-15 w-15 square-full overflow-hidden bg-gray-100">
                <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' ></a>
            
            <div class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
            Product: {{$product->name}}<br>
            Price ={{$product->price}} <br>

            <input type='number' id="quantity" placeholder='1'></input><button type ='submit' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">add to cart</button>
            </div>
            </span>
        </div>

    </div>
</div>
</li>
@endforeach
@endforeach
</ul>

@endsection