@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/insertproduct.css')?>" type="text/css">

    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Whoops!</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="forms">
            <form action="/insertproduct" method="POST">
                @csrf
                    <div class="inputs">
                        Title: <input type="text" name='title' id='title'>
                    </div>
                    <div class="inputs">
                        Author: <input type="text" name="author" id='author'  maxlength="30">
                    </div>
                    <div class="inputs">
                        Description: <input type="text" name='description' id='description'>
                    </div>

                    <br><br>
                    <div class="button2">
                        <input type="submit" value="submit">
                        <button><a href="/home">back</a></button>
                    </div>

            </form>
        </div>
    </div>




    @endsection
