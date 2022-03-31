<x-layout>
    <section class="bg-default">
        <div class="main-content">
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                <h1 class="text-white">Welcome!</h1>
                                <p class="text text-white">Sign in or register to create tenancies</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                         xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-body px-lg-5 py-lg-5">

                                {{ $slot }}

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <a href="{{ route('password.request') }}" class="text-light"><small>Forgot
                                        password?</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-top-nav/>

        <footer class="py-5 mt-8" id="footer-main">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2022 <a href="#" class="font-weight-bold ml-1"
                                           target="_blank">{{ config('app.name') }}</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">{{ config('app.name') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</x-layout>
