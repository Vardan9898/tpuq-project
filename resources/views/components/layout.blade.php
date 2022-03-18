<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('icons/nucleo.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/argon.css') }}" rel="stylesheet">
    <title>Tenancy project</title>
</head>

<body class="g-sidenav-hidden">
@auth()
{{--        <nav class="navbar navbar-expand-lg navbar-scroll border-bottom border-dark">--}}
{{--            <div class="container">--}}
{{--                <button class="btn btn-danger">egrg</button>--}}
{{--                <h4>Hi {{ auth()->user()->name }}</h4>--}}
{{--                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"--}}
{{--                        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
{{--                        aria-expanded="false"--}}
{{--                        aria-label="Toggle navigation">--}}
{{--                    <i class="fas fa-bars"></i>--}}
{{--                </button>--}}
{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link"--}}
{{--                               href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}">View--}}
{{--                                all properties</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link"--}}
{{--                               href="{{ action([\App\Http\Controllers\TenantsController::class, 'index']) }}">View all--}}
{{--                                tenants</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link"--}}
{{--                               href="{{ action([\App\Http\Controllers\TenanciesController::class, 'index']) }}">View all--}}
{{--                                tenancies</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link"--}}
{{--                               href="{{ action([\App\Http\Controllers\PropertiesController::class, 'create']) }}">Create--}}
{{--                                property</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link"--}}
{{--                               href="{{ action([\App\Http\Controllers\TenantsController::class, 'create']) }}">Create--}}
{{--                                tenant</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <form action="{{ action([\App\Http\Controllers\SessionsController::class, 'destroy']) }}"--}}
{{--                                  method="POST" class="d-flex justify-content-end w-75">--}}
{{--                                @csrf--}}
{{--                                <div class="col-1">--}}
{{--                                    <button class="btn btn-danger">Logout</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header d-flex align-items-center">
                    <a class="navbar-brand" href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}">
                        <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
                    </a>
                    <div class="ml-auto">
                        <!-- Sidenav toggler -->
                        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-inner">
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                        <!-- Nav items -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-dashboards">
                                    <i class="ni ni-building text-primary"></i>
                                    <span class="nav-link-text">Properties</span>
                                </a>
                                <div class="collapse show" id="navbar-dashboards">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}" class="nav-link">View all properties</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'create']) }}" class="nav-link">Create property</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                    <i class="ni ni-single-02 text-orange"></i>
                                    <span class="nav-link-text">Tenants</span>
                                </a>
                                <div class="collapse show" id="navbar-examples">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ action([\App\Http\Controllers\TenantsController::class, 'index']) }}" class="nav-link">View all tenants</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ action([\App\Http\Controllers\TenantsController::class, 'create']) }}" class="nav-link">Create tenant</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action([\App\Http\Controllers\TenanciesController::class, 'index']) }}">
                                    <i class="ni ni-badge text-green"></i>
                                    <span class="nav-link-text">Tenancies</span>
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                    </div>
                </div>
            </div>
        </nav>
@endauth

<div class="container">
    {{ $slot }}
</div>

<x-flash/>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{ asset('js/argon.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
