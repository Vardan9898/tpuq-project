<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
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

    public function store(CreateUserRequest $request)
    {
        $request['image'] = request()->file('image')->store('public/images');

        $user = User::create($request->all());

        auth()->login($user);

        return redirect()->action([PropertiesController::class, 'index'])->with('success',
            'Your account has been created.');
    }
}
