
@extends('layout.app')


@section('title', 'Index')
@section('body')



Welcome to the CandyShop

<h2><a href ="{{route('admin.index' )}}">tempt admin link </a></h2>
<h2>Categories</h2>

Pexels voor pictures

        
<div class="container border">       
    <ul class="grid grid-cols-6 gap-4">
    @foreach ($categories as $category)
    <li>
        
    <div > 
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class ="flex items-center"> 
                <span class="h-15 w-15 square-full overflow-hidden">
                    <a href="{{route('categories.show', $category->id)}}"><img class="rounded-xl  object-cover" src="{{ url('storage/'.$category->photo) }}" width='300px' height='200px' ></a>
                </span>
            </div>
        </div>
    </div>
    </li>
    @endforeach
    </ul>
</div>

<div class="container border ">    
    <br>
    spacing here
    <!-- features -->
    <h1>Show featured/sale?</h1>
    Banner, carousel maybe
    <ul class="grid grid-cols-6 gap-4"> 
    @foreach ($category->products as $product)
    <li>
    <div class="">

        
        <div class ="border"> 
            <span class="">
                <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' ></a>
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
                            <input type="number" value="1" min="1" name="quantity">
                            <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
                            hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">voeg toe</button>
                        </form>
            </div>
        </div>

        
    </div>
    </li>
    @endforeach
    </ul>

</div>

<h1>Show alles </h1>
<br>
<div class="container border 2px">    
    <ul class="grid grid-cols-8 gap-6   ">
    @foreach ($categories as $category)
    @foreach ($category->products as $product)
    <li>
    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class ="group relative"> 
                <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                    <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' ></a>
                
                    <span class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                
                        <h3 class="text-sm text-gray-700">
                            <a href="{{route('products.show', $product->id)}}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Product: {{$product->name}}
                            </a>
                        </h3>
                        <p class= "text-sm font-medium text-gray-900">Price ={{$product->price}} </p>

                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ url('storage/'.$product->photo) }}"  name="image"> <!-- dit werkte niet qua link, nu wel-->
                            <input type="number" value="1" min="1" name="quantity">
                            <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
                            hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">voeg toe</button>
                        </form>
    </span>
                </div>
            </div>

        </div>
    </div>
    </li>
    @endforeach
    @endforeach
    </ul>
</div>

@endsection


