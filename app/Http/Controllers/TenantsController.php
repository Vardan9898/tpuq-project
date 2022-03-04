<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

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
            'name'    => 'required|max:255',
            'image'   => 'required|image',
            'address' => 'required|max:255',
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['image'] = request()->file('image')->store('tenants');

        Tenant::create($attributes);

        return redirect('/tenants');
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
            'name'    => 'required',
            'image'   => 'image',
            'address' => 'required',
        ]);

        if ($attributes['image'] ?? false) {
            $attributes['image'] = request()->file('image')->store('tenants');
        }

        $tenant->update($attributes);

        return redirect('/tenants')->with('success', 'Tenant Updated!');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect('/tenants')->with('success', 'Tenant deleted');
    }
}
