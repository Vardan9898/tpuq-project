<x-layout>
    <div class="d-flex justify-content-center row mt-lg-5">
        <div class="card col-6 mt-5 justify-content-center">
            <form action="{{ action([\App\Http\Controllers\TenantsController::class, 'store']) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="input-group input-group-merge mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                        </div>
                        <input class="form-control" placeholder="Tenant name" type="text" id="name" name="name"
                               value="{{ old('name') }}">
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <input class="form-control" placeholder="Tenant address" type="text" id="address"
                               name="address" value="{{ old('address') }}">
                    </div>
                    <div class="input-group input-group-merge mt-3">
                        <input class="form-control" placeholder="Image" type="file" id="image" name="image">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ni ni-image"></i></span>
                        </div>
                    </div>
                    @include('error')
                    <button type="submit" class="btn btn-success mt-5">Create</button>
                    <a href="{{ url()->previous() }}"
                       class="btn btn-secondary bg-gradient-gray border-0 text-white mt-5">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
