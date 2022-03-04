<x-layout>
    @guest()
        <div class="m-4">
            <a href="/login" class="btn btn-primary">Log in</a> or <a href="/register"
                                                                      class="btn btn-success">Register</a>
        </div>
    @endguest
    <main style="margin-top:50px; margin-left: 75px; margin-right: 75px">
        @if($properties->count())
            <div class="row d-flex justify-content-center">
                @foreach($properties as $property)
                    <div class="col-md-3">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $property->image) }}" alt="image"/>
                            </div>

                            @if($property->mortgage_status == true)
                                <p class="card-action"><i class="fa fa-heart">Mortgaged</i></p>
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
                            <div class="d-flex">
                                <a href="/properties/{{ $property->id }}" class="card-button"> See more</a>
                                <a href="/properties/{{ $property->id }}/edit" class="card-button-edit">Edit or
                                    delete</a>
                            </div>
                            <a href="/tenancies/{{ $property->id }}/create" class="card-button-make mb-5">Make tenancy
                                for {{ $property->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links('pagination::bootstrap-5') }}
        @endif

    </main>
</x-layout>

@include('style.css1')
