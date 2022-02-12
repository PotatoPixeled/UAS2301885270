@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="<?php echo asset('css/manageuser.css')?>" type="text/css">
    <div class="container">
        @foreach ($users as $user)
            <div class="listorder">
                <div class="item">
                        {{$user->firstname}} {{$user->lastname}} - {{$user->role}}
                </div>

                <div class="role">
                    <a href= "{{ route('userrole', $user->id) }}" ><button class="button2" id="button role"> Change Role</button></a>
                </div>


                <div class="delete">
                    <a href= {{"delete/".$user['id']}} ><button class="button2" id="button delete"> Delete</button></a>
                </div>
            </div>
        @endforeach
        <button class="button2 back"><a href="/home">Back</a></button>
    </div>




    @endsection
