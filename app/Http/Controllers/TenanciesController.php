<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenancyRequest;
use App\Http\Requests\UpdateTenancyRequest;
use App\Models\Property;
use App\Models\Tenancy;
use App\Models\Tenant;

class TenanciesController extends Controller
{
    public function index()
    {
        return view('tenancies.index', [
            'tenancies' => Tenancy::latest()->paginate(6)->withQueryString(),
        ]);
    }

    public function create(Property $property)
    {
        return view('tenancies.create', [
            'property' => $property,
            'tenants'  => Tenant::latest()->get(),
        ]);
    }

    public function store(CreateTenancyRequest $request, Property $property)
    {
        request()->validate([
            'tenant_id' => 'required|exists:tenants,id',
        ]);

        $property->tenancies()->create([
            'user_id'   => $request->user()->id,
            'tenant_id' => $request->tenant_id,
        ]);

        return redirect()->action([TenanciesController::class, 'index'])->with('success', 'Tenancy created!');
    }

    public function edit(Tenancy $tenancy)
    {
        return view('tenancies.edit', [
            'tenancy'        => $tenancy,
            'selectedTenant' => $tenancy->tenant,
            'tenants'        => Tenant::latest()->get(),
        ]);
    }

    public function update(UpdateTenancyRequest $request, Tenancy $tenancy)
    {
        $tenancy->update(['tenant_id' => $request->tenant]);

        return redirect()->action([TenanciesController::class, 'index'])->with('success', 'Tenancy updated!');
    }

    public function destroy(Tenancy $tenancy)
    {
        $tenancy->delete();

        return redirect()->action([TenanciesController::class, 'index'])->with('success', 'Tenancy deleted!');
    }
}
