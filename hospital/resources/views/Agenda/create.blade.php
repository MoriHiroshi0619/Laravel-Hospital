@extends('layout.main')

@section('title', 'Bem vindo')

@section('usuario', $funcionario->pnome)
    
@section('content')

<div class="container py-3" id="func-create-container">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            Agendando uma Consulta
            <form action="/agenda" method="GET">
                @csrf
                <input type="submit" value="Cancelar" class="btn btn-danger">
            </form>
          </div>
        <form action="/agenda" method="POST" onsubmit="return validarData()">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <label for="data" class="col-sm-3 col-form-label text-decoration-underline">Data:</label>
                    <div class="col-sm-9">
                        <input type="date" id="data" class="form-control" name="data" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="grau_prioridade" class="col-sm-3 col-form-label text-decoration-underline">Grau de Prioridade:</label>
                    <div class="col-sm-9">
                        <select name="grau_prioridade" id="grau_prioridade" class="form-control">
                            <option value="BAIXO">BAIXO</option>
                            <option value="NORMAL">NORMAL</option>
                            <option value="ALTO">ALTO</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="paciente" class="col-sm-3 col-form-label text-decoration-underline">Paciente CPF:</label>
                    <div class="col-sm-9">
                        <input type="text" id="paciente" class="form-control" name="paciente" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Agendar Nova Consulta">
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#paciente").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '/buscar_pacientes_por_cpf', 
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'search': request.term 
                    },
                    success: function(data) {
                        response(data);
                        
                    }
                });
            },
            minLength: 2 
        });
    });
    function validarData() {
        // Pegar a data selecionada pelo usuário
        var dataSelecionada = new Date(document.getElementById('data').value);
        
        // Pegar a data atual
        var dataAtual = new Date();
        
        // Comparar as datas
        if (dataSelecionada < dataAtual) {
            alert('Selecione uma data futura.');
            return false; // Impede o envio do formulário
        }
        
        return true; // Permite o envio do formulário se a data for futura
    }

</script>

@endsection