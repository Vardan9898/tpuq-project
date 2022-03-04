<x-layout>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-3">
            <div class="card-sl">
                <div class="card-image">
                    <img src="{{ asset('storage/' . $property->image) }}" alt="image"/>
                </div>

                @if($property->mortgage_status == true)
                    <a class="card-action" href="#"><i class="fa fa-heart">Mortgaged</i></a>
                @endif
                <div class="card-heading">
                    <h3>
                        {{ $property->name }}
                    </h3>
                </div>
                <div class="card-heading">
                    <h5>
                        {{ $property->address }}
                    </h5>
                </div>
                <div class="card-text">
                    <p class="card-title">{{ $property->description }}</p>
                </div>
                <div class="card-text">
                    <p>${{ $property->price }}</p>
                </div>
                <a href="/properties/{{ $property->id }}/edit" class="card-button-edit">Edit or delete</a>
            </div>
            <a href="" class="card-button-make mb-5">Make tenancy for {{ $property->name }}</a>
        </div>
    </div>
</x-layout>

@include('style.css3')