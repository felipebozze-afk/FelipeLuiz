<?php 

    require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';    
    require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php'; 

    return[
        'GET' =>[
            'portfolio' => [new PortfolioController(), 'index'],
            'helpdesk' => [new HelpdeskController(), 'index'],
            'jogos' => [],
            'login' => [],
            'notas' => [],
            'idade' => []
        ],
            'POST' => [
                'helpdesk' => [new HelpdeskController, ''],
        ]
            ];
?>