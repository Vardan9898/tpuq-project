<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password.index');
    }

    public function store(Request $request)
    {
        $email = $request->validate([
           'email' => 'required|email|max:255|exists:users,email'
        ]);
        Mail::to($email)->send(new ResetPasswordLink);
    }

    public function aaa()
    {
        return view('emails.reset-password-link');
    }
}
