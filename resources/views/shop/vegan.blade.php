@extends('layout.app')
@section('title', 'Vegan')
@section('body')

<nav class="container  border ">
    <a href="{{route('categories.index')}}">Home</a> ->
    <a href="#">Vegan</a>
</nav>
<div class="relative">
<div class="relative group">
<div class="flex justify-center items-center opacity-0 bg-gradient-to-t from-gray-400 via-gray-200 absolute top-0 left-0 h-full w-full"></div>

<div class="rounded flex justify-center">
    <img class="rounded-xl" style='object-fit: cover; width:699px; height:200px;'src ="{{ url('storage/photos/vegan.jpg') }}"> <!--Current Category image-->
</div>

<div class="flex justify-center absolute inset-0 p-8 h-5/5 w-full opacity-0 opacity-100">
    <div class="flex justify-center bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-2/5 mt-2 text-white">
        <p class="py-6 text-5xl" style="text-shadow:-1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;">

    </div>
</div>

</div>
</div>

<div class ="flex justify-center">
    <div class="w-3/5">
    <strong>Description:</strong> Vegan assortiment
    </div>
</div>
<div class="container h-15 w-15 square-full overflow-hidden bg-black bg-opacity-25 sticky">
    <ul>
    @foreach ($veganproducts as $product)
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
                        <input type="hidden" value="{{ $product->stock }}" name="stock">
                        <input type="hidden" value="{{ url('storage/'.$product->photo) }}"  name="image"> <!-- dit werkte niet qua link, nu wel-->
                        <input type="number" value="1" min="1" max= "{{ $product->stock }}" name="quantity">
                        <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
                hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add to cart</button>
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