@extends('layouts.app')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl"> Show pending order</h1>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('adminpending.index') }}"> Back</a>
        </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id:</strong>
                {{ $order->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>customer_id:</strong>
                {{ $order->customer_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total price:</strong>
                {{ $order->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created_at:</strong>
                {{ $order->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $order->updated_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cart:</strong>
                @foreach($products as $product)
                <br>
                Image: <img src =" {{ url($product->attributes->image) }}"> </img>
                Product: {{$product->name}}
                Price per piece: ${{$product->price}}
                Amount: {{$product->quantity}}
                @endforeach
            </div>
        </div>
    </div>
@endsection