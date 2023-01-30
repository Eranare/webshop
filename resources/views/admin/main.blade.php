@extends('layouts.app')

@section('content')
<div class= "container ">
    <div class="content-center">
              <div class="text-2xl">Welcome to the admin panel</div>
              <video id='video'autoplay="true" muted="true" loop="true" class='  flex content-center  pointer-events-none  w-2/5 '  src = "{{asset('spooder.mp4')}}"></video>

            </div>
</div>
            @endsection