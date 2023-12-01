<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agendou;
use App\Models\Paciente;
use App\Models\Recepcao;


class AgendouController extends Controller
{
    public function index(){
        $funcionario = Auth::guard('funcionario')->user();
        $agendas = Agendou::with('paciente')->get();
        return view('agenda.index', ['agendas' => $agendas, 'funcionario' => $funcionario]);
    }

    public function create(){
        $funcionario = Auth::guard('funcionario')->user();
        return view('agenda.create', ['funcionario' => $funcionario]);
    }

    public function store(Request $request){
        $agenda = new Agendou();

        $agenda->data = $request->input('data');
        $agenda->grau_prioridade = $request->input('grau_prioridade');
        $paciente = Paciente::where('cpf', $request->input('paciente'))->first();
        $agenda->paciente_id = $paciente->id;
        //if(Auth::guard('funcionario')->user()->cargo == 'Recepção'){
            //$recepcao = Recepcao::findOrFail(Auth::guard('funcionario')->user()->id);
            //}
        $recepcao = Recepcao::where('funcionario_id', Auth::guard('funcionario')->user()->id)->first();
        $agenda->recepcionista_id = $recepcao->id; 
        if($agenda->save()){
            return redirect('/agenda')->with('msg', 'Consulta agendada com sucesso');
        }else{
            return redirect('/agenda')->with('error', 'Erro ao Agendar Consulta');
        }
    }

    public function show($id){
        $funcionario = Auth::guard('funcionario')->user();
        //$agenda = Agendou::with('paciente')->find($id);
        $agenda = Agendou::with([
            'paciente',
            'recepcionista.funcionario'
        ])->find($id);
    
        return view('agenda.show', ['agenda' => $agenda, 'funcionario' => $funcionario]);
    }
}
