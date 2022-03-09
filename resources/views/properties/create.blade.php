<x-layout>
    <div class="mt-5 col-6 m-auto d-flex justify-content-center">
        <h1>Here you can create your property</h1>
    </div>
    <form action="{{ action([\App\Http\Controllers\PropertiesController::class, 'store']) }}" method="POST" class="col-4 m-auto mt-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Property name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Property address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description"
                      name="description">{{ old('description') }}</textarea>
        </div>
        <div class="input mb-4">
            <label for="image" class="form-label mb-3">Property image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Price $</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="mortgage_status"
                   value="1">
            <label style="color: red" class="form-check-label" for="flexSwitchCheckDefault">If your property is
                mortgaged please check this input</label>
        </div>

        @include('error')
        <button type="submit" class="btn btn-success">Create property</button>
    </form>
</x-layout>