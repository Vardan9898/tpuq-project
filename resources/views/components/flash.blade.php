@if(session()->has('success'))
    <div class="alert alert-success fixed-bottom col-1 justify-content-end" role="alert">
        <p class="d-flex justify-content-center">
            {{ session('success') }}
        </p>
    </div>
@endif