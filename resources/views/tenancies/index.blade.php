<x-layout>
    <link rel="stylesheet" href="{{ asset('css/style-for-tenancies-index.css') }}">
    <main>
        @if($tenancies->count())
            <div class="row d-flex justify-content-center">
                @foreach($tenancies as $tenancy)
                    <div class="col-md-3">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="{{ asset($tenancy->property->image_url) }}" alt="image"/>
                            </div>
                            @if(!$tenancy->property->mortgage_status == null)
                                <p class="card-action"><i class="fa fa-heart">Mortgaged</i></p>
                            @endif
                            <div class="card-heading">
                                <h3>{{ $tenancy->property->name }}</h3>
                            </div>
                            <div class="card-text">
                                <p>Address: {{ $tenancy->property->address }}</p>
                            </div>
                            <div class="card-text">
                                <p class="card-title">Description: {{ $tenancy->property->description }}</p>
                            </div>
                            <div class="card-text">
                                <p>Price: ${{ $tenancy->property->price }}</p>
                            </div>
                            <div class="card-text">
                                <p>Tenant: {{ $tenancy->tenant->name }}</p>
                            </div>
                            <div class="d-flex">
                                <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'edit'], $tenancy->id) }}" class="card-button-edit">Edit</a>
                                <form action="{{ action([\App\Http\Controllers\TenanciesController::class, 'destroy'], $tenancy->id) }}" class="col-6" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="card-button-delete">Delete</button>
                                </form>
                            </div>
                            <a href="{{ action([\App\Http\Controllers\TenanciesController::class, 'create'], $tenancy->property->id) }}" class="card-button-make mb-5">Make
                                new tenancy for {{ $tenancy->property->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $tenancies->links('pagination::bootstrap-5') }}
        @endif
    </main>
</x-layout>