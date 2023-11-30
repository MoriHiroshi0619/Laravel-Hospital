@extends('layout.main')

@section('title', 'Bem vindo')

@section('usuario', $funcionario->pnome)
    
@section('content')


{{-- <div class="container py-2 mt-3 d-flex align-items-center justify-content-between">
    <div>
        <h1 class="text-uppercase">{{$funcionario->cargo}}</h1>
    </div>
    <div>
        <a href="/paciente" class="btn btn-secondary">Ver Todos os Pacientes</a>
        <a href="/funcionario/criar" class="btn btn-primary">Adicionar Funcionário</a>
    </div>
</div> --}}
<nav class="navbar navbar-expand-sm">
    <div class="container py-2 mt-3 d-flex align-items-center justify-content-between">
        <h1 class="text-uppercase">{{$funcionario->cargo}}</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#action">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="action">
            <div class="navbar-nav ms-auto d-flex align-items-center gap-2">
                @if ($funcionario->cargo == 'Admin')
                    <a href="/paciente" class="btn btn-secondary">Ver Todos os Pacientes</a>
                @endif
                <a href="#" class="btn btn-success">Agendar consulta</a>
                <a href="/funcionario/criar" class="btn btn-primary">Adicionar funcionario</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center align-middle caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Primeiro Nome</th>
                    <th>Ultimo Nome</th>
                    <th>Cargo</th>
                    <th>Saber mais</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $f)
                    <tr>
                        <th>{{$f->pnome}}</th>
                        <th>{{$f->unome}}</th>
                        <th>{{$f->cargo}}</th>
                        <th><a href="/funcionario/{{ $f->id }}" class="nav-link"><i class="bi bi-info-square-fill" style="font-size: 2rem"></i></a></th>
                    </tr>
                @endforeach
            </tbody>
            <caption class="text-center">Todos os funcionarios</caption>
        </table>
    </div>
</div>


@endsection