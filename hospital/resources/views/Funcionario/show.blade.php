@extends('layout.main')

@section('title', 'Teste')

@section('usuario', $f->pnome)
    
@section('content')

<div class="container mt-5" id="funcCard">
    <div class="card">
      <div class="card-header d-flex flex-column flex-md-row  align-items-center justify-content-between">
        Informações do Funcionário
        {{-- <div class="d-flex align-items-center">
            <form action="/funcionario/editar/{{$funcionario->id}}" method="GET">
                @csrf
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>
            <form action="/funcionario/{{ $funcionario->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Deletar" class="btn btn-danger">
            </form>
            <a href="/funcionario" class="btn btn-secondary">Voltar</a>
        </div> --}}
        <div class="d-flex flex-column flex-md-row align-items-center mt-md-0 mt-2">
            <form action="/funcionario/editar/{{$funcionario->id}}" method="GET" class="mb-md-0 mb-2">
                @csrf
                <input type="submit" value="Editar" class="btn btn-primary">
            </form>
            <form action="/funcionario/{{ $funcionario->id }}" method="POST" class="mb-md-0 mb-2">
                @csrf
                @method('DELETE')
                <input type="submit" value="Deletar" class="btn btn-danger">
            </form>
            <a href="/funcionario" class="btn btn-secondary">Voltar</a>
        </div>
        
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <label for="id" class="col-sm-3 col-form-label text-decoration-underline">ID:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="id" value="{{$funcionario->id}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="pnome" class="col-sm-3 col-form-label text-decoration-underline">Primeiro Nome:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="pnome" value="{{$funcionario->pnome}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="unome" class="col-sm-3 col-form-label text-decoration-underline">Último Nome:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="unome" value="{{$funcionario->unome}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="sexo" class="col-sm-3 col-form-label text-decoration-underline">Sexo:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="sexo" value="{{$funcionario->sexo}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="contato" class="col-sm-3 col-form-label text-decoration-underline">Contato:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="contato" value="{{$funcionario->contato}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="cpf" class="col-sm-3 col-form-label text-decoration-underline">CPF:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="cpf" value="{{$funcionario->cpf}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="dataNasc" class="col-sm-3 col-form-label text-decoration-underline">Data de Nascimento:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="dataNasc" value="{{$funcionario->data_nasc}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="endereco" class="col-sm-3 col-form-label text-decoration-underline">Endereço:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="endereco" value="{{$funcionario->endereco}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="cargo" class="col-sm-3 col-form-label text-decoration-underline">Cargo:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="cargo" value="{{$funcionario->cargo}}">
          </div>
        </div>
        @if ($funcionario->cargo == 'Medicina')
            @if (optional($funcionario->medicina)->especialidade)
                <div class="row mb-3">
                    <label for="especialidade_me" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="especialidade_me" value="{{$funcionario->medicina->especialidade}}">
                    </div>
                </div>
            @else 
                <div class="row mb-3">
                    <label for="especialidade_me" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="especialidade_me" value="">
                    </div>
                </div>            
            @endif
            @if(optional($funcionario->medicina)->crm)
                <div class="row mb-3">
                    <label for="crm" class="col-sm-3 col-form-label text-decoration-underline">CRM:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="crm" value="{{$funcionario->medicina->crm}}">
                    </div>
                </div>
            @else
                <div class="row mb-3">
                    <label for="crm" class="col-sm-3 col-form-label text-decoration-underline">CRM:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="crm" value="">
                    </div>
                </div>
            @endif
        @endif
        @if ($funcionario->cargo == 'Enfermagem')
            @if (optional($funcionario->enfermagem)->especialidade)
                <div class="row mb-3">
                    <label for="especialidade_enf" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="especialidade_enf" value="{{$funcionario->enfermagem->especialidade}}">
                    </div>
                </div>
            @else 
                <div class="row mb-3">
                    <label for="especialidade_enf" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="especialidade_enf" value="">
                    </div>
                </div>            
            @endif
            @if(optional($funcionario->enfermagem)->corem)
                <div class="row mb-3">
                    <label for="corem" class="col-sm-3 col-form-label text-decoration-underline">COREM:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="corem" value="{{$funcionario->enfermagem->corem}}">
                    </div>
                </div>
            @else
                <div class="row mb-3">
                    <label for="corem" class="col-sm-3 col-form-label text-decoration-underline">corem:</label>
                    <div class="col-sm-9">
                        <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="corem" value="">
                    </div>
                </div>
            @endif
        @endif
        <div class="row mb-3">
          <label for="ultimaAtualizacao" class="col-sm-3 col-form-label text-decoration-underline">Última Atualização:</label>
          <div class="col-sm-9">
            <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="ultimaAtualizacao" value="{{$funcionario->updated_at}}">
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection