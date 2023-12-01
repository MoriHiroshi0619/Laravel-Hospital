<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FuncionarioController extends Controller
{
    public function index(){
        // Verifica se há um funcionário autenticado
        /* if (Auth::guard('funcionario')->check()) {
            $funcionario = Auth::guard('funcionario')->user();
            $funcionarios = Funcionario::all();
            return view('funcionario.index', ['funcionarios' => $funcionarios, 'funcionario' => $funcionario]);
        }else{
            redirect('/login')->with('error', 'Por favor você precisa logar no sistema primeiro.');
        } */
        $funcionario = Auth::guard('funcionario')->user();
        $funcionarios = Funcionario::all();
        return view('funcionario.index', ['funcionarios' => $funcionarios, 'funcionario' => $funcionario]);
    }

    public function create(){
        $f = Auth::guard('funcionario')->user();
        return view('funcionario.create', ['f'=>$f]);
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
        
        $cargo = $funcionario->cargo;
        $id = $funcionario->id;
        $crm = $request->input('crm');
        $corem = $request->input('corem');
        if($cargo == 'Medicina'){
            $especialidade = $request->input('especialidade_me');
            DB::select("SELECT InsertIntoRoleTable('$cargo', $id, '$especialidade', '$crm', '$corem')");
        }else if($cargo == 'Enfermagem'){
            $especialidade = $request->input('especialidade_enf');
            DB::select("SELECT InsertIntoRoleTable('$cargo', $id, '$especialidade','$crm', '$corem')");
        }else{
            DB::select("SELECT InsertIntoRoleTable('$cargo', $id)");
        }

        return redirect('/funcionario')->with('msg', 'Funcionario adicionado com sucesso');

    }

    public function show($id){
        $f = Auth::guard('funcionario')->user();
        $funcionario = Funcionario::findOrFail($id);
        if($funcionario->cargo == 'Medicina'){
            $funcionario = Funcionario::with('medicina')->find($id);
        }
        if($funcionario->cargo == 'Enfermagem'){
            $funcionario = Funcionario::with('enfermagem')->find($id);
        }

        return view('funcionario.show', ['funcionario' => $funcionario, 'f'=>$f]);
    }

    public function edit($id){ 
        $f = Auth::guard('funcionario')->user();
        $funcionario = Funcionario::find($id);
        return view('funcionario.edit', ['funcionario' => $funcionario, 'f'=>$f]);
    }

    public function delete($id){
        $funcionario = Funcionario::find($id);
    
        if ($funcionario) {
            $funcionario->delete();
            return redirect('/funcionario')->with('msg', 'Funcionário deletado com sucesso');
        } else {
            return redirect('/funcionario')->with('error', 'Funcionário não encontrado');
        }
    }

    public function put(Request $request, $id){
        $funcionarioNovo = Funcionario::find($id);

        $funcionarioNovo->pnome = $request->input('pnome');
        $funcionarioNovo->unome = $request->input('unome');
        $funcionarioNovo->sexo = $request->input('sexo');
        $funcionarioNovo->contato = $request->input('contato');
        $funcionarioNovo->data_nasc = $request->input('dataNasc');
        $funcionarioNovo->endereco = $request->input('endereco') == '' ? null : $request->input('endereco');
        $funcionarioNovo->cargo = $request->input('cargo');
        $funcionarioNovo->save();

        $cargo = $funcionarioNovo->cargo;
        $id = $funcionarioNovo->id;
        $crm = $request->input('crm');
        $corem = $request->input('corem');
        if($cargo == 'Medicina'){
            $especialidade = $request->input('especialidade_me');
            DB::select("SELECT AtualizarFuncionarioEnf_Me($id, '$cargo', '$especialidade', '$crm')");
        }

        if($cargo == 'Enfermagem'){
            $especialidade = $request->input('especialidade_enf');
            DB::select("SELECT AtualizarFuncionarioEnf_Me($id, '$cargo', '$especialidade', '$corem')");
        }

        return redirect('/funcionario')->with('msg', 'Funcionário atualizado com sucesso');
    }
}



