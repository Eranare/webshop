@extends('layout.app')
@section('body')
welcome to the shop


<h2>Categories</h2>


        
        
<ul>
@foreach ($categories as $category)
<li>
<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
<label for="photo" class="block text-sm font-medium text-gray-700"> Background </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class ="flex items-center"> 
            <span class="h-15 w-15 square-full overflow-hidden bg-gray-100">
                <a href="#"><img class="h-full object-cover" src="{{ url('storage/'.$category->photo) }}" width='300px' height='200px' ></a>
            </span>
        </div>
    </div>
</div>
</li>
@endforeach
</ul>

@endsection