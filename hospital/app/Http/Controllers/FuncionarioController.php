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
}
