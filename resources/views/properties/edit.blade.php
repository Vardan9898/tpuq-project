<x-layout>
    <div class="mt-2 col-6 m-auto d-flex justify-content-center">
        <h2>Here you can edit property {{ $property->name }}</h2>
    </div>
    <div class="col-4 m-auto mt-3">
        <form action="/properties/{{ $property->id }}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label class="form-label">Property name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $property->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Property address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $property->address }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description"
                          name="description">{{ $property->description }}</textarea>
            </div>
            <div class="input mb-4">
                <label for="image" class="form-label mb-3">Property image</label>
                <div style="max-width: 150px;" class="mb-2">
                    <img width="100%" src="{{ asset('storage/' . $property->image) }}" alt="...">
                </div>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Price $</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="mortgage_status"
                       value="1" {{ $property->mortgage_status == '1' ? 'checked' : '' }}>
                <label style="color: red" class="form-check-label" for="flexSwitchCheckDefault">If your property is
                    mortgaged please check this input</label>
            </div>

            @include('error')
            <div>
                <button type="submit" class="btn btn-warning">Update property</button>
            </div>
        </form>
        <form action="/properties/{{ $property->id }}/edit" class="mt-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</x-layout>