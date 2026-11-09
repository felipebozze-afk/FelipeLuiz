<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;

Route::get('/', function () {
    return view('portifolio');
})->name('home');

Route::get('/index.php', function (Request $request) {
    $rota = $request->query('rota');

    $mapaRotas = [
        'loginbasico' => base_path('resources/views/projetos/loginbasico.php'),
        'json' => base_path('resources/views/projetos/json.php'),
        'notas' => base_path('resources/views/projetos/notas.php'),
        'poo2' => base_path('resources/views/projetos/poo2.php'),
        'idade' => base_path('resources/views/projetos/idade.php'),
        'jogos' => base_path('resources/views/projetos/jogos.php'),
    ];

    if (!isset($mapaRotas[$rota]) || !file_exists($mapaRotas[$rota])) {
        abort(404, 'Projeto não encontrado.');
    }

    $_SERVER['REQUEST_METHOD'] ??= 'GET';
    $_SERVER['PHP_SELF'] ??= '/index.php';

    ob_start();
    require $mapaRotas[$rota];
    $conteudo = ob_get_clean();

    return response($conteudo);
})->name('projeto.antigo');

Route::get('/helpdesk', [HelpdeskController::class, 'index'])->name('helpdesk');
Route::post('/helpdesk', [HelpdeskController::class, 'salvar'])->name('helpdesk.salvar');
