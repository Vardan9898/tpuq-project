<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PropertiesController extends Controller
{
    public function index()
    {
        return view('properties.index', [
            'properties' => Property::latest()->paginate(7)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'            => 'required',
            'image'           => 'required|image',
            'address'         => 'required',
            'description'     => 'required',
            'mortgage_status' => 'boolean',
            'price'           => 'required|numeric',
        ]);
        if (request()->get('mortgage_status') == null) {
            $mortgage_status = 0;
        } else {
            $mortgage_status = request('mortgage_status');
        }

        $attributes['user_id'] = auth()->id();
        $attributes['image'] = request()->file('image')->store('prop_img');

        Property::create($attributes);

        return redirect('/properties');
    }

    public function show(Property $property)
    {
        return view('properties.show', [
            'property' => $property,
        ]);
    }

    public function edit(Property $property)
    {
        return view('properties.edit', [
            'property' => $property,
        ]);
    }

    public function update(Property $property)
    {
        $attributes = request()->validate([
            'name'            => 'required',
            'image'           => 'image',
            'address'         => 'required',
            'description'     => 'required',
            'mortgage_status' => 'boolean',
            'price'           => 'required|numeric',
        ]);

        if ($attributes['image'] ?? false) {
            $attributes['image'] = request()->file('image')->store('prop_img');
        }

        $property->update($attributes);

        return redirect('/properties')->with('success', 'Property Updated!');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect('/properties')->with('success', 'Property deleted');
    }
}
