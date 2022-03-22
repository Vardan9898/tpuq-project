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
