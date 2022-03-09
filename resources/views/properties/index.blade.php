<x-layout>
    <link rel="stylesheet" href="{{ asset('css/style-for-properties-index.css') }}">
    @guest()
        <div class="m-4">
            <a href="{{ action([\App\Http\Controllers\SessionsController::class, 'create']) }}" class="btn btn-primary">Log in</a> or <a href="{{ action([\App\Http\Controllers\RegisterController::class, 'create']) }}"
                                                                      class="btn btn-success">Register</a>
        </div>
    @endguest
    <main>
        @if($properties->count())
            <div class="row d-flex justify-content-center">
                @foreach($properties as $property)
                    <div class="col-md-3">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="{{ asset('storage/prop_img/' . $property->image) }}" alt="image"/>
                            </div>
                            @if($property->mortgage_status)
                                <p class="card-action"><i class="fa fa-heart">Mortgaged</i></p>
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
                            <div class="d-flex">
                                <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $property->id) }}" class="card-button"> See more</a>
                                <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}" class="card-button-edit">Edit or
                                    delete</a>
                            </div>
                            <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}" class="card-button-make mb-5">Make tenancy
                                for {{ $property->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
