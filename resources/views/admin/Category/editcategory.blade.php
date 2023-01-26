@extends('layouts.app')

@section('content')



<div>
        <div>
            <div class="pull-left">
                <h1 class="text-xl"> Edit category</h1>
            </div>
            <div class="text-center">
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
  
    <form action="{{ route('admincategory.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div>
            <div>
                <div>
                    <strong>Category name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{ $category->name }}">
                </div>
            </div>
            <div>
                <div>
                    <strong>Photo:</strong>
                    <input type="file" name="photo" accept="image/png, image/gif, image/jpeg, image/jpg" class="form-control" placeholder="photo" value="{{ $category->photo }}">
                    <strong>Current image:</strong>
                    <img class="rounded-xl h-15 w-15  " width='100px' height='100px'src ="{{ url('storage/'.$category->photo) }}"> <!--Current Category image-->
                </div>
            </div>
            <div>
                <div>
                    <strong>Description:</strong>
                    <textarea type="text" name="description" class="form-control" placeholder="description">{{ $category->description }}</textarea>
                </div>
            </div>
            <div class="text-center">
              <button type="submit" class="bg-yellow-200 px-3 py-2 rounded shadow-md">Submit</button>
            </div>
        </div>
   
    </form>
@endsection