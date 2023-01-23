@extends('layouts.app')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl"> Show Category</h1>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('admincategory.index') }}"> Back</a>
        </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $category->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo:</strong>
                <img class="rounded-xl h-15 w-15  " width='300px' height='200px'src ="{{ url('storage/'.$category->photo) }}"> <!--Current Category image-->
                {{ $category->photo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $category->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created_at:</strong>
                {{ $category->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $category->updated_at }}
            </div>
        </div>
    </div>
@endsection