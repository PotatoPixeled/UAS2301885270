@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/editproduct.css')?>" type="text/css">
    <div class="forms">
        <form action="{{ url('update',$product->id) }}" method="POST">
            @csrf
            <div class="inputs">
                Title: <input type="text" name='title' id='title' value="{{$product->title}}">
            </div>
            <div class="inputs">
              <br> Author: <input type="text" name="author" id='author'  maxlength="30" value="{{$product->author}}">
            </div>
            <div class="inputs">
               <br> Description: <input type="text" name='description' id='description' value="{{$product->description}}">
            </div>


               <br> <input type="submit" value="Update">

               <button><a href="/home">Back</a></button>
        </form>
    </div>


    @endsection
