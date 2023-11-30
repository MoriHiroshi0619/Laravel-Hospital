@extends('layout.main')

@section('title', 'Bem vindo')

@section('usuario', $funcionario->pnome)
    
@section('content')


<div class="container py-2 mt-3 d-flex align-items-center justify-content-between">
    <div>
        <h1 class="text-uppercase">{{$funcionario->cargo}}</h1>
    </div>
    <div>
        <a href="/funcionario" class="btn btn-secondary">Ver Todos os Funcionarios</a>
        <a href="/paciente/criar" class="btn btn-primary">Adicionar Paciente</a>
    </div>
</div>
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
                        <th><a href="/funcionario/{{ $p->id }}" class="nav-link"><i class="bi bi-info-square-fill" style="font-size: 2rem"></i></a></th>
                    </tr>
                @endforeach
            </tbody>
            <caption class="text-center">Todos os Pacientes</caption>
        </table>
    </div>
</div>


@endsection