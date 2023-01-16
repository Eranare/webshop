@extends('layouts.app')

@section('content')
<br>

<nav class="#">
                <li><a href = "#"> Pending Orders</a></li>
                <li><a href = "#"> Statistics</a></li>
                <li><a href ="#"> Completed Orders</a></li>
                <li><a class="btn btn-success" href="{{ route('adminproduct.index') }}"> Product Management</a></li>
                <li><a class="btn btn-success" href="{{ route('admincategory.index') }}"> Category Management</a></li>

              
@endsection