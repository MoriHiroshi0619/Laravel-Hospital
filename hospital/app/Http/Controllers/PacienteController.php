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
}

