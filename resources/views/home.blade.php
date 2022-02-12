@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/home.css')?>" type="text/css">


    <div class="list">

        @foreach ($products as $product)

            <div class="box">
                <div class="container">
                    <div class="details">
                        <div class="detail title"><a id="title" href="{{ route('productdetail', $product->id) }}">{{ $product->title }}</a> </div>
                       <div class="detail author">,by  {{ $product->author }} </div>
                       @if(Auth::user()->role == "admin")
                            <button><a href={{"edit/".$product['id']}}>edit</a></button>
                        @endif
                    </div>

            </div>



        </div>
        @endforeach
    </div>

@endsection
