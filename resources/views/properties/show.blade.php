<x-layout>
    <div class="cards d-flex justify-content-center row mt-5">
        <div class="card mt-5">
            <img class="card-img-top" src="{{ asset($property->image_url) }}" alt="...">
            <div class="card-body">
{{--                @if($property->mortgage_status)--}}
{{--                    <small class="text-danger">Mortgaged</small>--}}
{{--                @endif--}}
                    @if($property->mortgage_status)
                        <div>
                            <span class="badge badge-lg badge-danger">Mortgaged</span>
                        </div>
                    @endif
                <h5 class="h2 card-title mb-0 mt-3">{{ $property->name }}</h5>
                <small class="text-muted">{{ $property->address }}</small>
                <p class="card-text mt-4">{{ $property->description }}</p>
                <p class="btn btn-link px-0">${{ $property->price }}</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                       class="btn btn-success">Make tenancy</a>
                    <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}"
                       class="btn btn-secondary bg-gradient-gray border-0 text-white mr-9">Back</a>
                    <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                       class="btn btn-outline-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
