<?php

require_once __DIR__ . '/../../../../app/Http/Controllers/HelpdeskController.php';
require_once __DIR__ . '/../../../../app/Http/Controllers/PortifolioController.php';

$portfolioController = new PortifolioController();
$helpdeskController = new HelpdeskController();

return [
    'portifolio' => [
        'GET' => [$portfolioController, 'index'],
    ],
    'portfolio' => [
        'GET' => [$portfolioController, 'index'],
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
