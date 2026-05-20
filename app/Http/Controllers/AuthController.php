<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request ){
        $validated=$request->validated();
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password'],
        ]);
        return redirect()->route('loginForm')->with('success','User Registered');
    }
    public function login(LoginRequest $request){
        $validated=$request->validated();
        $user=User::where('email',$validated['email'])->first(); //checks if user exists
        if(!$user||(!Hash::check($validated['password'],$user->password))){
            return redirect()->route('loginForm')->with('error','Invalid credentials');
        }
        return redirect()->route('posts.create')->with('success','Logged in ');

    }
    // public function logout()
}
