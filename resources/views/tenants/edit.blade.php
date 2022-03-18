<x-layout>
    <div class="col-4 m-auto mt-5">
        <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'update'], $tenant->id) }}"
              method="POST" enctype="multipart/form-data">
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
                    <img width="100%" src="{{ asset($tenant->image_url) }}" alt="...">
                </div>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            @include('error')
            <div>
                <button type="submit" class="btn btn-warning">Update tenant</button>
            </div>
        </form>
        <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'destroy'], $tenant->id) }}"
              class="mt-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>
{{--    <div class="cards d-flex justify-content-center row mt-5">--}}
{{--        <div class="card position-relative">--}}
{{--            <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'update'], $tenant->id) }}"--}}
{{--                  method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('PATCH')--}}
{{--                <img class="card-img-top" src="{{ asset($tenant->image_url) }}" alt="...">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="input-group input-group-merge">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                            <span class="input-group-text"><i class="ni ni-building"></i></span>--}}
{{--                        </div>--}}
{{--                        <input class="form-control" placeholder="Property name" type="text" id="name" name="name"--}}
{{--                               value="{{ $tenant->name }}">--}}
{{--                    </div>--}}
{{--                    <div class="input-group input-group-merge mt-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>--}}
{{--                        </div>--}}
{{--                        <input class="form-control" placeholder="Property address" type="text" id="address"--}}
{{--                               name="address" value="{{ $tenant->address }}">--}}
{{--                    </div>--}}
{{--                    <div class="input-group input-group-merge mt-3">--}}
{{--                            <textarea name="description" class="form-control" rows="4"--}}
{{--                                      placeholder="Description">{{ $tenant->description }}</textarea>--}}
{{--                    </div>--}}
{{--                    <div class="input-group input-group-merge mt-3">--}}
{{--                        <input class="form-control" id="price" name="price" value="{{ $tenant->price }}"--}}
{{--                               placeholder="Price" type="text">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <span class="input-group-text"><small class="font-weight-bold">USD</small></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="input-group input-group-merge mt-3">--}}
{{--                        <input class="form-control" placeholder="Image" type="file" id="image" name="image">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <span class="input-group-text"><i class="ni ni-image"></i></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="custom-control custom-checkbox mt-3">--}}
{{--                        <input class="custom-control-input" id="customCheck1" type="checkbox" name="mortgage_status"--}}
{{--                                {{ $tenant->mortgage_status ? 'checked' : '' }}>--}}
{{--                        <label class="custom-control-label" for="customCheck1">If your property is mortgaged please--}}
{{--                            check this input</label>--}}
{{--                    </div>--}}
{{--                    @include('error')--}}
{{--                    <button type="submit" class="btn btn-primary mt-5">Update</button>--}}
{{--                    <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}" class="btn btn-secondary bg-gradient-gray border-0 text-white mt-5">Cancel</a>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <form action="{{ action([\App\Http\Controllers\PropertiesController::class, 'destroy'], $property->id) }}"--}}
{{--                  class="mt-2 position-absolute delete-button" method="POST">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}

{{--                <div class="tooltip1"><button type="submit" class="border-0 delete-btn"><i class="fas fa-trash"></i></button>--}}
{{--                    <span class="tooltiptext">Delete</span>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-layout>
