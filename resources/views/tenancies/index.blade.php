<x-layout>
    <main>
        @if($tenancies->count())
            <div class="row text-center d-flex justify-content-between mt-5 mb-2">
                @foreach($tenancies as $tenancy)
                    <div class="card card-profile tenants col-lg-3 m-3 p-0">
                        <img src="{{ asset($tenancy->property->image_url) }}" alt="Image placeholder"
                             class="card-img-top w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <img src="{{ asset($tenancy->tenant->image_url) }}" class="rounded-circle imgForProfile" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'edit'], $tenancy->id) }}"
                                   class="btn btn-sm btn-info mr-4">Edit</a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-0">
                            <div class="row">
                                <div class="col">
                                    @if($tenancy->property->mortgage_status)
                                        <span class="tag tag-teal mb-2">Mortgaged</span>
                                    @endif
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <div>
                                            <span class="heading">{{ $tenancy->count() }}</span>
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
                                <h5 class="h3">{{ $tenancy->tenant->name }}</h5>
                                <div class="address1 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-pin-3 mr-2"></i>
                                    <p class="h5 font-weight-300">{{ $tenancy->tenant->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

{{--            <div class="cards d-flex justify-content-center row">--}}
{{--                @foreach($tenancies as $tenancy)--}}
{{--                    <div class="card col-3">--}}
{{--                        <div class="card-header">--}}
{{--                            <img src="{{ asset($tenancy->property->image_url) }}"--}}
{{--                                 alt="..."/>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            @if($tenancy->property->mortgage_status)--}}
{{--                                <span class="tag tag-teal mb-2">Mortgaged</span>--}}
{{--                            @endif--}}
{{--                            <a class="propertyName"--}}
{{--                               href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $tenancy->property->id) }}">{{ $tenancy->property->name }}</a>--}}
{{--                            <div class="info">--}}
{{--                                <p>Address: {{ $tenancy->property->address }}</p>--}}
{{--                                <p>Description: {{ $tenancy->property->description }}</p>--}}
{{--                                <p>Price: ${{ $tenancy->property->price }}</p>--}}
{{--                            </div>--}}
{{--                            <div class="user mb-3">--}}
{{--                                <img--}}
{{--                                        src="{{ asset($tenancy->tenant->image_url) }}"--}}
{{--                                        alt="user"/>--}}
{{--                                <div class="user-info mt-2">--}}
{{--                                    <p>Tenant: {{ $tenancy->tenant->name }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="buttons">--}}
{{--                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $tenancy->property->id) }}"--}}
{{--                                   class="tag make tag-teal mb-2">Make tenancy</a>--}}
{{--                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'edit'], $tenancy->id) }}"--}}
{{--                                   class="tag edit tag-teal mb-2">Edit</a>--}}
{{--                                <form action="{{ action([\App\Http\Controllers\TenanciesController::class, 'destroy'], $tenancy->id) }}"--}}
{{--                                      method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="tag delete tag-teal mb-2">Delete</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}



            {{ $tenancies->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
