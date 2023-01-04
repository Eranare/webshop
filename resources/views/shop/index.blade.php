@extends('layout.app')
@section('body')
welcome to the shop


<h2>Categories</h2>
<ul>
@foreach ($categories as $category)
<li>
<a href = "{{route('category.link, $category->name')}}"> $category->name </a>
</li>
@endforeach
</ul>

@endsection