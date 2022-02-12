@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css">

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

    <div class="content">
        <div class="forms">
            <form action="/login" method="POST">
                @csrf
                    <div class="inputs">
                        Email: <input type="email" name='email' id='email' value={{Cookie::get('email') != null ? Cookie::get('email') : ""}}>
                    </div>

                    <div class="inputs">
                        Password: <input type="password" name='password' id='password'>
                    </div>

                    <div class="inputs">
                        <input type="checkbox" name="remember" id="remember"> Remember Me
                    </div>

                    <button type="submit" id="login-button">Login</button>
            </form>
        </div>
    </div>

@endsection
