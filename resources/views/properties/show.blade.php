<x-layout>
    @guest()
        <nav class="navbar navbar-horizontal bg-primary navbar-main navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/brand/white.png') }}" alt="...">
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}"
                           class="nav-link">
                            <span class="nav-link-inner--text">Properties</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ action([\App\Http\Controllers\SessionsController::class, 'create']) }}"
                           class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ action([\App\Http\Controllers\RegisterController::class, 'create']) }}"
                           class="nav-link">
                            <span class="nav-link-inner--text">Register</span>
                        </a>
                    </li>
                </ul>
                <hr class="d-lg-none"/>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip"
                           data-original-title="Like us on Facebook">
                            <i class="fab fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip"
                           data-original-title="Follow us on Instagram">
                            <i class="fab fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip"
                           data-original-title="Follow us on Twitter">
                            <i class="fab fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip"
                           data-original-title="Star us on Github">
                            <i class="fab fa-github"></i>
                            <span class="nav-link-inner--text d-lg-none">Github</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @endguest
            <div class="cards d-flex justify-content-center row mt-4 row">
                <div class="card mt-5 col-6 p-0">
                    <img class="card-img-top h-auto"
                         src="{{ $property->image ? asset($property->image_url) : asset('/storage/default_images/property-image.jpg') }}"
                         alt="...">
                    <div class="card-body">
                        @if($property->mortgage_status)
                            <div>
                                <span class="badge badge-lg badge-danger">Mortgaged</span>
                            </div>
                        @endif
                        <h5 class="h2 card-title mb-0 mt-3">{{ $property->name }}</h5>
                        <small class="text-muted">{{ $property->address }}</small>
                        <p class="card-text mt-4">{{ $property->description }}</p>
                        <p class="btn btn-link px-0">${{ $property->price }}</p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                                   class="btn btn-success">Make tenancy</a>
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-secondary bg-gradient-gray border-0 text-white mr-9">Back</a>
                            </div>
                            <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                               class="btn btn-outline-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            @guest()
        </div>
    @endguest
</x-layout>
