@extends('layout.main')

@section('title', 'Adicionando Funcionario')

@section('content')
    
<div class="container py-3" id="func-create-container">
    <h2>Adicionando um novo funcionario.</h2>
    <form action="/funcionario" method="POST">
        @csrf
        <div class="form-group">
            <label for="pnome">Primeiro Nome</label>
            <input type="text" id="pnome" class="form-control" name="pnome" placeholder="Primeiro Nome" required>
        </div>
        <div class="form-group">
            <label for="unome">Ultimo Nome</label>
            <input type="text" id="unome" class="form-control" name="unome" placeholder="Ultimo Nome" required>
        </div>
        <div class="form-group">
            <label for="sexo">sexo</label>
            <select name="sexo" id="sexo" class="form-control">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="contato">Contato</label>
            <input type="text" id="contato" class="form-control" name="contato" placeholder="67912344321" maxlength="11" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" class="form-control" name="cpf" placeholder="00011122234" maxlength="11" minlength="11" required>
        </div>
        <div class="form-group">
            <label for="dataNasc">Data de Nascimento</label>
            <input type="date" id="dataNasc" class="form-control" name="dataNasc" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <textarea name="endereco" id="endereco" class="form-control" cols="30" rows="10" placeholder="Informe o endereço"></textarea>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" minlength="6" required>
        </div>
        <div class="form-group">
            <label for="cargo">Cargo</label>
            <select name="cargo" id="cargo" class="form-control">
                <option value="Recepcionista">Recepcionista</option>
                <option value="Enfermeiro">Enfermeiro</option>
                <option value="Medico">Médico</option>
                <option value="Administrativo">Administrativo</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Adicionar Novo Funcionario">
    </form>
</div>

<script>
    const form = document.querySelector('form');
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
</script>


@endsection