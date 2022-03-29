<x-layout>
    <x-guest>
        <form method="POST" action="{{ route('register') }}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input placeholder="Your name" type="text" class="form-control" id="name"
                           name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i
                                    class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                           placeholder="Confirm password">
                </div>
            </div>
            @include('error')
            <div class="text-center">
                <button type="submit" class="btn btn-success my-4">Register</button>
            </div>
        </form>
    </x-guest>
</x-layout>
