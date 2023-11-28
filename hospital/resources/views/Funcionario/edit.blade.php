@extends('layout.main')

@section('title', 'Bem vindo')
    
@section('content')

<div class="container mt-5" id="funcCard">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        Informações do Funcionário
        <form action="/funcionario" method="GET">
            @csrf
            <input type="submit" value="Cancelar" class="btn btn-danger">
        </form>
      </div>
      <form action="/funcionario/editar/{{$funcionario->id}}" method="POST" id="formEdit">
          @csrf
          @method('PUT')  
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
                <input type="text" class="form-control text-dark fw-bold" id="pnome" name="pnome" value="{{$funcionario->pnome}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="unome" class="col-sm-3 col-form-label text-decoration-underline">Último Nome:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control text-dark fw-bold" id="unome" name="unome" value="{{$funcionario->unome}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="sexo" class="col-sm-3 col-form-label text-decoration-underline">Sexo:</label>
              <div class="col-sm-9">
                <select name="sexo" id="sexo" class="form-control">
                    @if($funcionario->sexo == 'M'){
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
                <input type="text" name="contato" id="contato" class="form-control text-dark fw-bold" maxlength="11" value="{{$funcionario->contato}}">
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
                <input type="date" id="dataNasc" name="dataNasc" class="form-control text-dark fw-bold" value="{{$funcionario->data_nasc}}">
              </div>
            </div>
            <div class="row mb-3 d-flex align-items-center">
              <label for="endereco" class="col-sm-3 col-form-label text-decoration-underline">Endereço:</label>
              <div class="col-sm-9">
                <textarea name="endereco" id="endereco" class="form-control" cols="30" rows="10" placeholder="Informe o endereço">{{$funcionario->endereco}}</textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="cargo" class="col-sm-3 col-form-label text-decoration-underline">Cargo:</label>
              <div class="col-sm-9">
                <select name="cargo" id="cargo" class="form-control">
                    @php
                        if($funcionario->cargo == 'Recepcionista'){
                            echo <<<HTML
                                    <option value="Recepcionista">Recepcionista</option>
                                    <option value="Enfermeiro">Enfermeiro</option>
                                    <option value="Medico">Médico</option>
                                    <option value="Administrativo">Administrativo</option>
                                HTML;
                        }else if($funcionario->cargo == 'Enfermeiro'){
                            echo <<<HTML
                                <option value="Enfermeiro">Enfermeiro</option>
                                <option value="Recepcionista">Recepcionista</option>
                                <option value="Medico">Médico</option>
                                <option value="Administrativo">Administrativo</option>
                            HTML;
                        }else if($funcionario->cargo == 'Médico' || $funcionario->cargo == 'Medico'){
                            echo <<<HTML
                                <option value="Medico">Médico</option>
                                <option value="Enfermeiro">Enfermeiro</option>
                                <option value="Recepcionista">Recepcionista</option>
                                <option value="Administrativo">Administrativo</option>
                            HTML;
                        }else{
                            echo <<<HTML
                                <option value="Administrativo">Administrativo</option>
                                <option value="Medico">Médico</option>
                                <option value="Enfermeiro">Enfermeiro</option>
                                <option value="Recepcionista">Recepcionista</option>
                            HTML;
                        }
                    @endphp
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="ultimaAtualizacao" class="col-sm-3 col-form-label text-decoration-underline">Última Atualização:</label>
              <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext text-dark fw-bold" id="ultimaAtualizacao" value="{{$funcionario->updated_at}}">
              </div>
            </div>
            <input type="submit" value="Alterar informações do funcionario" class="btn btn-primary">
          </div>
      </form>
    </div>
  </div>

<script>
    const form = document.getElementById('formEdit');
    form.addEventListener('submit', function(event) {
        const contato = document.getElementById('contato');
        const contatoValue = contato.value.trim();
        if(isNaN(contatoValue)){
            event.preventDefault(); 
            alert('O Contato deve conter apenas números.');
        }
    });    
</script>

@endsection
