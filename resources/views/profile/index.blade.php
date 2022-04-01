<x-layout>
    <div class="main-content mt-9" id="panel">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <img src="{{ asset('img/default_images/img-1-1000X600.jpg') }}" alt="Image placeholder"
                             class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a>
                                        <img src="{{ $user->image ? asset($user->image_url) : asset('/storage/default_images/profile-image.jpg') }}"
                                             class="rounded-circle img-for-profile"
                                             alt="...">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col mt-5">
                                    <div class="card-profile-stats d-flex justify-content-center">
                                        <div>
                                            <span class="heading">{{ $user->tenants()->count() }}</span>
                                            <span class="description">Tenants</span>
                                        </div>
                                        <div>
                                            <span class="heading">{{ $user->properties()->count() }}</span>
                                            <span class="description">Properties</span>
                                        </div>
                                        <div>
                                            <span class="heading">{{ $user->tenancies()->count() }}</span>
                                            <span class="description">Tenancies</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h5 class="h3">
                                    {{ $user->name }}
                                </h5>
                                <div class="h5 font-weight-300 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-email-83 mr-2"></i>{{ $user->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card bg-gradient-info border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">
                                                Properties</h5>
                                            <span class="h2 font-weight-bold mb-0 text-white">{{ $user->properties()->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                                <i class="ni ni-building"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-white mr-2"><i
                                                    class="fa fa-arrow-up"></i> {{ $percentOfProperties }}%</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card bg-gradient-danger border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">
                                                Tenancies</h5>
                                            <span class="h2 font-weight-bold mb-0 text-white">{{ $user->tenancies()->count() }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                                <i class="ni ni-badge"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-white mr-2"><i
                                                    class="fa fa-arrow-up"></i> {{ $percentOfTenancies }}%</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Edit profile </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ action([\App\Http\Controllers\ProfilesController::class, 'update'], $user) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Email address</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                       value="{{ old('email', $user->email) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="name">Name</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                       value="{{ old('name', $user->name) }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input class="form-control" placeholder="Image" type="file" id="image"
                                                   name="image">
                                        </div>
                                    </div>
                                    @include('error')
                                    <div class="row mt-2">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
