<?php

require_once __DIR__ . '/../../../../app/Http/Controllers/HelpdeskController.php';
require_once __DIR__ . '/../../../../app/Http/Controllers/PortifolioController.php';

$portfolioController = new PortfolioController();
$helpdeskController = new HelpdeskController();

return [
    'portifolio' => [
        'GET' => [$portfolioController, 'index'],
        'POST' => [$portfolioController, 'index'],
    ],
    'portfolio' => [
        'GET' => [$portfolioController, 'index'],
        'POST' => [$portfolioController, 'index'],
    ],
    'helpdesk' => [
        'GET' => [$helpdeskController, 'index'],
        'POST' => [$helpdeskController, 'index'],
    ],
    'jogos' => [
        'GET' => [$portfolioController, 'jogos'],
        'POST' => [$portfolioController, 'jogos'],
    ],
    'loginbasico' => [
        'GET' => [$portfolioController, 'loginbasico'],
        'POST' => [$portfolioController, 'loginbasico'],
    ],
    'notas' => [
        'GET' => [$portfolioController, 'notas'],
        'POST' => [$portfolioController, 'notas'],
    ],
    'notas-get' => [
        'GET' => [$portfolioController, 'notasGet'],
    ],
    'idade' => [
        'GET' => [$portfolioController, 'idade'],
        'POST' => [$portfolioController, 'idade'],
    ],
];
