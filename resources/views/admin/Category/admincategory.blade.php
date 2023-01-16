@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admincategory.create') }}"> Create New Category</a>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('adminproduct.index') }}"> To products</a>
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
            @foreach($categories as $category)
            <tr class="text-md p-3 w-3 border border-solid border-blue-600 border-1">
                <td class="truncate p-3">{{ $category->id }}</td>
                <td class="truncate p-3">{{ $category->name }}</td>
                <td class="truncate p-3">{{ $category->photo }}</td>
                <td class="truncate p-3">{{ $category->created_at }}</td>
                <td class="truncate p-3">{{ $category->updated_at }}</td>
                <!-- USING THE DETAILS BUTTON WE WILL AN OVERVIEW OF ALL THE DATA. -->
                <td class="truncate p-3">
                    <a class="bg-blue-300 px-4 py-2 rounded shadow-md" href="{{ route('admincategory.show',$category->id) }}"> details </a>
                </td>
                <td class="truncate p-3">
                    <a class="bg-blue-300 px-4 py-2 rounded shadow-md" href="{{ route('admincategory.edit',$category->id) }}"> edit </a>
                </td>
                <form action="{{ route('admincategory.destroy',$category->id) }}" method="POST">
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