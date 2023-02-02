@extends('layouts.app')

@section('content')



<div>
        <div>
            <div class="pull-left">
                <h1 class="text-xl"> Edit discount</h1>
            </div>
            <div class="text-center">
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
  
    <form action="{{ route('discount.update',$discount->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div>
        
            
            <div>
                <div>
                    <strong>Discount value</strong>
                    <input type="text" name="discount" class="form-control" value="{{$discount->discount}}">  
                </div>
            </div>
            <div class="text-center">
              <button type="submit" class="bg-yellow-200 px-3 py-2 rounded shadow-md">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
