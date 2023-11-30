@extends('layout.main')

@section('title', 'Teste')

@section('usuario', $funcionario->pnome)
    
@section('content')

<div class="container mt-5" id="funcCard">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        Informações do Paciente
        <div class="d-flex align-items-center">
            <form action="/paciente" method="GET">
                @csrf
                <input type="submit" value="cancelar" class="btn btn-danger">
            </form>
        </div>
      </div>
      <form action="/paciente/editar/{{$paciente->id}}" method="POST" id="form">
        @csrf
        @method('PUT')  
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
                <input type="text" class="form-control text-dark fw-bold" name="pnome" id="pnome" value="{{$paciente->pnome}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="unome" class="col-sm-3 col-form-label text-decoration-underline">Último Nome:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control text-dark fw-bold" name="unome" id="unome" value="{{$paciente->unome}}">
              </div>
            </div>
            <div class="row mb-3">
                <label for="sexo" class="col-sm-3 col-form-label text-decoration-underline">Sexo:</label>
                <div class="col-sm-9">
                  <select name="sexo" id="sexo" class="form-control">
                      @if($paciente->sexo == 'M'){
                          <option value="M">M</option>
                          <option value="F">F</option>
                      }
                      @else{
                          <option value="F">F</option>
                          <option value="M">M</option>
                      }
                      @endif
                  </select>
                </div>
              </div>
            <div class="row mb-3">
              <label for="contato" class="col-sm-3 col-form-label text-decoration-underline">Contato:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control text-dark fw-bold" name="contato" id="contato" value="{{$paciente->contato}}">
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
                <input type="date" class="form-control text-dark fw-bold" name="dataNasc" id="dataNasc" value="{{$paciente->data_nasc}}">
              </div>
            </div>
            <div class="row mb-3 d-flex align-items-center">
                <label for="endereco" class="col-sm-3 col-form-label text-decoration-underline">Endereço:</label>
                <div class="col-sm-9">
                  <textarea name="endereco" id="endereco" class="form-control" cols="30" rows="10" placeholder="Informe o endereço">{{$paciente->endereco}}</textarea>
                </div>
              </div>
            <div class="row mb-3">
                <label for="altura" class="col-sm-3 col-form-label text-decoration-underline">Altura</label>
                <div class="col-sm-9 d-flex align-items-center">
                    <input type="range" id="altura" class="form-range me-2" name="altura" min="120" max="240" oninput="updateAlturaValue(this.value)" value="{{$paciente->altura}}">
                    <span id="alturaValue">{{$paciente->altura}}</span><span>cm</span> 
                </div>
            </div>
            <div class="row mb-3">
                <label for="peso" class="col-sm-3 col-form-label text-decoration-underline">Peso:</label>
                <div class="col-sm-9 d-flex align-items-center">
                    <input type="text" class="form-control text-dark fw-bold me-2" name="peso" id="peso" value="{{$paciente->peso}}">
                </div>
            </div>
            <div class="row mb-3">
              <label for="ultimaAtualizacao" class="col-sm-3 col-form-label text-decoration-underline">Última Atualização:</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="ultimaAtualizacao" value="{{$paciente->updated_at}}">
              </div>
            </div>
            <input type="submit" value="Alterar informações do Paciente" class="btn btn-primary">
          </div>
      </form>
    </div>
  </div>

<script>
    const form = document.getElementById('form');
    form.addEventListener('submit', function(event) {
        const contato = document.getElementById('contato');
        const contatoValue = contato.value.trim();
        if(isNaN(contatoValue)){
            event.preventDefault(); 
            alert('O Contato deve conter apenas números.');
        }
    });
    function updateAlturaValue(val) {
        document.getElementById('alturaValue').innerText = val;
    }
</script>

@endsection