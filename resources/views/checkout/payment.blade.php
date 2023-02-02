<!--Fake payment window  mspaint ideal
Show actual number

push button sends to confirm
-->
<img class = "w-full h-full -z-5" src="{{asset('bevestig.jpg')}}"  > 
${{ Cart::getTotal() }}
<br>
<style>
.buttonbasket{
  display:none;
} 
</style>

<br>
<form action="{{ route('cart.postCheckout') }}" method="GET" enctype="multipart/form-data">
<button> confirm </button>
</form>