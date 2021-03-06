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

<body class="@if(isset($_COOKIE['sidenav-state']) && $_COOKIE['sidenav-state'] == 'pinned') g-sidenav-show g-sidenav-pinned @else g-sidenav-hidden @endif">
@auth()
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand"
                   href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}">
                    <img src="{{ asset('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler @if(isset($_COOKIE['sidenav-state']) && $_COOKIE['sidenav-state'] == 'pinned') active @endif d-none d-xl-block"
                         data-action="sidenav-unpin"
                         data-target="#sidenav-main">
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
                            <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button"
                               aria-expanded="{{ active_route('properties', 'true') }}"
                               aria-controls="navbar-dashboards">
                                <i class="ni ni-building text-primary"></i>
                                <span class="nav-link-text">Properties</span>
                            </a>
                            <div class="collapse {{ active_route('properties', 'show') }}" id="navbar-dashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ active_route('properties.index') }}">
                                        <a href="{{ route('properties.index') }}"
                                           class="nav-link">View all</a>
                                    </li>
                                    <li class="nav-item {{ active_route('properties.create') }}">
                                        <a href="{{ route('properties.create') }}"
                                           class="nav-link">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button"
                               aria-expanded="{{ active_route('tenants', 'true') }}" aria-controls="navbar-examples">
                                <i class="ni ni-single-02 text-orange"></i>
                                <span class="nav-link-text">Tenants</span>
                            </a>
                            <div class="collapse {{ active_route('tenants', 'show') }}" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ active_route('tenants.index') }}">
                                        <a href="{{ route('tenants.index') }}"
                                           class="nav-link">View all</a>
                                    </li>
                                    <li class="nav-item {{ active_route('tenants.create') }}">
                                        <a href="{{ route('tenants.create') }}"
                                           class="nav-link">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item {{ active_route('tenancies') }}">
                            <a class="nav-link"
                               href="{{ action([\App\Http\Controllers\TenanciesController::class, 'index']) }}">
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
    {{--    top nav--}}
    <div class="main @if(isset($_COOKIE['sidenav-state']) && $_COOKIE['sidenav-state'] == 'pinned') margin-main @endif">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                @if(active_route('properties.index'))
                    <form class="navbar-search navbar-search-light form-inline ml-5"
                          id="navbar-search-main"
                          method="GET"
                          action="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text" name="search">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                                aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </form>
                @endif
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="..."
                                             src="{{ auth()->user()->image ? asset(auth()->user()->image_url) : asset('/storage/default_images/profile-image.jpg') }}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ action([\App\Http\Controllers\ProfilesController::class, 'show'], auth()->user()) }}"
                                   class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}"
                                      method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <x-header/>

        <div class="container position-absolute top-attribute @if(isset($_COOKIE['sidenav-state']) && $_COOKIE['sidenav-state'] == 'pinned') margin-for-content @endif">
            @endauth

            {{ $slot }}

            @auth()
        </div>
        @endauth
    </div>

    <x-flash/>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/argon.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
