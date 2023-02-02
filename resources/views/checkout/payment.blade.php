<!--Fake payment window  mspaint ideal
Show actual number

push button sends to confirm
--><!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" bg-gray-100 -z-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="styles.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src ="https://cdn.tailwindcss.com"></script>

</head>
<body class="container">
<img class = "w-full h-full -z-5 flex sticky" src="{{asset('bevestig.jpg')}}"  > 
${{ Cart::getTotal() }}
<br>
<style>
.buttonbasket{
  display:none;
} 
</style>

<br>
<form action="{{ route('cart.postCheckout') }}" method="GET" enctype="multipart/form-data">
<button><img src="{{asset('bevestig knop.jpg')}}" class="flex top-90 left-90
"></button>
</form>
</body>