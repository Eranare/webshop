@extends('layouts.app')

@section('content')



<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl"> Edit category</h1>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('admincategory.index') }}"> Back</a>
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
  
    <form action="{{ route('admincategory.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Photo:</strong>
                    <input type="text" name="photo" value="{{ $category->photo }}" class="form-control" placeholder="photo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $category->description }}" class="form-control" placeholder="description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="bg-blue-200 px-3 py-2 rounded shadow-md">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
