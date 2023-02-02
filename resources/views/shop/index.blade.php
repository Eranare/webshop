@extends('layout.app')
@section('title', 'Index')
@section('body')



<!-- Discounts here Discounts here Discounts here Discounts here-->

<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-2 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                    <svg class="dark:text-gray-900" width="24" height="36" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="sliderdiscount" class="h-full flex lg:gap-4 md:gap-4 gap-2 items-center justify-start transition ease-out duration-700">


    @foreach($categories as $category)        
    @foreach ($category->products as $product)
    @if($product->discount_id >0)

    <div class="relative square-full overflow-hidden">
                        <div class="rounded-xl absolute top-0 left-0 py-2 px-4 bg-white bg-opacity-50"><p class="text-xs leading-3 text-gray-800">Discount</p></div>
                        <div class="items-center relative group">
                        <div class="flex justify-center items-center rounded-xl opacity-0 bg-gradient-to-t from-gray-800 via-gray-600 to-opacity-10 group-hover:opacity-40 absolute top-0 left-0 h-full w-full"></div>
                        <img class="object-cover rounded-xl" style="max-height:230px;display:block;margin:auto;" src="{{ url('storage/'.$product->photo) }}">
            
            <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-1 mt-1" style="text-shadow:-1px -1px 0 #7598d1,1px -1px 0 #7598d1,-1px 1px 0 #7598d1,1px 1px 0 #7598d1;">
            Product: {{$product->name}}</p>
                <!--Look at discount id to pick up the discount % -->
                <span>
                <p class="inline font-normal dark:text-gray-600 text-base leading-4 text-gray-600 mt-4">Price = <s>${{number_format((double)$product->price, 2, '.', '')}}</s></p> 
                @foreach($discounts as $discount)
                <?php

                if($discount->id == $product->discount_id)
                {
                    (double)$disprice = 0.00;
                    (double)$price = $product->price;
                (double)$percent=$discount->discount;
                
                $disprice +=$price - round(($price /100) * $percent,2);} ?>
                @endforeach 
                <strong><p class="inline font-semibold dark:text-gray-600 text-xl leading-5 text-gray-600 mt-4"><?php echo '$'.number_format((double)$disprice, 2, '.', ''); ?></p></strong>
                <div class="relative whitespace-nowrap py-2 px-5 text-left text-sm font-medium sm:pr-6">

                <div class="absolute bottom-0 p-8 pr-16 w-full opacity-0 group-hover:opacity-100">

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
                        <a href="{{route('products.show', $product->id)}}"><button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">View item</button></a>
                </div>
            </div>
        </div>
    </div>
    @endif  
    @endforeach
    @endforeach
                </div>
            </div>
        <button aria-label="slide forward" class="absolute z-30 right-0 mr-2 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
            <svg class="dark:text-gray-900" width="24" height="36" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>


<!-- Categories here Categories here Categories here Categories here-->

<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-2 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prevC">
                    <svg class="dark:text-gray-900" width="24" height="36" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slidercategory" class="h-full flex lg:gap-4 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">


@foreach ($categories as $category)
<div class="relative">
    <div class="relative group">
            <div class="flex items-center"> 
                <span class="square-full overflow-hidden rounded-xl">
                    <a href="{{route('categories.show', $category->id)}}"><img class="max-w-xs group-hover:scale-110 transition duration-300 ease-in-out object-cover" src="{{ url('storage/'.$category->photo) }}" width='300px' height='200px'>
                </span>
            <div class="flex justify-center absolute inset-0 p-8 h-5/5 w-full opacity-0 opacity-100">
                <div class="flex justify-center bg-transparent font-medium text-base leading-4 py-6 w-5/5 mt-2 text-white">
                    <p class="py-6 text-2xl" style="text-shadow:-1px -1px 0 #000,1px -1px 0 #000,-1px 1px 0 #000,1px 1px 0 #000;"><strong>{{$category->name}}</strong></p>
                </div>
            </div>
                    </a>

            </div>
        </div>
    </div>
            

@endforeach


        <div class="mx-0 px-0 mt-1 sm:mt-0 sm:col-span-2">
            <div class ="flex items-center"> 
                <span class="square-full overflow-hidden rounded-xl">
                    <a href="{{route('vegan.index')}}"><img class="max-w-xs hover:scale-110 transition duration-300 ease-in-out rounded-xl object-cover" src="{{ url('storage/photos/vegan.jpg') }}" width='300px' height='200px' ></a>
                </span>
            </div>
        </div>


                </div>
            </div>
        <button aria-label="slide forward" class="absolute z-30 right-0 mr-2 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="nextC">
            <svg class="dark:text-gray-900" width="24" height="36" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>


<div class="flex justify-center">
    <img class="h-20 rotate-180" src="{{ asset('images/divider.png') }}" alt="colorful divider">                
</div>


<!-- Products here Products here Products here Products here-->

<div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-y-12 lg:gap-x-8 sm:gap-y-10 sm:gap-x-6 gap-y-6 lg:mt-12 mt-10">
    @foreach ($categories as $category)
    @foreach ($category->products as $product)
    

                    <div class="relative">
                        <div class="relative group pb-1">
                        <div class="flex justify-center items-center rounded-xl opacity-0 bg-gradient-to-t from-gray-900 via-gray-600 to-opacity-10 group-hover:opacity-30 absolute top-0 left-0 h-full w-full"></div>
                        <span class="square-full overflow-hidden rounded-xl">    
                        @if($product->discount_id >0)
                        @foreach($discounts as $discount)
                <?php

                if($discount->id == $product->discount_id)
                {
                    (double)$disprice = 0.00;
                    (double)$price = $product->price;
                (double)$percent=$discount->discount;
                
                $disprice +=$price - round(($price /100) * $percent,2);} ?>
                @endforeach 
                            <img class="object-contain rounded-xl w-full max-h-56" src="{{ url('storage/'.$product->photo) }}" alt="product image">
                        </span>
                                <div class="absolute bottom-0 p-8 w-full opacity-0 group-hover:opacity-100">
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
                                    <a href="{{route('products.show', $product->id)}}"><button class="bg-transparent font-medium text-base leading-4 border-2 border-white py-3 w-full mt-2 text-white">View item</button></a>                           
                                </div>
                                <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-1 mt-1" style="text-shadow:-1px -1px 0 #7598d1,1px -1px 0 #7598d1,-1px 1px 0 #7598d1,1px 1px 0 #7598d1;">Product: {{$product->name}}</p>
                        <p class="font-semibold dark:text-gray-600 text-xl leading-5 text-gray-600 mt-4">Price = <s>${{number_format((double)$product->price, 2, '.', '')}} </s>
                        <strong class="inline font-semibold dark:text-gray-600 text-xl leading-5 text-gray-600 mt-4"><?php echo '$'.number_format((double)$disprice, 2, '.', ''); ?></p></strong>
                        <p class="font-normal dark:text-gray-600 text-base leading-4 text-gray-600 mt-4"></p>
                        </div>
                </div>
                            @else

    

                            <img class="object-contain rounded-xl w-full max-h-56" src="{{ url('storage/'.$product->photo) }}" alt="product image">
                        </span>
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
                                <p class="font-normal dark:text-white text-xl leading-5 text-gray-800 md:mt-1 mt-1" style="text-shadow:-1px -1px 0 #7598d1,1px -1px 0 #7598d1,-1px 1px 0 #7598d1,1px 1px 0 #7598d1;">Product: {{$product->name}}</p>
                        <p class="font-semibold dark:text-gray-600 text-xl leading-5 text-gray-600 mt-4">Price =${{number_format((double)$product->price, 2, '.', '')}} </p>
                        <p class="font-normal dark:text-gray-600 text-base leading-4 text-gray-600 mt-4"></p>
                        </div>
                </div>

                    
    @endif                
    
    @endforeach
    @endforeach
</div>

<script>
    let defaultTransform = 0;
function goNextDisc() {
    defaultTransform = defaultTransform - 268;
    var slider = document.getElementById("sliderdiscount");
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 3.0) defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
next.addEventListener("click", goNextDisc);
function goPrevDisc() {
    var slider = document.getElementById("sliderdiscount");
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 268;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
prev.addEventListener("click", goPrevDisc);


let defaultTransformC = 0;
function goNextCat() {
    defaultTransformC = defaultTransformC - 368;
    var sliderC = document.getElementById("slidercategory");
    if (Math.abs(defaultTransformC) >= sliderC.scrollWidth / 2.0) defaultTransformC = 0;
    sliderC.style.transform = "translateX(" + defaultTransformC + "px)";
}
nextC.addEventListener("click", goNextCat);
function goPrevCat() {
    var sliderC = document.getElementById("slidercategory");
    if (Math.abs(defaultTransformC) === 0) defaultTransformC = 0;
    else defaultTransformC = defaultTransformC + 368;
    sliderC.style.transform = "translateX(" + defaultTransformC + "px)";
}
prevC.addEventListener("click", goPrevCat);
</script>    
    
@endsection