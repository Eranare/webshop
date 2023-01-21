
<button class="group  h-05 w-32 overflow-hidden rounded-lg bg-white text-lg shadow float-right sticky top-20 z-50" > 
<div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
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
