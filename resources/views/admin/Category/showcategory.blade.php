@extends('layouts.app')

@section('content')


<div>
        <div>
            <div>
                <h1 class="text-xl"> Show Category</h1>
            </div>
            <div class="text-center">
            <a class="bg-blue-200 px-3 py-2 m-8 rounded shadow-md" href="{{ route('admincategory.index') }}"> Back</a>
        </div>
        </div>
    </div>
   
    <div>
        <div>
            <div class="text-ellipsis overflow-hidden ... box-content w-[32rem] md:box-content">
                <strong>Name:</strong>
                {{ $category->name }}
            </div>
        </div>
        <div>
            <strong>Photo:</strong>
            <div class="flex">
                <a href="{{route('categories.show', $category->id)}}"><img class="rounded-xl h-15 w-15  " width='300px' height='200px'src ="{{ url('storage/'.$category->photo) }}"></a> <!--Current Category image-->
            </div>
        </div>
        <div>
            <div class="text-ellipsis overflow-hidden ... box-content w-[59rem] md:box-content">
                <strong>Description:</strong>
                {{ $category->description }}
            </div>
        </div>
        <div>
            <div>
                <strong>created_at:</strong>
                {{ $category->created_at }}
            </div>
        </div>
        <div>
            <div>
                <strong>updated_at:</strong>
                {{ $category->updated_at }}
            </div>
        <div class="text-center">
            <a class="bg-yellow-300 px-3 py-2 rounded shadow-md" href="{{ route('admincategory.edit',$category->id) }}"> edit </a>
        </div>
        </div>
    </div>
@endsection