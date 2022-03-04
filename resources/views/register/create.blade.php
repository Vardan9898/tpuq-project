<x-layout>
    <div class="mt-5 col-6 m-auto d-flex justify-content-center">
        <h1>Here you can register in our web site or <a class="btn btn-primary" href="/login">Login</a></h1>
    </div>
    <form action="/register" method="POST" class="col-4 m-auto mt-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="input mb-4">
            <label for="image" class="form-label mb-3">Choose your profile image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        @include('error')
        <div>
            <button type="submit" class="btn btn-success">Register</button>
        </div>
    </form>
</x-layout>
