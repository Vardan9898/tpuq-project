<x-layout>
    <div class="row text-center d-flex justify-content-between mt-5 mb-2">
        @foreach($tenants as $tenant)
            <div class="card card-profile tenants col-lg-3 m-3">
                <img src="{{ asset('/storage/default_images/img-1-1000x600.jpg') }}" alt="Image placeholder"
                     class="card-img-top w-100">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <img src="{{ asset($tenant->image_url) }}" class="rounded-circle imgForProfile" alt="...">
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="{{ action([\App\Http\Controllers\TenantsController::class, 'edit'], $tenant->id) }}"
                           class="btn btn-sm btn-info mr-4">Edit</a>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">{{ $tenant->properties->count() }}</span>
                                    <span class="description">Tenancy</span>
                                </div>
                                <div>
                                    <span class="heading">1</span>
                                    <span class="description">Photos</span>
                                </div>
                                <div>
                                    <span class="heading">89</span>
                                    <span class="description">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">{{ $tenant->name }}</h5>
                        <div class="address1 d-flex align-items-center justify-content-center">
                            <i class="ni ni-pin-3 mr-2"></i>
                            <p class="h5 font-weight-300">{{ $tenant->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $tenants->links('pagination::bootstrap-5') }}
</x-layout>
