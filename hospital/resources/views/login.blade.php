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

</head>
<body>
    <section class="container-fluid d-flex justify-content-center align-items-center">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <span>Faça login por favor</span>
                            @if(session('error'))
                                <p class="error">{{session('error')}}</p>
                            @endif
                            @error('error')
                                <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="card-body">
                            <form action="/login" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="cpf" class="col-sm-3 col-form-label text-decoration-underline">CPF:</label>
                                    <div class="col-sm-9">
                                        <input type="text" maxlength="11" minlength="11" id="cpf" name="cpf" class="form-control" placeholder="Seu CPF aqui...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="senha" class="col-sm-3 col-form-label text-decoration-underline">Senha:</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="senha" name="senha" class="form-control" placeholder="Sua SENHA aqui...">
                                    </div>
                                    <input type="submit" value="Login" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>








