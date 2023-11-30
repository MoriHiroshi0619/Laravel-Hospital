@extends('layout.main')

@section('title', 'Teste')

@section('usuario', $funcionario->pnome)
    
@section('content')

<div class="container mt-5" id="funcCard">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        Informações do Paciente
        <div class="d-flex align-items-center">
            <form action="/paciente/editar/{{$paciente->id}}" method="GET">
                @csrf
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>
            <form action="/paciente/{{ $paciente->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Deletar" class="btn btn-danger">
            </form>
            <a href="/paciente" class="btn btn-secondary"><span>voltar</span></a>
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <label for="id" class="col-sm-3 col-form-label text-decoration-underline">ID:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="id" value="{{$paciente->id}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="pnome" class="col-sm-3 col-form-label text-decoration-underline">Primeiro Nome:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="pnome" value="{{$paciente->pnome}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="unome" class="col-sm-3 col-form-label text-decoration-underline">Último Nome:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="unome" value="{{$paciente->unome}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="sexo" class="col-sm-3 col-form-label text-decoration-underline">Sexo:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="sexo" value="{{$paciente->sexo}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="contato" class="col-sm-3 col-form-label text-decoration-underline">Contato:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="contato" value="{{$paciente->contato}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="cpf" class="col-sm-3 col-form-label text-decoration-underline">CPF:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="cpf" value="{{$paciente->cpf}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="dataNasc" class="col-sm-3 col-form-label text-decoration-underline">Data de Nascimento:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="dataNasc" value="{{$paciente->data_nasc}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="endereco" class="col-sm-3 col-form-label text-decoration-underline">Endereço:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="endereco" value="{{$paciente->endereco}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="ultimaAtualizacao" class="col-sm-3 col-form-label text-decoration-underline">Última Atualização:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="ultimaAtualizacao" value="{{$paciente->updated_at}}">
          </div>
        </div>
        <div class="row mb-3">
            <label for="altura" class="col-sm-3 col-form-label text-decoration-underline">Altura:</label>
            <div class="col-sm-9 d-flex align-items-center">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="altura" value="{{$paciente->altura}}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="peso" class="col-sm-3 col-form-label text-decoration-underline">Peso:</label>
            <div class="col-sm-9 d-flex align-items-center">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold me-2" id="peso" value="{{$paciente->peso}}">
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection