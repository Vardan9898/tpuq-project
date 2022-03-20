<x-layout>
    <main>
        @if($tenancies->count())
            <div class="row text-center d-flex justify-content-center mt-5 mb-2">
                @foreach($tenancies as $tenancy)
                    <div class="card card-profile tenants col-lg-3 m-3 p-0">
                        <img src="{{ asset($tenancy->property->image_url) }}" alt="Image placeholder"
                             class="card-img-top w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <img src="{{ asset($tenancy->tenant->image_url) }}"
                                         class="rounded-circle imgForProfile" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'edit'], $tenancy->id) }}"
                                   class="btn btn-sm btn-info mr-4">Edit</a>
                                <form
                                    action="{{ action([\App\Http\Controllers\TenanciesController::class, 'destroy'], $tenancy->id) }}"
                                    class="delete-button" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="tooltip1">
                                        <button type="submit" class="border-0 delete-btn"><i class="fas fa-trash"></i>
                                        </button>
                                        <span class="tooltiptext">Delete</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><h3 class="m-0"><a
                                            href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $tenancy->property->id) }}">{{ $tenancy->property->name }}</a>
                                    </h3></li>
                                <li class="list-group-item address d-flex justify-content-center align-items-center">
                                    <i class="ni ni-pin-3 mr-2"></i>
                                    <p class="m-0">{{ $tenancy->property->address }}</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-center"><p class="m-0">
                                        ${{ $tenancy->property->price }}</p>
                                    @if($tenancy->property->mortgage_status)
                                        <div class="col-auto">
                                            <span class="badge badge-lg badge-danger">Mortgaged</span>
                                        </div>
                                    @endif
                                </li>
                                <li class="list-group-item address d-flex justify-content-center align-items-center">
                                    <i class="ni ni-circle-08 mr-2 mb-1"></i>
                                    <h5 class="h3 m-0">{{ $tenancy->tenant->name }}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $tenancies->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
