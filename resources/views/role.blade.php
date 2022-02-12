@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/register.css')?>" type="text/css">

{{$user->firstname}} {{$user->lastname}} <br>
Role : {{$user->role}}

<form action="{{ url('storerole',$user->id) }}" method="POST">
    @csrf
    <div class="role">
        <p>Role: </p>
        <input type="radio" name="role" value="user"> user<br>
        <input type="radio" name="role" value="admin"> admin<br>
    </div>
    <input type="submit" value="submit">
</form>
@endsection
