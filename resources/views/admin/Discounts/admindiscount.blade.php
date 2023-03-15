@extends('layouts.app')

@section('content')

<div class="row w-10/12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-xl">Discounts page</h1>
            </div>
            <div class="pull-right text-right">
                <a class="btn btn-success" href="{{ route('discount.create') }}" style="position: fixed"> Create New Discount</a> 
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
                
                <th class="bg-blue-300 p-2 text-bold">percent</th>

                <th class="bg-blue-300 p-2 text-bold">Products in discount</th>
                
                <th class="bg-blue-300 p-2 text-bold">Edit</th>
                <th class="bg-blue-300 p-2 text-bold">Destroy</th>
            </tr>
        </thead>
        <tbody>
            <!-- USE BLADE TO ITERATE OVER THE DATA YOU PASSED IN YOUR CONTROLLER -->
            <!-- IAM NOT SHOWING ALL THE DATA TO KEEP THE TABLE COMPACT. -->
            @foreach($discounts as $discount)
            <tr class="text-md p-2 w-3 border border-solid border-blue-600 border-1">
                <td class="truncate p-2">{{ $discount->discount  }}%</td>

                <?php $prodtotal = 0 ?>
                @foreach($products as $product)
                    @if($product->discount_id == $discount->id) 
                    <?php $prodtotal=+1 ?>
                    @endif
                    
                @endforeach
                
                <td class="truncate p-2 ">
                {{$prodtotal}}
                <!--Add all products with matching discount id together here -->
                </td>
                

                <td class="truncate p-2">
                    <a class="bg-yellow-300 px-3 py-2 rounded shadow-md" href="{{ route('discount.edit',$discount->id) }}"> edit </a>
                </td>
                <form action="{{ route('discount.destroy',$discount->id) }}" method="POST">
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