@extends('layouts.app')

@section('content')


<div>
        <div>
            <div>
                <h1 class="text-xl"> Show Product</h1>
            </div>
            <div class="text-center">
        <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('adminproduct.index') }}"> Back</a>
        </div>
        </div>
    </div>
   
    <div>
        <div>
            <div class="text-ellipsis overflow-hidden ... box-content w-[32rem] md:box-content">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div>
            <strong>Photo:</strong>
            <div class="flex">                
                <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px'></a>
            </div>
        </div>
        <div>
            <div class="text-ellipsis overflow-hidden ... box-content w-[59rem] md:box-content">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
        <div>
            <div class="text-ellipsis overflow-hidden ... box-content w-[59rem] md:box-content">
                <strong>Ingredients:</strong>
                {{ $product->ingredients }}
            </div>
        </div>
        <div>
            <div>
                <strong>Stock:</strong>
                {{ $product->stock }}
            </div>
        </div>
        <div>
            <div>
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
        </div>
        <div>
            <div>
                <strong>Discount:</strong>
                @if  ($product->discount_id <= 0) 
                    None
                @else      
                    @foreach($discounts as $discount)
                        @if($discount->id == $product->discount_id)
                            {{$discount->discount}}% <!-- Display discount number according to discount id-->
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div>
            <div>
                <strong>Category:</strong>
                {{$category->name}}
            </div>
        </div>
        <div><label>Vegan: </label>
                    @if($product->vegan == 1)
                    <input type="checkbox" class= 'pointer-events-none' checked> </input>

                    @else
                    <input type="checkbox" class= 'pointer-events-none'>
                    @endif
</div>
        <div>
            <div>
                <strong>created_at:</strong>
                {{ $product->created_at }}
            </div>
        </div>
        <div>
            <div>
                <strong>updated_at:</strong>
                {{ $product->updated_at }}
            </div>
        <div class="text-center">
            <a class="bg-yellow-300 px-3 py-2 rounded shadow-md" href="{{ route('adminproduct.edit',$product->id) }}"> edit </a>
        </div>
        </div>
    </div>
@endsection