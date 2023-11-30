<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendouController;

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/funcionario', [FuncionarioController::class, 'index'])->middleware('admin');
Route::get('/funcionario/criar', [FuncionarioController::class, 'create'])->middleware('admin');
Route::post('/funcionario', [FuncionarioController::class, 'store'])->middleware('admin');
Route::get('/funcionario/{id}', [FuncionarioController::class, 'show'])->middleware('admin');
Route::delete('/funcionario/{id}', [FuncionarioController::class, 'delete'])->middleware('admin');
Route::get('/funcionario/editar/{id}', [FuncionarioController::class, 'edit'])->middleware('admin');
Route::put('/funcionario/editar/{id}', [FuncionarioController::class, 'put'])->middleware('admin');


Route::middleware(['recepcao'])->group(function () {
    Route::get('/paciente', [PacienteController::class, 'index']);
    Route::get('/paciente/criar', [PacienteController::class, 'create']);
    Route::post('/paciente', [PacienteController::class, 'store']);
    Route::get('/paciente/{id}', [PacienteController::class, 'show']);
    Route::delete('/paciente/{id}', [PacienteController::class, 'delete']);
    Route::get('paciente/editar/{id}', [PacienteController::class, 'edit']);
    Route::put('paciente/editar/{id}', [PacienteController::class, 'put']);

    Route::get('/buscar_pacientes_por_cpf',[PacienteController::class, 'buscaCpf']);
    
    Route::get('/agenda', [AgendouController::class, 'index']);
    Route::get('/agenda/criar', [AgendouController::class, 'create']);
    Route::post('/agenda', [AgendouController::class, 'store']);
});


/* Route::get('/paciente', [PacienteController::class, 'index'])->middleware(['recepcao', 'admin']);
Route::get('/paciente/criar', [PacienteController::class, 'create'])->middleware(['recepcao', 'admin']);
Route::post('/paciente', [PacienteController::class, 'store'])->middleware(['recepcao', 'admin']);
Route::get('/paciente/{id}',[PacienteController::class, 'show'])->middleware(['recepcao', 'admin']);
Route::delete('/paciente/{id}', [PacienteController::class, 'delete'])->middleware(['recepcao', 'admin']);
Route::get('paciente/editar/{id}', [PacienteController::class, 'edit'])->middleware(['recepcao', 'admin']);
Route::put('paciente/editar/{id}', [PacienteController::class, 'put'])->middleware(['recepcao', 'admin']); */









