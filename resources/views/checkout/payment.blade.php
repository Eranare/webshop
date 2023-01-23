<!--Fake payment window  mspaint ideal
Show actual number

push button sends to confirm
-->
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