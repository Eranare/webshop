@extends('layout.app')
@section('title', 'Vegan')
@section('body')

<!-- nav: -->
<nav class="container">
    <a href="{{route('categories.index')}}" class="py-1 text-base" style="text-shadow:-1px -1px 0 #FFFFFF,1px -1px 0 #FFFFFF,-1px 1px 0 #FFFFFF,1px 1px 0 #FFFFFF;">
Home</a> ->
    <a href="#" class="py-1 text-base" style="text-shadow:-1px -1px 0 #FFFFFF,1px -1px 0 #FFFFFF,-1px 1px 0 #FFFFFF,1px 1px 0 #FFFFFF;">
Vegan</a>
</nav>


<!-- vegan banner image: -->
<div class="relative">
<div class="relative group">
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


<!-- category description: -->
<div class ="flex justify-center">
    <div class="text-justify w-3/5">
        <p class="inline text-lg"><strong>Description:</strong> Vegan assortiment</p>
    </div>
</div>

<div class="flex justify-center">
    <img class="h-20 rotate-180" src="{{ asset('images/divider.png') }}" alt="colorful divider">                
</div>


<!-- all vegan products: -->
<div class="container h-15 w-15 square-full overflow-hidden bg-red-300 bg-opacity-25 sticky">
<div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12 mt-10">
    @foreach ($veganproducts as $product)

                    <div class="relative">
                        <div class="relative group pb-1">
                        <div class="flex justify-center items-center rounded-xl opacity-0 bg-gradient-to-t from-gray-900 via-gray-600 to-opacity-10 group-hover:opacity-30 absolute top-0 left-0 h-full w-full"></div>
                        <span class="square-full overflow-hidden rounded-xl">    
                            <img class="object-contain rounded-xl w-full max-h-56" src="{{ url('storage/'.$product->photo) }}" alt="product image">
                        </span>
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
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
                                    <a href="{{route('products.show', $product->id)}}"><button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">View item</button></a>                           
                                </div>
                                <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-1 mt-1" style="text-shadow:-1px -1px 0 #7598d1,1px -1px 0 #7598d1,-1px 1px 0 #7598d1,1px 1px 0 #7598d1;">Product: {{$product->name}}</p>
                        <p class="font-semibold dark:text-gray-600 text-xl leading-5 text-gray-600 mt-4">Price =${{$product->price}} </p>
                        <p class="font-normal dark:text-gray-600 text-base leading-4 text-gray-600 mt-4"></p>
                        </div>

                    </div>
    @endforeach
</div>
</div>
@extends('partials.basket')
@endsection