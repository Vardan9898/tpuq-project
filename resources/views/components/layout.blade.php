<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <title>Tenancy project</title>
</head>
<body>
@auth()
    <section>
        <nav class="navbar navbar-expand-lg navbar-scroll border-bottom border-dark" style="background-color: #FFC017">
            <div class="container">
                <h4>Hi {{ auth()->user()->name }}</h4>
                <a class="navbar-brand" href="#!"><i class="fab fa-mdb fa-4x"></i></a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/properties">View all properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tenants">View all tenants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tenancies">View all tenancies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/properties/create">Create Property</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tenants/create">Create tenant</a>
                        </li>

                        <li class="nav-item">
                            <form action="/logout" method="POST" class="d-flex justify-content-end w-75">
                                @csrf
                                <div class="col-1">
                                    <button class="btn btn-danger">Logout</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
@endauth

<div class="container">
    {{ $slot }}
</div>

<x-flash/>


</body>
</html>