@if(session()->has('success'))
    <div class="alert alert-success fixed-bottom col-1 justify-content-end" role="alert">
        <p class="d-flex justify-content-center">
            {{ session('success') }}
        </p>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger fixed-bottom col-1 justify-content-end" role="alert">
        <p class="d-flex justify-content-center">
            {{ session('error') }}
        </p>
    </div>
@endif
