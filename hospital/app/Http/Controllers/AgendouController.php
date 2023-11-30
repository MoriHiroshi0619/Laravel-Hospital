<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendouController extends Controller
{
    public function create(){
        $funcionario = Auth::guard('funcionario')->user();
        return view('agenda.create', ['funcionario' => $funcionario]);
    }
}
