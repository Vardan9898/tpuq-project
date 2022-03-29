<x-layout>
    <x-guest>
        <section>
            <form action="{{ route('password.email') }}" method="POST"
                  class="mt-2 mb-3">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Fill in your email address to send you password reset link.</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                @include('error')
                <div class="mt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Send</button>
                </div>
            </form>
        </section>
    </x-guest>
</x-layout>
