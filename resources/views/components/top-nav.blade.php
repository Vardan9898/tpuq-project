<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
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
    </div>
</nav>
