@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/edituser.css')?>" type="text/css">

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
        <div class="column">
            <div class="photo"><img src="{{ asset('images')}}/{{ $user->image }}" /></div>
        </div>

        <div class="column">
            <div class="forms">
                <form action="{{ url('updateuser') }}" method="POST">
                    @csrf
                    <div class="column2">
                        <div class="inputs">
                            First Name: <br><input type="text" name="firstname" id='firstname' maxlength="25" value="{{$user['firstname']}}">
                        </div>
                        <div class="inputs">
                         <br>   Last Name: <br><input type="text" name="lastname" id='lastname' maxlength="25" value="{{$user['lastname']}}">
                        </div>
                        <div class="inputs">
                         <br>   Email: <br><input type="email" name='email' id='email' value="{{$user['email']}}">
                        </div>
                        <div class="inputs">
                          <br>  Password: <br><input type="password" name='password' id='password'>
                        </div>
                        <div class="inputs">
                          <br>  Confirm Password:  <br><input type="password" name='confirm_password' id='confirm_password'>
                        </div>
                    </div>
                    <div class="column2">
                        <div class="gender">
                            Gender: <br>
                            <input type="radio" name="gender" value="male"> Male<br>
                            <input type="radio" name="gender" value="female"> Female<br>
                        </div>
                        <div class="role">
                          <br>  Role: {{$user->role}}
                        </div>
                        <div class="inputs">
                           <br> Image:  <br><br><input type="file" name="image" id="image">
                        </div>
                        <br><br><br><br>
                        <input type="submit" value="Submit">
                        <button><a href="/home">Back</a></button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    @endsection
