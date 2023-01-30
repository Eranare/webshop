@extends('layout.app')
@section('title', $category->name)
@section('body')

<nav class="container  border ">
    <a href="{{route('categories.index')}}">Home</a> ->
    <a href="#">{{$category->name}}</a>
</nav>


    Current category image
<div class= "rounded">
    <img class="rounded-xl h-15 w-15  " width='300px' height='200px'src ="{{ url('storage/'.$category->photo) }}"> <!--Current Category image-->
</div>
<div class="container h-15 w-15 square-full overflow-hidden bg-black bg-opacity-25 sticky">
    <ul>
    @foreach ($category->products as $product)
    <li>
    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class ="flex items-center"> 
                <span class="h-15 w-15 square-full overflow-hidden ">
                    <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' ></a>
                </span>
                <div class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                Product: {{$product->name}}<br>
                <p class = "text-sm font-medium text-gray-900">Price ={{$product->price}} </p>
                
                
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
    </div>
    </li>
    @endforeach
    </ul>
</div>
@extends('partials.basket')
@endsection