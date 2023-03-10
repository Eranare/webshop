@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1 class="text-xl">Add New Product</h1>
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

<form action="{{ route('adminproduct.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product-name:</strong>
                <input type="text" name="name" class="form-control" placeholder="name"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <input type="file" name="photo" accept="image/png, image/gif, image/jpeg, image/jpg" class="form-control" placeholder="photo"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea type="text" name="description" class="form-control" placeholder="description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ingredients:</strong>
                <textarea type="text" name="ingredients" class="form-control" placeholder="ingredients"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                <input type="number" name="stock" class="form-control" placeholder="stock"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="price"></input>
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Category:</strong>
                <select name="category_id" class="form-control" placeholder="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div>
                <strong>Vegan:  </strong>
                <select name="vegan" class="form-control">
                    
                    <option  value="0">No</input>
                    <option  value="1">Yes </input>
                    
                </select>
            </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="bg-yellow-200 px-3 py-2 rounded shadow-md">Submit</button>
        </div>
    </div>
   
</form>

@endsection