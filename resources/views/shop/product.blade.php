@extends('layout.app')
@section('title', $product->name)
@section('body')
@extends('partials.basket')


<nav class="cotainer border">
    <a href="{{route('categories.index')}}">Home</a> ->
    <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a> ->
    
    <a href="#">{{$product->name}}</a>
</nav>




Product page

<ul>
<li>
<div class="container py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class ="flex items-center"> 
            <div class="container border">
                <span class="h-15 w-15 square-full overflow-hidden bg-gray-100">
                <img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' >
                </span>
                
                <div class="border">
                @if (str_contains($product->ingredients, 'Hare'))
                    Print this text only if ingredients contain hare
                @else 
                    
                @endif
                @if (str_contains($product->ingredients, 'Hare'))
                    Print this text only if ingredients contain hare
                @else

                @endif
                @if (str_contains($product->ingredients, 'Hare'))
                    Print this text only if ingredients contain hare
                @else

                @endif
                @if (str_contains($product->ingredients, 'Hare'))
                    Print this text only if ingredients contain hare
                @else
                    
                @endif
                
                    <svg> 
                        peanuts, wheat, soy, milk
                    </svg>
                </div>
                
            </div>
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
        Description: {{$product->description}}
        Ingredients: {{$product->ingredients}}

    </div>
</div>
</li>

</ul>

@endsection