<x-layout>
    <section>
        <div class="col-6 mt-5 m-auto d-flex justify-content-center">
            <h2>Log In! or <a class="btn btn-success" href="{{ action([\App\Http\Controllers\RegisterController::class, 'create']) }}">Register</a></h2>
        </div>
        <form action="{{ action([\App\Http\Controllers\SessionsController::class, 'store']) }}" method="POST" class="col-4 m-auto mt-5">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div>
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @include('error')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="btn btn-secondary" href="{{ action([\App\Http\Controllers\ForgotPasswordController::class, 'index']) }}">Forgot your password?</a>
            </div>
        </form>
    </section>
</x-layout>