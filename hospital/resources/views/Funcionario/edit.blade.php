@extends('layout.main')

@section('title', 'Bem vindo')

@section('usuario', $f->pnome)
    
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
                        if($funcionario->cargo == 'Recepção'){
                            echo <<<HTML
                                    <option value="Recepção">Recepção</option>
                                    <option value="Enfermagem">Enfermagem</option>
                                    <option value="Medicina">Medicina</option>
                                    <option value="Administrativo">Administrativo</option>
                                    <option value="Administrativo">Admin</option>
                                HTML;
                        }else if($funcionario->cargo == 'Enfermagem'){
                            echo <<<HTML
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Recepção">Recepção</option>
                                <option value="Medicina">Medicina</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Administrativo">Admin</option>
                            HTML;
                        }else if($funcionario->cargo == 'Medicina'){
                            echo <<<HTML
                                <option value="Medicina">Medicina</option>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Recepção">Recepção</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Administrativo">Admin</option>
                            HTML;
                        }else if($funcionario->cargo == 'Administrativo'){
                            echo <<<HTML
                                <option value="Administrativo">Administrativo</option>
                                <option value="Medicina">Medicina</option>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Recepção">Recepção</option>
                                <option value="Administrativo">Admin</option>
                            HTML;
                        }else{
                            echo <<<HTML
                                <option value="Administrativo">Admin</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Medicina">Medicina</option>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Recepção">Recepção</option>
                            HTML;
                        }
                    @endphp
                </select>
              </div>
            </div>
            @if ($funcionario->cargo == 'Medicina')
            @if (optional($funcionario->medicina)->especialidade)
                <div class="row mb-3">
                    <label for="especialidade_me" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="especialidade_me" id="especialidade_me" value="{{$funcionario->medicina->especialidade}}">
                    </div>
                </div>
            @else 
                <div class="row mb-3">
                    <label for="especialidade_me" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="especialidade_me" id="especialidade_me" value="">
                    </div>
                </div>            
            @endif
            @if(optional($funcionario->medicina)->crm)
                <div class="row mb-3">
                    <label for="crm" class="col-sm-3 col-form-label text-decoration-underline">CRM:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="crm" id="crm" value="{{$funcionario->medicina->crm}}">
                    </div>
                </div>
            @else
                <div class="row mb-3">
                    <label for="crm" class="col-sm-3 col-form-label text-decoration-underline">CRM:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="crm" id="crm" value="">
                    </div>
                </div>
            @endif
        @endif
        @if ($funcionario->cargo == 'Enfermagem')
            @if (optional($funcionario->enfermagem)->especialidade)
                <div class="row mb-3">
                    <label for="especialidade_enf" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="especialidade_enf" id="especialidade_enf" value="{{$funcionario->enfermagem->especialidade}}">
                    </div>
                </div>
            @else 
                <div class="row mb-3">
                    <label for="especialidade_enf" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="especialidade_enf" id="especialidade_enf" value="">
                    </div>
                </div>            
            @endif
            @if(optional($funcionario->enfermagem)->corem)
                <div class="row mb-3">
                    <label for="corem" class="col-sm-3 col-form-label text-decoration-underline">COREM:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold" name="corem" id="corem" value="{{$funcionario->enfermagem->corem}}">
                    </div>
                </div>
            @else
                <div class="row mb-3">
                    <label for="corem" class="col-sm-3 col-form-label text-decoration-underline">corem:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-dark fw-bold"  name="corem" id="corem" value="">
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
