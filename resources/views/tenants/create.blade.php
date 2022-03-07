<x-layout>
    <div class="mt-5 col-6 m-auto d-flex justify-content-center">
        <h1>Here you can create tenant</h1>
    </div>
    <form action="/tenants/store" method="POST" class="col-4 m-auto mt-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tenant name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tenant address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        </div>
        <div class="input mb-4">
            <label for="image" class="form-label mb-3">Tenant image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        @include('error')
        <button type="submit" class="btn btn-success">Create tenant</button>
    </form>
</x-layout>