<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FuncionarioController;
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
