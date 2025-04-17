<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        $attributes=request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>"Invalid Email Credentials",//will only need one error message for security reasons
            ]);
        }
        
        request()->session()->regenerate();//regenerate session for security reasons
        return redirect('/')->with('success','Logged In successfully!');
    }
    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged Out successfully!');
    }
}
