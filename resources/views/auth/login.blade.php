<x-layout>
    <x-guest>
        <form action="{{ route('login') }}" method="POST">
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
            <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Sign in</button>
            </div>
        </form>
    </x-guest>
</x-layout>
