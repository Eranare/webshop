<!DOCTYPE html>
<html class= "h-full bg-fixed bg-gradient-to-t from-yellow-100 to-pink-400">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candyshop - @yield('title')</title>
    <script src ="https://cdn.tailwindcss.com"></script>
    
</head>

<body class="h-full">
    
<video id='video'autoplay="true" muted="true" loop="true" class='fixed  pointer-events-none -z-20 w-full'  src = "/storage/Background.mp4"></video>

    <div class=" container mx-auto px-2 bg-cyan-50 bg-opacity-25 sticky top-0 left-0">

   <!-- <canvas id="BG" style= "position: fixed; top:0 left:0; z-index:-4;">        </canvas>-->
        <div class="min-h-full">
        
            <div>
                <header class="container">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <svg> </svg>
                        <h1 class ="text-3xl font-bold text-white">Shop</h1> Replace with logo
                    </div>
                </header>


        

            </div>
            <main class="backdrop-blur-sm">
            
                <button class="buttonbasket group  h-05 w-32 overflow-hidden rounded-lg bg-white text-xl shadow float-right sticky top-60 z-50" > 
                    <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"> </div>
                        <span class="relative text-black group-hover:text-white">                <a href="{{ route('cart.list') }}" class="flex items-center">
                            <p><svg class="w-10 h-10" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg></p>
                                @if (Cart::getTotalQuantity()>= 0) {
                                    {{ Cart::getTotalQuantity()}} }
                                @endif
                                </a>                            
                        </span>
                
                </button>
                


                <div class ="#">
                @yield ('body','Default Content')
                </div>
            </main>
        </div>
    </div>
    


</body>
</html>

