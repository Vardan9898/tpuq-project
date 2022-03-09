<x-layout>
    <div class="d-flex justify-content-center mt-4">
        <h3>Here you can edit or delete tenancy</h3>
    </div>
    <div class="mt-5 d-flex flex-column align-items-center">
        <div class="row d-flex justify-content-center w-25 mb-3">
            <img src="{{ asset('storage/') . '/' . $tenancy->property->image}}" alt="">
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <h3>Property name: {{ $tenancy->property->name }}</h3>
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <h3>Property address: {{ $tenancy->property->address }}</h3>
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <h3>Property price: ${{ $tenancy->property->price }}</h3>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled"
                   disabled {{ $tenancy->property->mortgage_status == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="flexRadioDisabled">
                Mortgaged status
            </label>
        </div>
        <form action="{{ action([\App\Http\Controllers\TenanciesController::class, 'update'], $tenancy->id) }}" class="mt-3 w-25" method="POST">
            @csrf
            @method('PATCH')
            <select class="form-select" aria-label="Default select example" name="tenant">
                @foreach($tenants as $tenant)
                    <option {{ $selectedTenant == $tenant ? 'selected' : '' }} value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-center">
                <button class="btn btn-warning mt-4">Update tenancy</button>
            </div>
        </form>
    </div>
</x-layout>