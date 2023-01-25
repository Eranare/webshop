@extends('layouts.app')

@section('content')

<div class="row w-10/12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl">Pending orders page</h1>
            </div>
        </div>
</div>

    <!-- IAM USING TAILWIND CSS TO STYLE THE TABLE. -->
    <table class="my-16">
        <thead>
            <!-- DEFINE ALL THE HEADINGS -->
            <tr class="text-lg">
                <th class="bg-blue-300 p-2 text-bold">id</th>
                <th class="bg-blue-300 p-2 text-bold">customer_id</th>
                <!-- <th class="bg-blue-300 p-2 text-bold">Cart</th> -->
                <th class="bg-blue-300 p-2 text-bold">Price</th>
                <th class="bg-blue-300 p-2 text-bold">Created</th>
                <th class="bg-blue-300 p-2 text-bold">Updated</th>
                <th class="bg-blue-300 p-2 text-bold">Show</th>
            </tr>
        </thead>
        <tbody>
            <!-- USE BLADE TO ITERATE OVER THE DATA YOU PASSED IN YOUR CONTROLLER -->
            <!-- IAM NOT SHOWING ALL THE DATA TO KEEP THE TABLE COMPACT. -->
            @foreach($pendingorders as $order)
            <tr class="text-md p-2 w-3 border border-solid border-blue-600 border-1">
                <td class="truncate p-2">{{ $order->id }}</td>
                <td class="truncate p-2">{{ $order->customer_id }}</td>
                <!-- <td class="truncate p-2">{{ $order->cart }}</td> -->
                <td class="truncate p-2">{{ $order->price }}</td>
                <td class="truncate p-2">{{ $order->created_at }}</td>
                <td class="truncate p-2">{{ $order->updated_at }}</td>
                <!-- USING THE DETAILS BUTTON WE WILL AN OVERVIEW OF ALL THE DATA. -->
                <td class="truncate p-2">
                    <a class="bg-blue-200 px-3 py-2 rounded shadow-md" href="{{ route('adminpending.show',$order->id) }}"> details </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection