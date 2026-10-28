<?php

require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
require_once __DIR__ . '/../app/Http/Controllers/ProjetoController.php';

$projeto = new ProjetoController();

return [
    'GET' => [
        'portfolio' => [new PortfolioController(), 'index'],
        'idade' => [$projeto, 'idade'],
        'loginbasico' => [$projeto, 'loginbasico'],
        'json' => [$projeto, 'json'],
        'notas' => [$projeto, 'notas'],
        'notas-get' => [$projeto, 'notas-get'],
        'jogos' => [$projeto, 'jogos'],
        'helpdesk' => [$projeto, 'helpdesk'],
        'poo' => [$projeto, 'poo'],
        'funcoes' => [$projeto, 'funcoes'],
        'teste-post' => [$projeto, 'teste-post'],
        'poo2' => [$projeto, 'poo2']
    ],
    'POST' => [
        'idade' => [$projeto, 'idade'],
        'loginbasico' => [$projeto, 'loginbasico'],
        'json' => [$projeto, 'json'],
        'notas' => [$projeto, 'notas'],
        'notas-get' => [$projeto, 'notas-get'],
        'jogos' => [$projeto, 'jogos'],
        'helpdesk' => [$projeto, 'helpdesk'],
        'teste-post' => [$projeto, 'teste-post'],
        'poo2' => [$projeto, 'poo2']
    ]
];
?>