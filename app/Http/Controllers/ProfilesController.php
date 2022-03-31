<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateUserRequest;
use App\Models\Property;
use App\Models\Tenancy;

class ProfilesController extends Controller
{
    public function show(Property $property, Tenancy $tenancy)
    {
        return view('profile.index', [
            'user'                => auth()->user(),
            'percentOfProperties' => round(auth()->user()->properties()->count() / $property->count() * 100),
            'percentOfTenancies'  => round(auth()->user()->tenancies()->count() / $tenancy->count() * 100),
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        $attributes = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->image) {
            $request->file('image')->store('/public/users');
            $attributes['image'] = $request->file('image')->hashName();
        }

        $user = auth()->user();

        $user->update($attributes);

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
