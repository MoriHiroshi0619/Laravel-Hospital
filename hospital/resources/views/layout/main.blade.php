<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
        {{-- google font --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        {{-- font-family: 'Roboto', sans-serif; --}}

        {{-- Css do Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        {{-- Js do Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

        {{-- Ion Icons --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>

        {{-- Bootstrap Icon--}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body>
        <header class="sticky-top">
            <nav class="navbar bg-light navbar-expand-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <img src="/img/logo.png" id="logo">
                        Sistema Hospitalar 
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavBar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menuNavBar">
                        <div class="navbar-nav ms-auto d-flex align-items-center">
                            <span class="fs-5 text-decoration-underline me-3">@yield('usuario')</span>
                            <form action="/logout" method="POST" class="me-2">
                                @csrf
                                <input type="submit" class="btn btn-outline-danger" value="Sair">
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="conainer">
            @if(session('msg'))
                <p class="msg">{{session('msg')}}</p>
            @endif
            @if(session('error'))
                <p class="error">{{session('error')}}</p>
            @endif
            @yield('content')
        </main>
        <div class="p-4 invisible"></div>
        <footer class="p-2 bg-light text-center fixed-bottom">
            <p>Sistema Hospitalar &copy; 2023</p>
        </footer>
    </body>
</html>
