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
        @if($properties->count())
            <div class="cards d-flex justify-content-center row">
                @foreach($properties as $property)
                    <div class="card col-3">
                        <div class="card-header">
                            <img src="{{ asset($property->image_url) }}"
                                 alt="..."/>
                        </div>
                        <div class="card-body">
                            @if($property->mortgage_status)
                                <span class="tag tag-teal mb-2">Mortgaged</span>
                            @endif
                            <a class="propertyName"
                               href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $property->id) }}">{{ $property->name }}</a>
                            <div class="info">
                                <p>Address: {{ $property->address }}</p>
                                <p>Description: {{ $property->description }}</p>
                                <p>Price: ${{ $property->price }}</p>
                            </div>
                            {{--                        <div class="user">--}}
                            {{--                            <img--}}
                            {{--                                src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo"--}}
                            {{--                                alt="user"/>--}}
                            {{--                            <div class="user-info">--}}
                            {{--                                <h5>July Dec</h5>--}}
                            {{--                                <small>2h ago</small>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            <div class="buttons">
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                                   class="tag make tag-teal mb-2">Make tenancy</a>
                                <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                                   class="tag edit tag-teal mb-2">Edit or delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $properties->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
