@extends('layout.main')

@section('title', 'Bem vindo')
    
@section('content')

<main>
    <h1>funcionarios</h1>
    <div class="container">
        <table class="table table-striped table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Primeiro Nome</th>
                    <th>Ultimo Nome</th>
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
                        <th>{{$f->contato}}</th>
                        <th>{{$f->cpf}}</th>
                        <th>{{$f->endereco}}</th>
                        <th>{{$f->data_nasc}}</th>
                        <th>{{$f->cargo}}</th>
                        <th>{{$f->updated_at}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>


@endsection