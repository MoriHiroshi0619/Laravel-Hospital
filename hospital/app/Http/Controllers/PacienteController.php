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
        return view('paciente.create');
    }
}

