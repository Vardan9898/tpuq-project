<x-layout>
    <link rel="stylesheet" href="{{ asset('css/style-for-properties-index.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    @guest()
        <div class="m-4">
            <a href="{{ action([\App\Http\Controllers\SessionsController::class, 'create']) }}" class="btn btn-primary">Log
                in</a> or <a href="{{ action([\App\Http\Controllers\RegisterController::class, 'create']) }}"
                             class="btn btn-success">Register</a>
        </div>
    @endguest
    <main>
        <div class="col-12 d-flex justify-content-end mb-5">
            <form class="search-container d-flex justify-content-end" method="GET"
                  action="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}">
                <input type="text" name="search" placeholder="Search..." class="search-input">
                <a href="#" class="search-btn">
                    <i class="fas fa-search"></i>
                </a>
            </form>
        </div>
        @if($properties->count())
            <div class="row d-flex justify-content-center">
                @foreach($properties as $property)
                    <div class="col-md-3">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="{{ asset($property->image_url) }}" alt="image"/>
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
                                <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $property->id) }}"
                                   class="card-button"> See more</a>
                                <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                                   class="card-button-edit">Edit or
                                    delete</a>
                            </div>
                            <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                               class="card-button-make mb-5">Make tenancy
                                for {{ $property->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
