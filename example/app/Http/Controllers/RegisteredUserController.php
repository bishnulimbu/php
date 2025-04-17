<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class RegisteredUserController extends Controller
{
    //
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // dd(request()->all());
        // validate->create->logion
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed',Password::min(6)],
        ]);
       $user= User::create([
            'first_name'=>request('first_name'),
            'last_name'=>request('last_name'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')),
        ]);
        
        Auth::login($user);
        return redirect('/')->with('success', 'Logged Out successfully!');
    }
}
