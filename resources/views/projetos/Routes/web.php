<?php

    require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
    require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';

    //Listando em arrays

    return [
        'GET' =>[
            'portfolio' =>[new PortfolioController (),'index'],
            'helpdesk' => [new HelpdeskController(), 'index'],
            'jogos' => [],

        ],
        'POST' => [
            'helpdesk' => [new HelpdeskController(),  ],
        ]
      


    ];











?>