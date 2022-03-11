<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|min:3|unique:users,username',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|max:255|min:6',
            'image'    => 'required|image|max:10240',
        ]);
        $attributes['image'] = request()->file('image')->store('public/images');

        $user = User::create($attributes);
        auth()->login($user);

        return redirect()->action([PropertiesController::class, 'index'])->with('success', 'Your account has been created.');
    }
}
