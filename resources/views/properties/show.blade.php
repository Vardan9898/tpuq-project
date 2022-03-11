<x-layout>
    <link rel="stylesheet" href="{{ asset('css/style-for-properties-index.css') }}">
    <div class="cards d-flex justify-content-center row mt-5">
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
                <div class="buttons">
                    <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $property->id) }}"
                       class="tag make tag-teal mb-2">Make tenancy</a>
                    <a href="{{ action([\App\Http\Controllers\PropertiesController::class, 'edit'], $property->id) }}"
                       class="tag edit tag-teal mb-2">Edit or delete</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
