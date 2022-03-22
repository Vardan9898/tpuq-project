<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot-password.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::to($request->email)->send(new ResetPassword($token));

        return redirect()->action([SessionsController::class, 'create'])->with('success',
            'Please check your email address!');
    }

    public function edit($token)
    {
        return view('forgot-password.reset-password-form', ['token' => $token]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email|exists:users',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (!$updatePassword) {
            return redirect()->action([SessionsController::class, 'create'])->with('error',
                'Please try reset your password again!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->action([SessionsController::class, 'create'])->with('success',
            'Your password has been changed!');
    }
}
