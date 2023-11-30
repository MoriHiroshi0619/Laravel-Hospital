<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\LoginController;


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

Route::get('/paciente', [PacienteController::class, 'index'])->middleware('admin');
Route::get('/paciente/criar', [PacienteController::class, 'create'])->middleware('admin');
Route::post('/paciente', [PacienteController::class, 'store'])->middleware('admin');
Route::get('/paciente/{id}',[PacienteController::class, 'show'])->middleware('admin');
Route::delete('/paciente/{id}', [PacienteController::class, 'delete'])->middleware('admin');
Route::get('paciente/editar/{id}', [PacienteController::class, 'edit'])->middleware('admin');
Route::put('paciente/editar/{id}', [PacienteController::class, 'put'])->middleware('admin');









