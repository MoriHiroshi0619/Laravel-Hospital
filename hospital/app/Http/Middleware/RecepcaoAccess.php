<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RecepcaoAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::guard('funcionario')->check() && Auth::guard('funcionario')->user()->cargo == 'Recepção' || Auth::guard('funcionario')->user()->cargo == 'Admin') {
            return $next($request);
        }
    
        return redirect('/login')->with('error', 'Você não tem acesso a essa rota'); 
        /* if (!Auth::guard('funcionario')->check()) {
            return redirect('/login')->with('error', 'Você precisa logar no sistema primeiro');
        }

        if(Auth::guard('funcionario')->user()->cargo != 'Recepção' ){
            return redirect('/login')->with('error', 'Você não tem acesso a essa rota');
        }

        return $next($request); */
    }
}
