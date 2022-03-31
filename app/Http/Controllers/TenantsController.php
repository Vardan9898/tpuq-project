<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Tenant;

class TenantsController extends Controller
{
    public function index()
    {
        $tenants = Tenant::latest()->paginate(6)->withQueryString();

        return view('tenants.index', [
            'tenants' => $tenants,
        ]);
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(CreateTenantRequest $request)
    {
        $attributes = $request->all();

        $attributes['user_id'] = auth()->id();
        $request->file('image')->store('public/tenants');
        $attributes['image'] = $request->file('image')->hashName();

        Tenant::create($attributes);

        return redirect()->action([TenantsController::class, 'index'])->with('success', 'Tenant created!');
    }

    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', [
            'tenant' => $tenant,
        ]);
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        $attributes = $request->all();

        if ($request->has('image')) {
            $request->file('image')->store('public/tenants');
            $attributes['image'] = $request->file('image')->hashName();
        }

        $tenant->update($attributes);

        return redirect()->action([TenantsController::class, 'index'])->with('success', 'Tenant updated!');

    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->action([TenantsController::class, 'index'])->with('success', 'Tenant deleted!');
    }
}
