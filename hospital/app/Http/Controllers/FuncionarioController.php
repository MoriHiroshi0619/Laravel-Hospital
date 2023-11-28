<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index(){

        $funcionario = Funcionario::all();
        return view('funcionario.index', ['funcionario' => $funcionario]);
    }

    public function create(){
        return view('funcionario.create');
    }

    public function store(Request $request){
        $funcionario = new Funcionario();

        $funcionario->pnome = $request->input('pnome');
        $funcionario->unome = $request->input('unome');
        $funcionario->sexo = $request->input('sexo');
        $funcionario->contato = $request->input('contato');
        $funcionario->cpf = $request->input('cpf');
        $funcionario->data_nasc = $request->input('dataNasc');

        $funcionario->endereco = $request->input('endereco') == '' ? null : $request->input('endereco');

        $funcionario->senha = bcrypt($request->input('senha'));
        $funcionario->cargo = $request->input('cargo');
        
        $funcionario->save();

        return redirect('/funcionario')->with('msg', 'Funcionario adicionado com sucesso');

        
    }
}
