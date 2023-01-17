@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1 class="text-xl"> Edit product</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('adminproduct.index') }}"> Back</a>
        </div>
    </div>
</div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('adminproduct.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <input type="text" name="photo" value="{{ $product->photo }}" class="form-control" placeholder="photo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="stock">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>category_id:</strong>
                    <input type="text" name="category_id" value="{{ $product->category_id }}" class="form-control" placeholder="category_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="bg-blue-200 px-3 py-2 rounded shadow-md">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
