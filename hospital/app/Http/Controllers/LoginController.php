<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){
        
        $request->validate([
            'cpf' => 'required',
            'senha' => 'required'
        ],[
            'cpf.required' => 'O CPF é obrigatório.',
            'senha.required' => 'A senha é obrigatória'
        ]);

        $credentials = $request->only('cpf', 'senha');

        $autenticado = Auth::guard('funcionario')->attempt($credentials);

        if($autenticado){
            return redirect('funcionario.index')->with('msg', 'Login feito com Sucesso');
        }else{
            return redirect()->back()->withErrors(['error' => 'CPF ou senha invalidos']);
        }
    }
}
