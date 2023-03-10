@extends('layouts.app')

@section('content')

<div class="row w-10/12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl">Categories page</h1>
            </div>
            <div class="pull-right text-end">
                <a class="btn btn-success" href="{{ route('admincategory.create') }}" style="position: fixed"> Create New Category</a>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
</div>

    <!-- IAM USING TAILWIND CSS TO STYLE THE TABLE. -->
    <table class="my-16">
        <thead>
            <!-- DEFINE ALL THE HEADINGS -->
            <tr class="text-lg">
                <th class="bg-blue-300 p-2 text-bold">id</th>
                <th class="bg-blue-300 p-2 text-bold">Name</th>
                <th class="bg-blue-300 p-2 text-bold">Created</th>
                <th class="bg-blue-300 p-2 text-bold">Updated</th>
                <th class="bg-blue-300 p-2 text-bold">Show</th>
                <th class="bg-blue-300 p-2 text-bold">Edit</th>
                <th class="bg-blue-300 p-2 text-bold">Destroy</th>
            </tr>
        </thead>
        <tbody>
            <!-- USE BLADE TO ITERATE OVER THE DATA YOU PASSED IN YOUR CONTROLLER -->
            <!-- IAM NOT SHOWING ALL THE DATA TO KEEP THE TABLE COMPACT. -->
            @foreach($categories as $category)
            <tr class="text-md p-2 w-3 border border-solid border-blue-600 border-1">
                <td class="truncate p-2">{{ $category->id }}</td>
                <td class="truncate p-2">{{ Str::limit($category->name, 15) }}</td>
                <td class="truncate p-2">{{ $category->created_at }}</td>
                <td class="truncate p-2">{{ $category->updated_at }}</td>
                <!-- USING THE DETAILS BUTTON WE WILL AN OVERVIEW OF ALL THE DATA. -->
                <td class="truncate p-2">
                    <a class="bg-blue-200 px-3 py-2 rounded shadow-md" href="{{ route('admincategory.show',$category->id) }}"> details </a>
                </td>
                <td class="truncate p-2">
                    <a class="bg-yellow-300 px-3 py-2 rounded shadow-md" href="{{ route('admincategory.edit',$category->id) }}"> edit </a>
                </td>
                <form action="{{ route('admincategory.destroy',$category->id) }}" method="POST">
                <td class="truncate p-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-400 px-3 py-2 rounded shadow-md"> destroy </button>
                </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection