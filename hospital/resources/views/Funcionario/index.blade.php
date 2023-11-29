@extends('layout.main')

@section('title', 'Bem vindo')

@section('usuario', $funcionario->pnome)
    
@section('content')


<div class="container py-2 mt-3 d-flex align-items-center justify-content-between">
    <div>
        <h1>Funcionarios</h1>
    </div>
    <div>
        <a href="/funcionario/criar" class="btn btn-primary">Adicionar Funcionário</a>
    </div>
</div>
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