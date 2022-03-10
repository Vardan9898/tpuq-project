<x-layout>
    <section>
        <div class="col-6 mt-5 m-auto d-flex justify-content-center">
            <h2>Forgot your password?</h2>
        </div>
        <form action="{{ action([\App\Http\Controllers\ForgotPasswordController::class, 'store']) }}" method="POST" class="col-4 m-auto mt-5">
            @csrf
            <div class="mb-3">
                <label class="form-label">Fill in your email address to send you password reset link.</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            @include('error')
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Send</button>
                <a class="btn btn-primary" href="{{ action([\App\Http\Controllers\SessionsController::class, 'create']) }}">Go to login page</a>
            </div>
        </form>
    </section>
</x-layout>