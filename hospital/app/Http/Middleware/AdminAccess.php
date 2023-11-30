<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('funcionario')->check() && Auth::guard('funcionario')->user()->cargo == 'admin'){
            return $next($request);
        }else{
            if(!Auth::guard('funcionario')->check()){
                return redirect('/login')->with('error', 'Você precisa logar no sistema primeiro');
            }
            return redirect('/login')->with('error', 'Apenas Usuarios Admin podem acessar essa rota');
            
        }
    }
}
