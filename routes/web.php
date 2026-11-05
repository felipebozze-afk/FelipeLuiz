<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HelpdeskController;

Route::get('/', function () {
    return view('portifolio');
});


Route::get('/ HelpdeskController',[HelpdeskController::class,'index'] )->name('helpdesk');

Route::post('/ HelpdeskController',[HelpdeskController::class,'salvar'] )->name('helpdesk.salvar');
