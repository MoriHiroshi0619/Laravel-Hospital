@extends('layout.main')

@section('title', 'Adicionando Funcionario')

@section('usuario', $f->pnome)

@section('content')
    
<div class="container py-3" id="func-create-container">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Adicionando um novo funcionario
            <form action="/funcionario" method="GET">
                @csrf
                <input type="submit" value="Cancelar" class="btn btn-danger">
            </form>
          </div>
        <form action="/funcionario" method="POST" id="form">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <label for="pnome" class="col-sm-3 col-form-label text-decoration-underline">Primeiro Nome:</label>
                    <div class="col-sm-9">
                        <input type="text" id="pnome" class="form-control" name="pnome" placeholder="Primeiro Nome" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="unome" class="col-sm-3 col-form-label text-decoration-underline">Ultimo Nome</label>
                    <div class="col-sm-9">
                        <input type="text" id="unome" class="form-control" name="unome" placeholder="Ultimo Nome" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sexo" class="col-sm-3 col-form-label text-decoration-underline">sexo</label>
                    <div class="col-sm-9">
                        <select name="sexo" id="sexo" class="form-control">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="contato" class="col-sm-3 col-form-label text-decoration-underline">Contato</label>
                    <div class="col-sm-9">
                        <input type="text" id="contato" class="form-control" name="contato" placeholder="67912344321" maxlength="11" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="cpf" class="col-sm-3 col-form-label text-decoration-underline">CPF</label>
                    <div class="col-sm-9">
                        <input type="text" id="cpf" class="form-control" name="cpf" placeholder="00011122234" maxlength="11" minlength="11" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dataNasc" class="col-sm-3 col-form-label text-decoration-underline">Data de Nascimento</label>
                    <div class="col-sm-9">
                        <input type="date" id="dataNasc" class="form-control" name="dataNasc" required>
                    </div>
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    <label for="endereco" class="col-sm-3 col-form-label text-decoration-underline">Endereço</label>
                    <div class="col-sm-9">
                        <textarea name="endereco" id="endereco" class="form-control" cols="30" rows="10" placeholder="Informe o endereço"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="senha" class="col-sm-3 col-form-label text-decoration-underline">Senha</label>
                    <div class="col-sm-9">
                        <input type="password" id="senha" name="senha" class="form-control" minlength="6" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="cargo" class="col-sm-3 col-form-label text-decoration-underline">Cargo</label>
                    <div class="col-sm-9"> 
                        <select name="cargo" id="cargo" class="form-control">
                            <option value="Recepção">Recepção</option>
                            <option value="Enfermagem">Enfermagem</option>
                            <option value="Medicina">Medicina</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Administrativo">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3" id="camposEnfermagem" style="display: none;">
                    <label for="certificacao" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" id="certificacao" class="form-control" name="especialidade_enf" placeholder="Especialidade">
                    </div>
                </div>
                <div class="row mb-3" id="camposEnfermagem2" style="display: none;">
                    <label for="experiencia" class="col-sm-3 col-form-label text-decoration-underline">COREM:</label>
                    <div class="col-sm-9">
                        <input type="text" id="experiencia" class="form-control" name="corem" placeholder="COREM">
                    </div>
                </div>

                <div class="row mb-3" id="camposMedicina" style="display: none;">
                    <label for="especialidade" class="col-sm-3 col-form-label text-decoration-underline">Especialidade:</label>
                    <div class="col-sm-9">
                        <input type="text" id="especialidade" class="form-control" name="especialidade_me" placeholder="Especialidade">
                    </div>
                </div>
                <div class="row mb-3" id="camposMedicina2" style="display: none;">
                    <label for="CRM" class="col-sm-3 col-form-label text-decoration-underline">CRM:</label>
                    <div class="col-sm-9">
                        <input type="text" id="CRM" class="form-control" name="crm" placeholder="CRM">
                    </div>
                </div>


                    <input type="submit" class="btn btn-primary" value="Adicionar Novo Funcionario">
                </form>
            </div>
    </div>
</div>

<script>
    const form = document.getElementById('form');
    form.addEventListener('submit', function(event) {
        const cpfInput = document.getElementById('cpf');
        const cpfValue = cpfInput.value.trim();
        const contato = document.getElementById('contato');
        const contatoValue = contato.value.trim();
        if (isNaN(cpfValue)) {
            event.preventDefault(); 
            alert('O CPF deve conter apenas números.');
        }
        if(isNaN(contatoValue)){
            event.preventDefault(); 
            alert('O Contato deve conter apenas números.');
        }
    });
    $(document).ready(function() {
        $('#cargo').change(function() {
            var cargoSelecionado = $(this).val();
            if (cargoSelecionado === 'Medicina') {
                $('#camposMedicina').slideDown();
                $('#camposMedicina2').slideDown();
            } else {
                $('#camposMedicina').slideUp();
                $('#camposMedicina2').slideUp();
            }
            if (cargoSelecionado === 'Enfermagem') {
                $('#camposEnfermagem').slideDown();
                $('#camposEnfermagem2').slideDown();
            } else {
                $('#camposEnfermagem').slideUp();
                $('#camposEnfermagem2').slideUp();
            }

        });
    });
</script>


@endsection