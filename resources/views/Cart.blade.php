@extends('layout.app')


@section('body')
<style>
.buttonbasket{
  display:none;
} 
</style>
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                <div class="mx-auto flex min-h-screen max-w-screen-sm items-center justify-center">
  <div class="h-full w-full rounded-md bg-gradient-to-b from-pink-500 via-red-500 to-yellow-500 p-4">
    <div class="flex h-full w-full items-center justify-center bg-slate-100 back">
                      <form action="{{route('categories.index')}}">
                        <button class="px-6 py-2 my-4 text-green-800 bg-blue-300 rounded-lg">Return to Shop</button>
                      </form>
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                  <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                </a>
                              </td>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                  
                                </a>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form class="flex" action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" min="1" max= "{{ $item->attributes->stock }}" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-12 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 py-1 ml-2 text-white bg-blue-500 rounded-lg">Update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-4 py-1 text-sm text-white bg-red-500 rounded-full">X</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div>
                         <strong>Total: ${{ Cart::getTotal() }}</strong>
                        </div>
                        <div>
                          <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 my-4 text-red-800 bg-red-300 rounded-lg">Remove All Cart</button>
                          </form>
                          @if (Cart::getTotal() <= 0)
                          <form action="#">
                            <button class="px-6 py-2 text-green-800 bg-green-300 rounded-lg">Checkout</button>
                          </form> 
                          @else
                          <form action="{{ route('cart.checkout') }}">
                            <button class="px-6 py-2 text-green-800 bg-green-300 rounded-lg">Checkout</button>
                          </form>
                          @endif
                        </div>
                      </div>
                      </div>
</div>
                    </div>
                  </div>
            </div>
        </main>
    @endsection