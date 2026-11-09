<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;

Route::get('/', function () {
    return view('portifolio');
});

Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk');

Route::post('/helpdesk', [HelpdeskController::class, 'salvar'])->name('helpdesk.salvar');

Route::get('/idade', [HelpdeskController::class, 'index'])->name('idade');

Route::get('/jogos', [HelpdeskController::class, 'index'])->name('jogos');

Route::get('/notas', [HelpdeskController::class, 'index'])->name('notas');

Route::get('/login-basico', [HelpdeskController::class, 'index'])->name('login-basico');

Route::get('/poo2', [HelpdeskController::class, 'index'])->name('poo2');