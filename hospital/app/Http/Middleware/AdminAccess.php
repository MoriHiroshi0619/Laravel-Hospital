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
        if (Auth::guard('funcionario')->check() && Auth::guard('funcionario')->user()->cargo == 'Admin') {
            return $next($request);
        }
        
        return redirect('/login')->with('error', 'Apenas usuários Admin podem acessar essa rota'); 
    
    }
}
