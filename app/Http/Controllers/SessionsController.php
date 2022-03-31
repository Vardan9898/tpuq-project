<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionRequest;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(CreateSessionRequest $request)
    {
        $attributes = $request->except('_token');

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.',
            ]);
        }

        session()->regenerate();

        return redirect()->action([PropertiesController::class, 'index'])->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->action([RegisterController::class, 'index'])->with('success', 'Goodbye!');
    }
}
