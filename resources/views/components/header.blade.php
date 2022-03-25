<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    @if(active_route('properties'))
                        <h6 class="h2 text-white d-inline-block mb-0 ml-6">Properties</h6>
                    @elseif(active_route('tenants'))
                        <h6 class="h2 text-white d-inline-block mb-0 ml-6">Tenants</h6>
                    @elseif(active_route('tenancies'))
                        <h6 class="h2 text-white d-inline-block mb-0 ml-6">Tenancies</h6>
                    @endif
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a
                                        href="{{ action([\App\Http\Controllers\PropertiesController::class, 'index']) }}"><i
                                            class="fas fa-home"></i></a></li>
                            @if(str_contains(\Illuminate\Support\Facades\Route::currentRouteName(), 'index'))
                                <li class="breadcrumb-item"><a>View all</a></li>
                            @elseif(str_contains(\Illuminate\Support\Facades\Route::currentRouteName(), 'create'))
                                <li class="breadcrumb-item"><a>Create</a></li>
                            @elseif(str_contains(\Illuminate\Support\Facades\Route::currentRouteName(), 'edit'))
                                <li class="breadcrumb-item"><a>Edit</a></li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
