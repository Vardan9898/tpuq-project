<x-layout>
    <x-guest>
        <section>
            <form action="{{ action([\App\Http\Controllers\ForgotPasswordController::class, 'update']) }}"
                  method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
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
                               placeholder="New password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i
                                        class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                               placeholder="Confirm password">
                    </div>
                </div>
                @include('error')
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-3">Reset</button>
                </div>
            </form>
        </section>
    </x-guest>
</x-layout>
