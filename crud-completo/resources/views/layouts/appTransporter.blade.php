<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @vite(['resources/css/appTransporter.css', 'resources/js/app.js'])
</head>

<body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-sm navbar-light bg-dark px-3 ">
            <a class="navbar-brand" href="">
                <img class="nav-logo" src="{{ asset('/assets/img/logo.png') }}" alt="A">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between nav-links" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-flex d-flex justify-content-center  w-75">
                    <li class="nav-item active">
                        <a class="nav-link " href="{{ route('transportadors.index')}}">Index</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transportadors.create')}}">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transportadors.index')}}">Listar</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 d-flex ">
                    <input class="form-control mr-sm-2 mx-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="container-fluid px-3">
        @yield('content')
    </main>

    <footer class="footer fixed-bottom">
        <p style="margin-bottom: 0px;">Dreams.co © 2024</p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </footer>
</body>

</html>
