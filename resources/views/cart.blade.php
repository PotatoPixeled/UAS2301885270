@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/cart.css')?>" type="text/css">
    <div class="box">
        <div class="sub">
            Book Title
        </div>
        <br>
        <div class="item">
            @foreach ($carts as $cart)
                {{$cart->product_title}}
                <div class="delete">
                    <a href= {{"delete/".$cart['id']}} ><button class="delete-but"> Delete</button></a>
                </div>
                <br>
                <br>
            @endforeach
        </div>
    </div>

@endsection
