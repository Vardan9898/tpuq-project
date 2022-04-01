<x-layout>
    <div class="row text-center d-flex justify-content-center mt-5 mb-2">
        <div class="card card-profile tenants col-6 m-3 p-0">
            <img src="{{ $property->image ? asset($property->image_url) : asset('/storage/default_images/property-image.jpg') }}"
                 alt="Image placeholder"
                 class="card-img-top w-100 h-auto">
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex">
                        <a class="btn btn-sm bg-gray mr-4 d-flex align-items-center text-white"
                           href="{{ url()->previous() }}">Back</a>
                        <h3 class="m-0 w-75">
                            <a
                                    href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $property->id) }}">
                                {{ $property->name }}
                            </a>
                        </h3>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-center">
                        <i class="ni ni-pin-3 mr-3"></i>
                        <p class="m-0 text-sm-left">{{ $property->address }}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-center"><p class="m-0">
                            ${{ $property->price }}</p>
                        @if($property->mortgage_status)
                            <div class="col-auto">
                                <span class="badge badge-lg badge-danger">Mortgaged</span>
                            </div>
                        @endif
                    </li>
                    <li class="list-group-item address d-flex justify-content-center align-items-center">
                        <form action="{{ action([\App\Http\Controllers\TenanciesController::class, 'store'], $property->id) }}"
                              class="d-flex justify-content-around w-75" method="POST">
                            @csrf
                            <select class="form-control mr-3" name="tenant_id">
                                <option>@if($tenants->count()) Select the tenant @else Create tenant for making
                                    tenancies @endif</option>
                                @foreach($tenants as $tenant)
                                    <option {{ old('tenant_id') == $tenant->id ? "selected" : "" }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                @endforeach
                            </select>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success" @if(!$tenants->count()) disabled @endif>Create</button>
                            </div>
                        </form>
                    </li>
                    @if($errors->any())
                        <li class="list-group-item d-flex justify-content-center p-0 mb-2">
                            @include('error')
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-layout>
