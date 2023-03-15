@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1 class="text-xl">Add New Discount</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('discount.index') }}"> Back</a>
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

<form action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Discount in Percent</strong>
                <input type="number" name="discount"  class="form-control" placeholder="5"> </input>
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="bg-yellow-200 px-3 py-2 rounded shadow-md">Submit</button>
        </div>
    </div>
   
</form>

@endsection