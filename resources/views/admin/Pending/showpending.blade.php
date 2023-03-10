@extends('layouts.app')

@section('content')

@php $orderStatus = '';
if($order->orderstatus == 1)
        $orderStatus = 'Pending';
elseif($order->orderstatus == 2)
        $orderStatus = 'Completed'; 
elseif($order->orderstatus == 3)
        $orderStatus = 'Cancelled';

@endphp
<div>
        <div>
            <div class="pull-left">
                <h1 class="text-xl"> Show {{$orderStatus}} order</h1>
            </div>
            <div class="text-center">
                <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('adminpending.index') }}"> Back</a>
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
                <strong>customer_id and name: </strong>
                {{ $order->customer_id }} 
                {{$customer->first_name}} {{$customer->last_name}}
            </div>
            
            <div><strong>Email: </strong> 
                {{$customer->email}}
            </div>
            <div>
                <strong>Address:</strong>

                {{ $customer->Address1 }} {{$customer->house_number1}}
                {{$customer->postal_code1}}


            </div>
            <div>
                <strong>Delivery address:</strong>
                @if ($customer->Address2 == null)
                {{ $customer->Address1 }} {{$customer->house_number1}}
                {{$customer->postal_code1}}
                @else 
                {{$customer->Address2}} {{customer->House_number2}}
                {{$customer_postalcode2}}
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
        <form action="{{ route('order.complete', $order->id) }}" method="POST">
                <td class="truncate p-2">
                    @csrf
                    
                    <button type="submit" class="bg-green-400 px-3 p-2 text-bold py-2 rounded shadow-md"> complete</button>
                </td>
                </form>
                </td>

                <form action="{{ route('order.cancel',$order->id) }}" method="POST">
                <td class="truncate p-2">
                    @csrf
                    
                    <button type="submit" class="bg-red-400 px-3 py-2 text-bold rounded shadow-md"> cancelled </button>
                </td>
                </form>
    </div>
@endsection