@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/detail.css')?>" type="text/css">

    <div class="container">

        <div class="right">
            <div class="detail">Title:  {{ $product->title }} </div>
            <div class="detail">Author:  {{ $product->Author }} </div>
            <div class="detail">Description:    {{ $product->description}}</div>


           <form action="/addtocart" method="POST">
               @csrf
               <input type="hidden" name="product_title" value="{{$product->title}}">
               <button class="button-cart">Rent</button>
           </form>
        </div>
    </div>



    @endsection
