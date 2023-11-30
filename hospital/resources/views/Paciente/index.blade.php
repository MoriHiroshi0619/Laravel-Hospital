@extends('layout.main')

@section('title', 'Bem vindo')

@section('usuario', $funcionario->pnome)
    
@section('content')


<nav class="navbar navbar-expand-sm">
    <div class="container py-2 mt-3 d-flex align-items-center justify-content-between">
        <h1 class="text-uppercase">{{$funcionario->cargo}}</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#action">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="action">
            <div class="navbar-nav ms-auto d-flex align-items-center gap-2">
                @if ($funcionario->cargo == 'Admin')
                    <a href="/funcionario" class="btn btn-secondary">Ver Todos os Funcionarios</a>
                @endif
                <a href="/agenda/criar" class="btn btn-success">Agendar consulta</a>
                <a href="/paciente/criar" class="btn btn-primary">Adicionar Paciente</a>
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
                    <th>CPF</th>
                    <th>Saber mais</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $p)
                    <tr>
                        <th>{{$p->pnome}}</th>
                        <th>{{$p->unome}}</th>
                        <th>{{$p->cpf}}</th>
                        <th><a href="/paciente/{{ $p->id }}" class="nav-link"><i class="bi bi-info-square-fill" style="font-size: 2rem"></i></a></th>
                    </tr>
                @endforeach
            </tbody>
            <caption class="text-center">Todos os Pacientes</caption>
        </table>
    </div>
</div>


@endsection