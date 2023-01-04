@extends('layout.app')
@section('body')
welcome to the shop


<h2>Categories</h2>

    <img src="{{ url('storage/photos/Category.jpg') }}">
        
        
<ul>
@foreach ($categories as $category)
<li>
<label for="photo" class="block text-sm font-medium text-gray-700"> Background </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class ="flex items-center"> 
            <span class="h-50 w-50 rounded-full overflow-hidden bg-gray-100">
                <img class="h-full object-cover" src="{{ url('storage/'.$category->photo) }}">         
            </span>
        </div>
    </div>
</li>
@endforeach
</ul>

@endsection