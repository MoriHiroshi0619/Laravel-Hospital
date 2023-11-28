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


Route::get('/admin', [AdminController::class, 'index']);

Route::get('/funcionario', [FuncionarioController::class, 'index']);
Route::get('/funcionario/criar', [FuncionarioController::class, 'create']);
Route::post('/funcionario', [FuncionarioController::class, 'store']);
