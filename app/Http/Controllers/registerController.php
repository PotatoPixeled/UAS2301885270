<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class registerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:25',
            'lastname' => 'required|max:25',
            'gender' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password|min:8',
            'image' => 'required'
        ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $gender = $request['gender'];
        $role = $request['role'];
        $email = $request->input('email');
        $password = $request['password'];
        if ($request->file('image') == null) {
            $imageName = "";
        }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $user = new User();
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->gender = $gender;
        $user->role = $role;
        $user->email = $email;
        $user->password = $password;
        $user->image = $imageName;

        $user-> save();
        Auth::login($user);
        return Redirect::to('/home');

  }

}
