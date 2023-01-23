@extends('layouts.app')

@section('content')

<div class="row w-10/12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl">Pending orders page</h1>
            </div>
        </div>
</div>
<br><br><br>
    <!-- IAM USING TAILWIND CSS TO STYLE THE TABLE. -->
    <table class="p-10">
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
                <th class="bg-blue-300 p-2 text-bold">Complete</th>
                <th class="bg-blue-300 p-2 text-bold">Cancel</th>
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

                <form action="{{ route('order.complete', $order->id) }}" method="POST">
                <td class="truncate p-2">
                    @csrf
                    
                    <button type="submit" class="bg-green-400 px-3 p-2 text-bold py-2 rounded shadow-md"> complete</button>
                </td>
                </form>
                </td>

                <form action="{{ route('order.cancel',$order->id) }}" method="POST">
                <td class="truncate p-2">
                    @csrf
                    
                    <button type="submit" class="bg-red-400 px-3 py-2 text-bold rounded shadow-md"> cancelled </button>
                </td>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection