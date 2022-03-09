<x-layout>
    <div class="mt-2 col-6 m-auto d-flex justify-content-center">
        <h2>Here you can edit property {{ $property->name }}</h2>
    </div>
    <div class="col-4 m-auto mt-3">
        <form action="{{ action([\App\Http\Controllers\PropertiesController::class, 'update'], $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label class="form-label">Property name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $property->name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Property address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('name', $property->address) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description"
                          name="description">{{ old('name', $property->description) }}</textarea>
            </div>
            <div class="input mb-4">
                <label for="image" class="form-label mb-3">Property image</label>
                <div style="max-width: 150px;" class="mb-2">
                    <img width="100%" src="{{ asset('storage/prop_img/' . $property->image) }}" alt="...">
                </div>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Price $</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('name', $property->price) }}">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="mortgage_status"
                   {{ $property->mortgage_status ? 'checked' : '' }}>
                <label style="color: red" class="form-check-label" for="flexSwitchCheckDefault">If your property is
                    mortgaged please check this input</label>
            </div>

            @include('error')
            <button type="submit" class="btn btn-warning">Update property</button>
        </form>
        <form action="{{ action([\App\Http\Controllers\PropertiesController::class, 'destroy'], $property->id) }}" class="mt-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</x-layout>