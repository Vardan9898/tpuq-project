<x-layout>
    <link rel="stylesheet" href="{{ asset('css/style-for-properties-index.css') }}">
    <main>
        @if($tenancies->count())
            <div class="cards d-flex justify-content-center row">
                @foreach($tenancies as $tenancy)
                    <div class="card col-3">
                        <div class="card-header">
                            <img src="{{ asset($tenancy->property->image_url) }}"
                                 alt="..."/>
                        </div>
                        <div class="card-body">
                            @if($tenancy->property->mortgage_status)
                                <span class="tag tag-teal mb-2">Mortgaged</span>
                            @endif
                            <a class="propertyName"
                               href="{{ action([\App\Http\Controllers\PropertiesController::class, 'show'], $tenancy->property->id) }}">{{ $tenancy->property->name }}</a>
                            <div class="info">
                                <p>Address: {{ $tenancy->property->address }}</p>
                                <p>Description: {{ $tenancy->property->description }}</p>
                                <p>Price: ${{ $tenancy->property->price }}</p>
                            </div>
                            <div class="user mb-3">
                                <img
                                        src="{{ asset($tenancy->tenant->image_url) }}"
                                        alt="user"/>
                                <div class="user-info mt-2">
                                    <p>{{ $tenancy->tenant->name }}</p>
                                </div>
                            </div>
                            <div class="buttons">
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $tenancy->property->id) }}"
                                   class="tag make tag-teal mb-2">Make tenancy</a>
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'edit'], $tenancy->id) }}"
                                   class="tag edit tag-teal mb-2">Edit</a>
                                <form action="{{ action([\App\Http\Controllers\TenanciesController::class, 'destroy'], $tenancy->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tag delete tag-teal mb-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $tenancies->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>
