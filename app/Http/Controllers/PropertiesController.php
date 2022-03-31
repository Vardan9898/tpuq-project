<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(7)->withQueryString();

        return view('properties.index', [
            'properties' => $properties,
        ]);
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(CreatePropertyRequest $request)
    {
        $request['user_id'] = auth()->id();
        $request->file('image')->store('/public/properties');
        $request['image'] = $request->file('image')->hashName();

        Property::create($request->all());

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

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $attributes = [
            'name'            => $request->name,
            'address'         => $request->address,
            'description'     => $request->description,
            'mortgage_status' => (bool) $request->mortgage_status,
            'price'           => $request->price,
        ];

        if ($request->has('image')) {
            $request->file('image')->store('/public/properties');
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
