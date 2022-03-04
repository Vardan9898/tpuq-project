<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenancy;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenanciesController extends Controller
{
    public function index()
    {
        return view('tenancies.index', [
            'tenancies' => Tenancy::latest()->paginate(7)->withQueryString(),
        ]);
    }

    public function create(Property $property)
    {
        return view('tenancies.create', [
            'property' => $property,
            'tenants'  => Tenant::latest()->get()->all(),
        ]);
    }

    public function store(Tenant $tenant, Property $property)
    {
        $property->tenancies()->create([
            'user_id'   => request()->user()->id,
            'tenant_id' => request('tenant'),
        ]);

        return redirect('tenancies')->with('success', 'Tenancy created');
    }

    public function edit(Tenancy $tenancy)
    {
        return view('tenancies.edit', [
            'tenancy'     => $tenancy,
            'tenant_name' => $tenancy->tenant['name'],
            'tenants'     => Tenant::latest()->get()->all(),
        ]);
    }

    public function update(Tenancy $tenancy)
    {
        $attributes['tenant_id'] = \request('tenant');


        $tenancy->update($attributes);

        return redirect('/tenancies')->with('success', 'Tenancy updated');
    }

    public function destroy(Tenancy $tenancy)
    {
        $tenancy->delete();

        return redirect('/tenancies')->with('success', 'Tenancy deleted');
    }
}
