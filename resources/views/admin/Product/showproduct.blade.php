@extends('layouts.app')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl"> Show Product</h1>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('adminproduct.index') }}"> Back</a>
        </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="text-ellipsis overflow-hidden ... box-content w-[32rem] md:box-content">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px'>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="text-ellipsis overflow-hidden ... box-content w-[59rem] md:box-content">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="text-ellipsis overflow-hidden ... box-content w-[59rem] md:box-content">
                <strong>Ingredients:</strong>
                {{ $product->ingredients }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                {{ $product->stock }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category_id:</strong>
                {{ $product->category_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created_at:</strong>
                {{ $product->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $product->updated_at }}
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="bg-yellow-300 px-3 py-2 rounded shadow-md" href="{{ route('adminproduct.edit',$product->id) }}"> edit </a>
        </div>
        </div>
    </div>
@endsection