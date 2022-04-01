<x-layout>
    <div class="cards d-flex justify-content-center row mt-5">
        <div class="card position-relative mt-5">
            <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'update'], $tenant->id) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <img class="card-img-top"
                     src="{{ $tenant->image ? asset($tenant->image_url) : asset('/storage/default_images/tenant-image.png') }}"
                     alt="...">
                <div class="card-body">
                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                        </div>
                        <input class="form-control" placeholder="Property name" type="text" id="name" name="name"
                               value="{{ old('name', $tenant->name) }}">
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <input class="form-control" placeholder="Property address" type="text" id="address"
                               name="address" value="{{ old('address', $tenant->address) }}">
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <input class="form-control" placeholder="Image" type="file" id="image" name="image">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ni ni-image"></i></span>
                        </div>
                    </div>
                    @include('error')
                    <button type="submit" class="btn btn-primary mt-5">Update</button>
                    <a href="{{ url()->previous() }}"
                       class="btn btn-secondary bg-gradient-gray border-0 text-white mt-5">Back</a>
                </div>
            </form>
            <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'destroy'], $tenant->id) }}"
                  class="mt-2 position-relative delete-button" method="POST">
                @csrf
                @method('DELETE')
                <div class="tooltip1 position-absolute edit-tooltip">
                    <button type="submit" class="border-0 delete-btn"><i class="fas fa-trash"></i></button>
                    <span class="tooltiptext">Delete</span>
                </div>
            </form>
        </div>
    </div>
</x-layout>
