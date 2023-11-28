@extends('layout.main')

@section('title', 'Bem vindo')
    
@section('content')


<div class="container py-2">
    <h1>Funcionarios</h1>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center align-middle caption-top">
            <thead class="table-dark">
                <tr>
                    <th>Primeiro Nome</th>
                    <th>Ultimo Nome</th>
                    <th>Sexo</th>
                    <th>Contato</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Data de Nascimento</th>
                    <th>Cargo</th>
                    <th>Ultima Atualização</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionario as $f)
                    <tr>
                        <th>{{$f->pnome}}</th>
                        <th>{{$f->unome}}</th>
                        <th>{{$f->sexo}}</th>
                        <th>{{$f->contato}}</th>
                        <th>{{$f->cpf}}</th>
                        <th>{{$f->endereco}}</th>
                        <th>{{$f->data_nasc}}</th>
                        <th>{{$f->cargo}}</th>
                        <th>{{$f->updated_at}}</th>
                    </tr>
                @endforeach
            </tbody>
            <caption class="text-center">Todos os funcionarios</caption>
        </table>
    </div>
</div>


@endsection