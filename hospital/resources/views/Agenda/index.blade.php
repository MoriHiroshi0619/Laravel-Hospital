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
                <a href="/paciente" class="btn btn-secondary">Ver todos os Pacientes</a>
                <a href="/agenda/criar" class="btn btn-success">Agendar consulta</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center align-middle caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Data</th>
                    <th>Grau de Prioridade</th>
                    <th>Paciente</th>
                    <th>Saber mais</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $a)
                    <tr>
                        <th>{{$a->data}}</th>
                        <th>{{$a->grau_prioridade}}</th>
                        <th>{{$a->funcionario_id}}</th>
                        <th><a href="/paciente/{{ $a->funcionario_id }}" class="nav-link"><i class="bi bi-info-square-fill" style="font-size: 2rem"></i></a></th>
                    </tr>
                @endforeach
            </tbody>
            <caption class="text-center">Todas as Consultas agendadas</caption>
        </table>
    </div>
</div>


@endsection