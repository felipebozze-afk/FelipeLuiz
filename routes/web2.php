<?php

require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';

return [
    'GET' => [
        'portifolio' => [new PortfolioController(), 'index'],
        'helpdesk' => [new HelpdeskController(), 'index'],
        'jogos' => [new PortfolioController(), 'jogos'],
        'login' => [new PortfolioController(), 'login'],
        'notas' => [new PortfolioController(), 'notas'],
        'idade' => [new PortfolioController(), 'idade'],
    ],
    'POST' => [
        'helpdesk' => [new HelpdeskController(), 'salvar'],
    ],
];
