<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'            => 'required|string|max:255',
            'image'           => 'required|image|max:10240',
            'address'         => 'required|string|max:255',
            'description'     => 'required|string|max:1000',
            'mortgage_status' => 'boolean',
            'price'           => 'required|numeric|digits_between:1,255',
        ]);

        $attributes['user_id'] = auth()->id();
        $request->file('image')->store('/public/prop_img');
        $attributes['image'] = $request->file('image')->hashName();

        Property::create($attributes);

        return redirect()->action([PropertiesController::class, 'index'])->with('success', 'Property created!');
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

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'image|max:10240',
            'address'     => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price'       => 'required|numeric|digits_between:1,255',
        ]);

        $attributes = [
            'name'            => $request->name,
            'address'         => $request->address,
            'description'     => $request->description,
            'mortgage_status' => (bool) $request->mortgage_status,
            'price'           => $request->price,
        ];

        if ($request->has('image')) {
            $request->file('image')->store('/public/prop_img');
            $attributes['image'] = $request->file('image')->hashName();
        }

        $property->update($attributes);

        return redirect()->action([PropertiesController::class, 'index'])->with('success', 'Property updated!');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->action([PropertiesController::class, 'index'])->with('success', 'Property deleted!');
    }
}
