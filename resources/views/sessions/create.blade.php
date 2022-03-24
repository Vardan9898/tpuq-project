<x-layout>
    <x-guest>
        <form action="{{ action([\App\Http\Controllers\SessionsController::class, 'store']) }}"
              method="POST">
            @csrf
            <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input placeholder="Email" type="email" class="form-control" id="email"
                           name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i
                                    class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Password">
                </div>
            </div>
            @include('error')
<<<<<<< HEAD
            <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Sign in</button>
=======
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ action([\App\Http\Controllers\ForgotPasswordController::class, 'index']) }}"
                   class="btn btn-secondary">Forgot password?</a>
>>>>>>> 8578e84b2e3ff371b442c6fe422bb51137a86a67
            </div>
        </form>
    </x-guest>
</x-layout>
