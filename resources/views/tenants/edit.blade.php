<x-layout>
    <div class="mt-5 col-6 m-auto d-flex justify-content-center">
        <h1>Here you can update tenant {{ $tenant->name }}</h1>
    </div>
    <div class="col-4 m-auto mt-5">
        <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'update'], $tenant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label class="form-label">Tenant name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tenant->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tenant address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $tenant->address }}">
            </div>
            <div class="input mb-4">
                <label for="image" class="form-label mb-3">Tenant image</label>
                <div style="max-width: 150px;" class="mb-2">
                    <img width="100%" src="{{ asset('storage/tenants/' . $tenant->image) }}" alt="...">
                </div>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            @include('error')
            <div>
                <button type="submit" class="btn btn-warning">Update tenant</button>
            </div>
        </form>
        <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'destroy'], $tenant->id) }}" class="mt-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
</x-layout>