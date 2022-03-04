<x-layout>
    <div class="d-flex justify-content-center mt-4">
        <h3>Here you can create tenancy</h3>
    </div>
    <div class="mt-5 d-flex flex-column align-items-center">
        <div class="row d-flex justify-content-center w-25 mb-3">
            <img src="{{ asset('storage/') . '/' . $property->image}}" alt="">
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <h3>Property name: {{ $property->name }}</h3>
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <h3>Property address: {{ $property->address }}</h3>
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <h3>Property price: ${{ $property->price }}</h3>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"
                   disabled {{ $property->mortgage_status == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDisabled">
                Mortgaged status
            </label>
        </div>
        <form action="/tenancies/{{ $property->id }}/create" class="mt-3 w-25" method="POST">
            @csrf
            <select class="form-select" aria-label="Default select example" name="tenant">
                <option selected>Select the tenant</option>
                @foreach($tenants as $tenant)
                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success mt-4">Create tenancy</button>
            </div>
        </form>
    </div>
</x-layout>