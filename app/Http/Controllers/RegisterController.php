<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:7',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

//        session()->flash('success', 'Your account has been created.'); SAME AS REDIRECT WITH

        return redirect('/')->with('success', 'Your account has been created.');
    }

    public function create()
    {
        return view('register.create');
    }
}
