@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show fixed-bottom d-flex" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text"><strong>{{ session('success') }}</strong></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger fixed-bottom col-1 justify-content-end" role="alert">
        <p class="d-flex justify-content-center">
            {{ session('error') }}
        </p>
    </div>
@endif
