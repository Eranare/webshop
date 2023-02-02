
@extends('layout.app')


@section('title', 'Index')
@section('body')


<div class="text-right">
<h2><a href ="{{route('admin.index' )}}">tempt admin link </a></h2>
</div>

<div class="flex justify-center">
    <img class="h-20" src="{{ asset('images/divider.png') }}" alt="colorful divider">                
</div>

<div class="container border">       
    <ul class="grid grid-cols-6 gap-1">
    @foreach ($categories as $category)
    <li>
        
    <div> 
        <div class="mx-0 px-0 mt-1 sm:mt-0 sm:col-span-2">
            <div class ="flex items-center"> 
                <span class="square-full overflow-hidden">
                    <a href="{{route('categories.show', $category->id)}}"><img class="max-w-xs hover:scale-110 transition duration-300 ease-in-out rounded-xl object-cover" src="{{ url('storage/'.$category->photo) }}" width='300px' height='200px' ></a>
                </span>
            </div>
        </div>
    </div>
    </li>
    @endforeach
    </ul>
</div>



    <!-- check if a discount is active in the first place -->



<div class="container border ">    
    <br>
    On sale

<div class="container border">    
    <br>

    <ul class="grid grid-cols-6 gap-4"> 
        @foreach($categories as $category)        
    @foreach ($category->products as $product)
    @if($product->discount_id >0)

    <li>
    <div class="">
        <div class ="border"> 
            <span class="">
                <a href="{{route('products.show', $product->id)}}"><img class="h-full object-cover" src="{{ url('storage/'.$product->photo) }}" width='300px' height='200px' ></a>
            
            <div class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                Product: {{$product->name}}<br>
                <!--Look at discount id to pick up the discount % -->
                <span>
                Price = <s>{{$product->price}} </s> 
                @foreach($discounts as $discount)
                <?php
                (double)$disprice = 0.00;
                (double)$price = $product->price;
                $discount->id = $product->discount_id;
                (double)$percent=$discount->discount;
                
                $disprice +=$price - round(($price /100) * $percent,2); ?>
                @endforeach 
                <strong><?php echo $disprice; ?></strong>

                <br>

                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $disprice }}" name="price">
                            <input type="hidden" value="{{ $product->stock }}" name="stock">
                            <input type="hidden" value="{{ url('storage/'.$product->photo) }}"  name="image"> <!-- dit werkte niet qua link, nu wel-->
                            <input type="number" value="1" min="1" max= "{{ $product->stock }}" name="quantity">
                            <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
                            hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add to cart</button>
                        </form>
            </div>
        </div>

        
    </div>
    </li>
    @endif  
    @endforeach
    @endforeach
    </ul>
</div>





<div class="flex justify-center">
    <img class="h-20" src="{{ asset('images/divider.png') }}" alt="colorful divider">                
</div>


<div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12 mt-10">
    @foreach ($categories as $category)
    @foreach ($category->products as $product)

                    <div class="relative">
                        <div class="rounded-xl absolute top-0 left-0 py-2 px-4 bg-white bg-opacity-50"><p class="text-xs leading-3 text-gray-800">New</p></div>
                        <div class="relative group">
                        <div class="flex justify-center items-center rounded-xl opacity-0 bg-gradient-to-t from-gray-400 via-gray-400 to-opacity-10 group-hover:opacity-30 absolute top-0 left-0 h-full w-full"></div>
                            <img class="rounded-xl w-full" src="{{ url('storage/'.$product->photo) }}" alt="A girl Posing Image" />
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->stock }}" name="stock">
                                    <input type="hidden" value="{{ url('storage/'.$product->photo) }}"  name="image"> <!-- dit werkte niet qua link, nu wel-->
                                    <input type="number" value="1" min="1" max= "{{ $product->stock }}" name="quantity">
                                    <button class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm
                                    hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add to cart</button>
                                    </form>   
                                    <a href="{{route('products.show', $product->id)}}"><button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">View item</button></a>                           
                                </div>
                        </div>
                        <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-6 mt-4" style="text-shadow:-1px -1px 0 #7598d1,1px -1px 0 #7598d1,-1px 1px 0 #7598d1,1px 1px 0 #7598d1;">Product: {{$product->name}}</p>
                        <p class="font-semibold dark:text-gray-600 text-xl leading-5 text-gray-600 mt-4">Price =${{$product->price}} </p>
                        <p class="font-normal dark:text-gray-600 text-base leading-4 text-gray-600 mt-4">Hallo?</p>
                    </div>
    @endforeach
    @endforeach
</div>

@endsection
