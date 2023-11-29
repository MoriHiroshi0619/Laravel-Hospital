<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Funcionario;


class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request)
    {
        // Validação das credenciais
        $request->validate([
            'cpf' => 'required',
            'senha' => 'required'
        ],[
            'cpf.required' => 'O CPF é obrigatório.',
            'senha.required' => 'A senha é obrigatória'
        ]);

        // Recupera as credenciais do formulário
        $cpf = $request->input('cpf');
        $senha = $request->input('senha');
        
        // Obtém o funcionário pelo CPF
        $funcionario = Funcionario::where('cpf', $cpf)->first();

        // Verifica se o funcionário existe e se a senha corresponde
        if ($funcionario && Hash::check($senha, $funcionario->senha)) {
            Auth::guard('funcionario')->login($funcionario, true);
            //Auth::guard('funcionario')->attempt(['cpf' => $cpf, 'senha' => $senha], true);
            return redirect('/funcionario')->with('msg', 'Login feito com Sucesso');
        } else {
            return redirect()->back()->withErrors(['error' => 'CPF ou senha inválidos']);
        }
    }

    public function logout(Request $request){
        Auth::guard('funcionario')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
