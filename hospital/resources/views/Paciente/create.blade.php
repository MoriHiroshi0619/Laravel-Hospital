@extends('layout.main')

@section('title', 'Adicionando Funcionario')

@section('usuario', $funcionario->pnome)

@section('content')
    
<div class="container py-3" id="func-create-container">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Adicionando um novo paciente
            <form action="/paciente" method="GET">
                @csrf
                <input type="submit" value="Cancelar" class="btn btn-danger">
            </form>
          </div>
        <form action="/paciente" method="POST" id="form">
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
                    <label for="altura" class="col-sm-3 col-form-label text-decoration-underline">Altura</label>
                    <div class="col-sm-9 d-flex align-items-center">
                        <input type="range" id="altura" class="form-range me-2" name="altura" min="120" max="240" oninput="updateAlturaValue(this.value)">
                        <span id="alturaValue">100</span><span>cm</span> 
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="peso" class="col-sm-3 col-form-label text-decoration-underline">Peso</label>
                    <div class="col-sm-9">
                        <input type="number" id="peso" class="form-control" name="peso" step="0.1" min="40" max="150" >
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
    function updateAlturaValue(val) {
        document.getElementById('alturaValue').innerText = val;
    }
</script>


@endsection