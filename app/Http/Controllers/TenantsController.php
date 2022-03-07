<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TenantsController extends Controller
{
    public function index()
    {
        return view('tenants.index', [
            'tenants' => Tenant::latest()->paginate(6)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'    => 'required|string|max:255',
            'image'   => 'required|image|max:10240',
            'address' => 'required|string|max:255',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['image'] = request()->file('image')->store('tenants');

        Tenant::create($attributes);

        return redirect()->route('tenants')->with('success', 'Tenant created!');
    }

    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', [
            'tenant' => $tenant,
        ]);
    }

    public function update(Tenant $tenant)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'image'   => 'image|max:10240',
            'address' => 'required|string|max:255',
        ]);

        if (request()->has('image')) {
            $attributes['image'] = request()->file('image')->store('tenants');
        }

        $tenant->update($attributes);

        return redirect()->route('tenants')->with('success', 'Tenant updated!');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants')->with('success', 'Tenant deleted!');
    }
}
