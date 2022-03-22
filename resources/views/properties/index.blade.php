<x-layout>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
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
            <main>
                @if($properties->count())
                    <div class="cards d-flex justify-content-center row pt-4 mt-5">
                        @foreach($properties as $property)
                            <div class="col-4 p-2">
                                <div class="card">
                                    <div class="propertyImage">
                                        <img class="card-img-top" src="{{ asset($property->image_url) }}"
                                             alt="Image placeholder">
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><h3 class="m-0"><a
                                                        href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $property->id) }}">{{ $property->name }}</a>
                                            </h3></li>
                                        <li class="list-group-item d-flex align-items-center justify-content-center address-li">
                                            <i class="ni ni-pin-3 mr-2"></i>
                                            <p class="m-0 address-p">{{ $property->address }}</p>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-around"><p class="m-0">
                                                ${{ $property->price }}</p>
                                            @if($property->mortgage_status)
                                                <div class="col-auto">
                                                    <span class="badge badge-lg badge-danger">Mortgaged</span>
                                                </div>
                                            @endif
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                                               class="btn btn-success">Make tenancy</a>
                                            <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                                               class="btn btn-outline-primary">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $properties->links('pagination::bootstrap-5') }}
                @endif
            </main>
            @guest()
        </div>
    @endguest
</x-layout>
