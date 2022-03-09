<x-layout>
    <link rel="stylesheet" href="{{ asset('css/style-for-properties-show.css') }}">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-3">
            <div class="card-sl">
                <div class="card-image">
                    <img src="{{ asset('storage/prop_img/' . $property->image) }}" alt="image"/>
                </div>

                @if($property->mortgage_status)
                    <a class="card-action" href="#"><i class="fa fa-heart">Mortgaged</i></a>
                @endif
                <div class="card-heading">
                    <h3>{{ $property->name }}</h3>
                </div>
                <div class="card-text">
                    <p>Address: {{ $property->address }}</p>
                </div>
                <div class="card-text">
                    <p class="card-title">Description: {{ $property->description }}</p>
                </div>
                <div class="card-text">
                    <p>Price: ${{ $property->price }}</p>
                </div>
                <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}" class="card-button-edit">Edit or delete</a>
            </div>
            <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}" class="card-button-make mb-5">Make tenancy for {{ $property->name }}</a>
        </div>
    </div>
</x-layout>