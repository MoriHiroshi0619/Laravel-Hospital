<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    public function index(){
        $pacientes = Paciente::all();
        $funcionario = Auth::guard('funcionario')->user();
        return view('paciente.index', ['pacientes' => $pacientes ,'funcionario' => $funcionario]);
    }

    public function create(){
        $funcionario = Auth::guard('funcionario')->user();
        return view('paciente.create', ['funcionario' => $funcionario]);
    }

    public function store(Request $request){
        $paciente = new Paciente();

        $paciente->pnome = $request->input('pnome');
        $paciente->unome = $request->input('unome');
        $paciente->sexo = $request->input('sexo');
        $paciente->contato = $request->input('contato');
        $paciente->cpf = $request->input('cpf');
        $paciente->data_nasc = $request->input('dataNasc');
        $paciente->endereco = $request->input('endereco') == '' ? null : $request->input('endereco');
        $paciente->altura = $request->input('altura') == '' ? null : $request->input('altura');
        $paciente->peso = $request->input('peso') == '' ? null : $request->input('peso');

        $paciente->save();

        return redirect('/paciente')->with('msg', 'Paciente adicionado com sucesso');
    }

    public function show($id){
        $paciente = Paciente::findOrFail($id);
        $funcionario = Auth::guard('funcionario')->user();
        return view('paciente.show', ['paciente' => $paciente, 'funcionario' => $funcionario]);
    }

    public function delete($id){
        $paciente = Paciente::find($id);

        if($paciente){
            $paciente->delete();
            return redirect('/paciente')->with('msg', 'Paciente deletado com sucesso');
        }else{
            return redirect('/paciente')->with('error', 'Error ao deletar Paciente');
        }
    }
    
    public function edit($id){
        $paciente = Paciente::find($id);
        $funcionario = Auth::guard('funcionario')->user();
        return view('paciente.edit', ['paciente' => $paciente, 'funcionario' => $funcionario]);
    }

    public function put(Request $request,$id){
        $pacienteNovo = Paciente::find($id);

        $pacienteNovo->pnome = $request->input('pnome');
        $pacienteNovo->unome = $request->input('unome');
        $pacienteNovo->sexo = $request->input('sexo');
        $pacienteNovo->contato = $request->input('contato');
        $pacienteNovo->data_nasc = $request->input('dataNasc');
        $pacienteNovo->endereco = $request->input('endereco') == '' ? null : $request->input('endereco');
        $pacienteNovo->altura = $request->input('altura') == '' ? null : $request->input('altura');
        $pacienteNovo->peso = $request->input('peso') == '' ? null : $request->input('peso');

        $pacienteNovo->save();
        return redirect('/paciente')->with('msg', 'Paciente Atualizado com sucesso');
    }

    public function buscaCpf(Request $request) {
        $searchTerm = $request->input('search');
        $pacientes = Paciente::where('cpf', 'like', '%' . $searchTerm . '%')->get(['id', 'pnome', 'unome', 'cpf']);

        $formattedPacientes = [];
        foreach ($pacientes as $paciente) {
            $label = $paciente->pnome . ' - ' . $paciente->unome . ' - ' . $paciente->cpf;
            $formattedPacientes[] = [
                'label' => $label,
                'value' => $paciente->cpf
            ];
        }

        return response()->json($formattedPacientes);
    }

}

