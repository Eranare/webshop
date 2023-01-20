<!DOCTYPE html>
<html class= "h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full container mx-auto px-2">
    <div class="min-h-full">
        <div>

            <header class="py-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class ="text-3xl font-bold text-white">Shop</h1>
                </div>
            </header>
         <!--   <nav>
                <a href="{{ route('cart.list') }}" class="flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg> 

                            @if (Cart::getTotalQuantity()> 0) {
                                {{ Cart::getTotalQuantity()}} }
                                @endif
                        </a>
            </nav> -->

        </div>
        <main>
            <div class ="#">
            @yield ('body')
            </div>
        </main>
    </div>
    <script src="#"></script><!--Script voor background hier -->
</body>
</html>

