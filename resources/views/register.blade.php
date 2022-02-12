@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/register.css')?>" type="text/css">

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
            <form action="/store" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                    <div class="column left">
                        <div class="inputs">
                            First Name: <br><input type="text" name="firstname" id='firstname' maxlength="25">
                         </div>
                         <div class="inputs">
                            <br> Last Name: <br><input type="text" name="lastname" id='lastname' maxlength="25">
                         </div>
                         <div class="inputs">
                           <br>  Email: <br><input type="email" name='email' id='email'>
                         </div>
                         <div class="inputs">
                            <br> Password: <br><input type="password" name='password' id='password'>
                         </div>
                         <div class="inputs">
                            <br> Confirm Password: <br> <input type="password" name='confirm_password' id='confirm_password'>
                         </div>
                    </div>
                    <div class="column right">
                        <div class="gender">
                            Gender: <br>
                            <input type="radio" name="gender" value="male"> Male<br>
                            <input type="radio" name="gender" value="female"> Female<br>
                        </div>
                        <div class="role">
                           <br> Role: <br>
                            <input type="radio" name="role" value="user"> user<br>
                            <input type="radio" name="role" value="admin"> admin<br>
                        </div>
                        <div class="inputs">
                           <br> Image: <br> <br> <input type="file" name="image" id="image">
                        </div>
                        <br>
                        <input type="submit" value="Submit">
                    </div>


            </form>
        </div>
    </div>


    @endsection
