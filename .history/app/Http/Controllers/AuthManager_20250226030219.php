<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthManager extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended(route("home"));
        }
        return redirect("login")->with("error","Invalid Email or Password");

    }
    function register()
    {
        return view('auth.register');
    }
    function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $user = new user();
        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);
        $user = \App\User::create($data);
        auth()->login($user);
        return redirect()->route("home");
    }
}
