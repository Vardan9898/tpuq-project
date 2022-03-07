<x-layout>
    <link rel="stylesheet" href="{{ asset('storage/css/style-for-properties-show.css') }}">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-3">
            <div class="card-sl">
                <div class="card-image">
                    <img src="{{ asset('storage/' . $property->image) }}" alt="image"/>
                </div>

                @if(!$property->mortgage_status == null)
                    <a class="card-action" href="#"><i class="fa fa-heart">Mortgaged</i></a>
                @endif
                <div class="card-heading">
                    <h3>
                        {{ $property->name }}
                    </h3>
                </div>
                <div class="card-heading">
                    <h3>
                        {{ $property->address }}
                    </h3>
                </div>
                <div class="card-text">
                    <h3 class="card-title">{{ $property->description }}</h3>
                </div>
                <div class="card-text">
                    <h3>${{ $property->price }}</h3>
                </div>
                <a href="{{ route('properties.edit', $property->id) }}" class="card-button-edit">Edit or delete</a>
            </div>
            <a href="{{ route('tenancies.create', $property->id) }}" class="card-button-make mb-5">Make tenancy for {{ $property->name }}</a>
        </div>
    </div>
</x-layout>