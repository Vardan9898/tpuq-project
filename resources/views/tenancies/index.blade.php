<x-layout>
    <main style="margin-top:50px; margin-left: 75px; margin-right: 75px">
        @if($tenancies->count())
            <div class="row d-flex justify-content-center">
                @foreach($tenancies as $tenancy)
                    <div class="col-md-3">
                        <div class="card-sl">
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $tenancy->property->image) }}" alt="image"/>
                            </div>

                            @if($tenancy->property->mortgage_status == true)
                                <p class="card-action"><i class="fa fa-heart">Mortgaged</i></p>
                            @endif
                            <div class="card-heading">
                                <h3>
                                    {{ $tenancy->property->name }}
                                </h3>
                            </div>
                            <div class="card-heading">
                                <h5>
                                    {{ $tenancy->property->address }}
                                </h5>
                            </div>
                            <div class="card-text">
                                <p class="card-title">{{ $tenancy->property->description }}</p>
                            </div>
                            <div class="card-text">
                                <p>${{ $tenancy->property->price }}</p>
                            </div>
                            <div class="card-text">
                                <p>Tenant: {{ $tenancy->tenant->name }}</p>
                            </div>
                            <div class="d-flex">
                                <a href="/tenancies/{{ $tenancy->id }}/edit" class="card-button-edit">Edit or delete</a>
                                <form action="/tenancies/{{ $tenancy->id }}" class="col-6" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="card-button-delete">Delete</button>
                                </form>
                            </div>
                            <a href="/tenancies/{{ $tenancy->property->id }}/create" class="card-button-make mb-5">Make
                                new tenancy for {{ $tenancy->property->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $tenancies->links('pagination::bootstrap-5') }}
        @endif

    </main>
</x-layout>


@include('style.css')