<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/', [App\Http\Controllers\Principal::class, 'principal']);

// Rota da Interface: Mostra o formulário para o profissional informado na URL
Route::get('/agendar/{profissionalId}', [BookingController::class, 'index'])->name('agendamento.tela');

// Rota de Processamento: Recebe os dados do formulário
Route::get('/agendar', [BookingController::class, 'store'])->name('agendamento.salvar');


