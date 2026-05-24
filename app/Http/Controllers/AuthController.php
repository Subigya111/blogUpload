<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request ){
        $validated=$request->validated();
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password'],
            'remember_token'=> Str::random(10)

        ]);
        return redirect()->route('loginForm')->with('success','User Registered');
    }
    public function login(LoginRequest $request){
        $validated = $request->validated();
        $user = User::where('email',$validated['email'])->first();
        if (!$user ||!Hash::check($validated['password'],$user->password)) {
            return redirect()->route('loginForm')->with('error','Invalid credentials');
            }
        Auth::attempt($validated);
        $request->session()->regenerate(); //generates a new session after login preventing session fixation
        return redirect()->route('posts.create')->with('success','Logged in');
    }
    public function authLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')->with(['success'=>'Logged out successfully']);
    }
}

    

