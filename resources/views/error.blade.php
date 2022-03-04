@if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul class="m-auto">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif