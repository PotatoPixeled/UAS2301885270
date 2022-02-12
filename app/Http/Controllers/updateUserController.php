<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class updateUserController extends Controller
{
    public function edit(){
        $user = User::find(Auth::user()->id);
        return view('edituser',['user' => $user] );
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:25',
            'lastname' => 'required|max:25',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password|min:8',
            'image' => 'required'
        ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $gender = $request['gender'];
        $email = $request->input('email');
        $password = $request['password'];
        if ($request->file('image') == null) {
            $imageName = "";
        }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $user = User::find(Auth::user()->id);

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->gender = $gender;
        $user->email = $email;
        $user->password = $password;
        $user->image = $imageName;

        // $user->save();

    $user->update(request()->all());
        // Auth::setUser($user);
        // Log::error(Auth::user()->name);

        return Redirect::to('/home');

  }

  public function userrole(Request $request, User $user){
    return view('role', ['user' => $user]);
}

public function storerole(Request $request, $id){

    $user = [
        'role' => $request->role,
    ];


    $user['role'] = $request->get('role');
    User::where('id',$id)->update($user);
    return redirect('/home');
}
}
