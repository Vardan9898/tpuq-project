<x-layout>
    <section>
        <div class="col-6 mt-5 m-auto d-flex justify-content-center">
            <h3>Reset Password</h3>
        </div>
        <form action="{{ action([\App\Http\Controllers\ForgotPasswordController::class, 'update']) }}" method="POST"
              class="col-4 m-auto mt-5">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">New password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div>
                <label class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            </div>
            @include('error')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </section>
</x-layout>
