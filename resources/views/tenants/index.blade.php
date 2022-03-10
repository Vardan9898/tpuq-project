<x-layout>
    <div class="row text-center d-flex justify-content-center mt-5">
        @foreach($tenants as $tenant)
            <div class="col-xl-3 col-sm-6 mb-5 mt-3">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset($tenant->image_url) }}"
                                                                       alt="" width="100"
                                                                       class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">{{ $tenant->name }}</h5>
                    <span class="small text-uppercase text-muted">{{ $tenant->address }}</span>
                </div>
                <a href="{{ action([\App\Http\Controllers\TenantsController::class, 'edit'], $tenant->id) }}" class="btn btn-warning w-100">Edit or delete</a>
            </div>
        @endforeach
    </div>
    {{ $tenants->links('pagination::bootstrap-5') }}
</x-layout>

