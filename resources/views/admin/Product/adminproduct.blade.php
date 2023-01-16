




@if(!Auth::user())
@extends ('auth/login')
@else 

@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('adminproduct.create') }}"> Create New Product</a>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('admincategory.index') }}"> To categories</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <!-- IAM USING TAILWIND CSS TO STYLE THE TABLE. -->
    <table class="bg-blue-500 p-12">
        <thead>
            <!-- DEFINE ALL THE HEADINGS -->
            <tr class="text-lg">
                <th class="p-4 bg-blue-600 text-bold">id</th>
                <th class="p-4 bg-blue-600 text-bold">Name</th>
                <th class="p-4 bg-blue-600 text-bold">Photo</th>
                <th class="p-4 bg-blue-600 text-bold">Stock</th>
                <th class="p-4 bg-blue-600 text-bold">Price</th>
                <th class="p-4 bg-blue-600 text-bold">category_id</th>
                <th class="p-4 bg-blue-600 text-bold">Created</th>
                <th class="p-4 bg-blue-600 text-bold">Updated</th>
                <th class="p-4 bg-blue-600 text-bold">Show</th>
                <th class="p-4 bg-blue-600 text-bold">Edit</th>
                <th class="p-4 bg-blue-600 text-bold">Destroy</th>
            </tr>
        </thead>
        <tbody>
            <!-- USE BLADE TO ITERATE OVER THE DATA YOU PASSED IN YOUR CONTROLLER -->
            <!-- IAM NOT SHOWING ALL THE DATA TO KEEP THE TABLE COMPACT. -->
            @foreach($products as $product)
            <tr class="text-md p-3 w-3 border border-solid border-blue-600 border-1">
                <td class="truncate p-3">{{ $product->id }}</td>
                <td class="truncate p-3">{{ $product->name }}</td>
                <td class="truncate p-3">{{ $product->photo }}</td>
                <td class="truncate p-3">{{ $product->stock }}</td>
                <td class="truncate p-3">{{ $product->price }}</td>
                <td class="truncate p-3">{{ $product->category_id }}</td>
                <td class="truncate p-3">{{ $product->created_at }}</td>
                <td class="truncate p-3">{{ $product->updated_at }}</td>
                <!-- USING THE DETAILS BUTTON WE WILL AN OVERVIEW OF ALL THE DATA. -->
                <td class="truncate p-3">
                    <a class="bg-blue-300 px-4 py-2 rounded shadow-md" href="{{ route('adminproduct.show',$product->id) }}"> details </a>
                </td>
                <td class="truncate p-3">
                    <a class="bg-blue-300 px-4 py-2 rounded shadow-md" href="{{ route('adminproduct.edit',$product->id) }}"> edit </a>
                </td>
                <form action="{{ route('adminproduct.destroy',$product->id) }}" method="POST">
                <td class="truncate p-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-blue-300 px-4 py-2 rounded shadow-md"> destroy </button>
                </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection
@endif