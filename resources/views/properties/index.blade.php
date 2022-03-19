<x-layout>
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
        @if($properties->count())
            <div class="cards d-flex justify-content-center row pt-4 mt-5">
                @foreach($properties as $property)
                    <div class="col-4 p-2">
                        <div class="card">
                            <div class="propertyImage">
                                <img class="card-img-top" src="{{ asset($property->image_url) }}"
                                     alt="Image placeholder">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><h3 class="m-0"><a
                                            href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $property->id) }}">{{ $property->name }}</a>
                                    </h3></li>
                                <li class="list-group-item address"><p class="m-0">{{ $property->address }}</p></li>
                                <li class="list-group-item position-relative"><p class="m-0">${{ $property->price }}</p>
                                    @if($property->mortgage_status)
                                        <div class="col-auto position-absolute right-0">
                                            <span class="badge badge-lg badge-danger">Mortgaged</span>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                                       class="btn btn-success">Make tenancy</a>
                                    <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                                       class="btn btn-outline-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
