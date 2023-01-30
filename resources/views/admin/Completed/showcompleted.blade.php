@extends('layouts.app')

@section('content')


<div>
        <div>
            <div class="pull-left">
                <h1 class="text-xl"> Show Completed order</h1>
            </div>
            <div class="text-center">
                <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('admincompleted.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div>
        <div>
            <div>
                <strong>id:</strong>
                {{ $order->id }}
            </div>
        </div>
        <div>
            <div>
                <strong>customer_id and name:</strong>
                {{ $order->customer_id }} 
                {{$customer->first_name}} {{$customer->last_name}}
            </div>
            <div>
                <strong>customer_id and name:</strong>
                {{ $order->customer_id }} 
                {{$customer->first_name}} {{$customer->last_name}}
            </div>
            <div>
                <strong>Delivery address:</strong>
                @if ($customer->Address2 == null)
                {{ $customer->Address1 }} {{$customer->house_number1}}
                
                @else 
                {{$customer->Address2}}
                @endif
            </div>
        </div>
        <div>
            <div>
                <strong>Total price:</strong>
                {{ $order->price }}
            </div>
        </div>
        <div>
            <div>
                <strong>created_at:</strong>
                {{ $order->created_at }}
            </div>
        </div>
        <div>
            <div>
                <strong>updated_at:</strong>
                {{ $order->updated_at }}
            </div>
        </div>
        <div>
            <div>
                <strong>Cart:</strong>
                @foreach($products as $product)
                <br>
                <div class="flex">
                <a href="{{route('adminproduct.show', $product->id)}}"><img class="p-0 h-full object-cover" src=" {{ url($product->image) }}" width='100px' height='100px'></a>
                Product: {{$product->name}}
                <br>Price per piece: ${{$product->price}}
                <br>Amount: {{$product->quantity}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection