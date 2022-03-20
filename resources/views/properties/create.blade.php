<x-layout>
    <div class="d-flex justify-content-center row mt-lg-5">
        <div class="card col-6 mt-5 justify-content-center">
            <form action="{{ action([\App\Http\Controllers\PropertiesController::class, 'store']) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="input-group input-group-merge mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-building"></i></span>
                        </div>
                        <input class="form-control" placeholder="Property name" type="text" id="name" name="name"
                               value="{{ old('name') }}">
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <input class="form-control" placeholder="Property address" type="text" id="address"
                               name="address" value="{{ old('address') }}">
                    </div>
                    <div class="input-group input-group-merge mt-3">
                            <textarea name="description" class="form-control" rows="4"
                                      placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <input class="form-control" id="price" name="price" value="{{ old('price') }}"
                               placeholder="Price" type="text">
                        <div class="input-group-append">
                            <span class="input-group-text"><small class="font-weight-bold">USD</small></span>
                        </div>
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <input class="form-control" placeholder="Image" type="file" id="image" name="image">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ni ni-image"></i></span>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox mb-3 mt-3">
                        <input class="custom-control-input" id="customCheck" type="checkbox" name="mortgage_status"
                               value="1">
                        <label class="custom-control-label" for="customCheck">If your property is mortgaged please
                            check this input</label>
                    </div>
                    @include('error')
                    <button type="submit" class="btn btn-success mt-4">Create</button>
                    <a href="{{ url()->previous() }}"
                       class="btn btn-secondary bg-gradient-gray border-0 text-white mt-4">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
