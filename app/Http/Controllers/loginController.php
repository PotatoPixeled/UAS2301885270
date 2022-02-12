<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if($request->remember){
            Cookie::queue('email', $credentials['email'], 120);
        }

        if(Auth::attempt($credentials)){
            return redirect('/home');
        }
        else return redirect()->back()->withErrors('Wrong Credential!');
    }

    public function logout(){
        Cart::truncate();
        Auth::logout();
        return redirect('/');
    }
}
