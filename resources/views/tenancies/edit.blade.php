<x-layout>
    <div class="row text-center d-flex justify-content-center mt-5 mb-2">
        <div class="card card-profile tenants col-6 m-3 p-0">
            <img src="{{ asset($tenancy->property->image_url) }}" alt="Image placeholder"
                 class="card-img-top w-100 h-auto">
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
                    <a class="btn btn-sm bg-gray mr-4 d-flex align-items-center text-white"
                       href="{{ url()->previous() }}">Back</a>
                    <form
                            action="{{ action([\App\Http\Controllers\TenanciesController::class, 'destroy'], $tenancy->id) }}"
                            class="delete-button d-flex align-items-center" method="POST">
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
                    <li class="list-group-item address d-flex justify-content-center align-items-center address-li">
                        <i class="ni ni-pin-3 mr-2"></i>
                        <p class="m-0 address-p">{{ $tenancy->property->address }}</p>
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
                        <form action="{{ action([\App\Http\Controllers\TenanciesController::class, 'update'], $tenancy->id) }}"
                              class="d-flex justify-content-around w-75" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-control mr-3" name="tenant">
                                @foreach($tenants as $tenant)
                                    <option
                                            @if(old('tenant') == $tenant->id)
                                            selected
                                            @elseif($selectedTenant == $tenant)
                                            selected
                                            @endif
                                            value="{{ $tenant->id }}">{{ $tenant->name }}
                                    </option>
                                @endforeach
                            </select>
                            @include('error')
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layout>
