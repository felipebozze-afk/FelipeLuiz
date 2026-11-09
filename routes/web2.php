<?php 

    require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';    

    return[
        'GET' =>[
            'portifolio' => [new PortifolioController(), 'index'],
            'helpdesk' => [new HelpdeskController(), 'index'],
            'jogos' => [new PortfolioController(), 'index'],
            'login' => [new PortfolioController(), 'index'],
            'notas' => [new PortfolioController(), 'index'],
            'idade' => [new PortfolioController(), 'index']
        ],
            'POST' => [
                'helpdesk' => [new HelpdeskController, ''],
        ]
            ];
?>