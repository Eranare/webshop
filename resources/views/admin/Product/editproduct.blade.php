@extends('layouts.app')

@section('content')


<div>
    <div>
        <div>
            <h1 class="text-xl"> Edit product</h1>
        </div>
        <div class="text-center">
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
  
    <form action="{{ route('adminproduct.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div>
            <div>
                <div>
                    <strong>Product name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{ $product->name }}">
                </div>
            </div>
            <div>
                <div>
                    <strong>Photo:</strong>
                    <input type="file" name="photo" accept="image/png, image/gif, image/jpeg, image/jpg" class="form-control" placeholder="photo" value="{{ $product->photo }}">
                    <strong>Current image:</strong>
                    <img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='100px' height='100px'>
                </div>
            </div>
            <div>
                <div>
                    <strong>Description:</strong>
                    <textarea name="description" class="form-control" placeholder="description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div>
                <div>
                    <strong>ingredients:</strong>
                    <textarea name="ingredients" class="form-control" placeholder="ingredients">{{ $product->ingredients }}</textarea>
                </div>
            </div>
            <div>
                <div>
                    <strong>Stock:</strong>
                    <input type="number" name="stock" class="form-control" placeholder="stock" value="{{ $product->stock }}">
                </div>
            </div>
            <div>
                <div>
                    <strong>Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="price" value="{{ $product->price }}">
                </div>
            </div>

            <div>
                <div>
                <strong>Category:</strong>
                <select name="category_id" class="form-control" placeholder="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
                </div>
            </div>
            <div class="text-center">
              <button type="submit" class="bg-yellow-200 px-3 py-2 rounded shadow-md">Submit</button>
            </div>
        </div>
    </form>
@endsection