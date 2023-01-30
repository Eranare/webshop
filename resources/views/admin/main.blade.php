@extends('layouts.app')

@section('content')
<div class= "container">
              <div class="text-2xl">Welcome to the admin panel</div>
              <video id='video'autoplay="true" muted="true" loop="true" class='fixed  pointer-events-none  w-50%'  src = "{{asset('spooder.mp4')}}"></video>
</div>
@endsection