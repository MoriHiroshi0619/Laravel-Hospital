@extends('layout.main')

@section('title', 'Teste')

@section('usuario', $funcionario->pnome)
    
@section('content')

<div class="container mt-5" id="funcCard">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        Informações do agendamento da consulta
        <div class="d-flex align-items-center">
            <form action="/agenda/{{ $agenda->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Deletar" class="btn btn-danger">
            </form>
            <a href="/agenda" class="btn btn-secondary"><span>voltar</span></a>
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <label for="id" class="col-sm-3 col-form-label text-decoration-underline">ID:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="id" value="{{$agenda->id}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="data" class="col-sm-3 col-form-label text-decoration-underline">data:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="data" value="{{$agenda->data}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="grau_prioridade" class="col-sm-3 col-form-label text-decoration-underline">Grau de Prioridade:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="grau_prioridade" value="{{$agenda->grau_prioridade}}">
          </div>
        </div>
        <hr>
        <p class="font-weight-bold">Informações do Paciente</p>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label text-decoration-underline">ID:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="id" value="{{$agenda->paciente->id}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="pnome" class="col-sm-3 col-form-label text-decoration-underline">Primeiro Nome:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="pnome" value="{{$agenda->paciente->pnome}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="unome" class="col-sm-3 col-form-label text-decoration-underline">Último Nome:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="unome" value="{{$agenda->paciente->unome}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="sexo" class="col-sm-3 col-form-label text-decoration-underline">Sexo:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="sexo" value="{{$agenda->paciente->sexo}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="contato" class="col-sm-3 col-form-label text-decoration-underline">Contato:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="contato" value="{{$agenda->paciente->contato}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="cpf" class="col-sm-3 col-form-label text-decoration-underline">CPF:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="cpf" value="{{$agenda->paciente->cpf}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="dataNasc" class="col-sm-3 col-form-label text-decoration-underline">Data de Nascimento:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="dataNasc" value="{{$agenda->paciente->data_nasc}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="endereco" class="col-sm-3 col-form-label text-decoration-underline">Endereço:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="endereco" value="{{$agenda->paciente->endereco}}">
            </div>
          </div>
          <div class="row mb-3">
              <label for="altura" class="col-sm-3 col-form-label text-decoration-underline">Altura:</label>
              <div class="col-sm-9 d-flex align-items-center">
                <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="altura" value="{{$agenda->paciente->altura}}">
              </div>
          </div>
          <div class="row mb-3">
              <label for="peso" class="col-sm-3 col-form-label text-decoration-underline">Peso:</label>
              <div class="col-sm-9 d-flex align-items-center">
                <input type="text" readonly class="form-control-plaintext text-dark fw-bold me-2" id="peso" value="{{$agenda->paciente->peso}}">
              </div>
          </div>
          <hr>
          <p class="font-weight-bold">Agendado por</p>
          <div class="row mb-3">
            <label for="id_recepcao" class="col-sm-3 col-form-label text-decoration-underline">ID:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="id_recepcao" value="{{ $agenda->recepcionista->id}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="recepcao_pnome" class="col-sm-3 col-form-label text-decoration-underline">Primeiro Nome:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="recepcao_pnome" value="{{ $agenda->recepcionista->funcionario->pnome}}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="recepcao_unome" class="col-sm-3 col-form-label text-decoration-underline">Ultimo Nome:</label>
            <div class="col-sm-9">
              <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="recepcao_unome" value="{{ $agenda->recepcionista->funcionario->unome}}">
            </div>
          </div>
    </div>
  </div>
@endsection