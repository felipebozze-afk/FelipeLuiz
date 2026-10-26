<?php

    require_once __DIR__ . '/../../../../app/Http/Controllers/HelpdeskController.php';
    require_once __DIR__ . '/../../../../app/Http/Controllers/PortifolioController.php';

    //Listando em arrays

    return [
        'GET' =>[
            'portfolio' => [new PortfolioController(), 'index'],
            'helpdesk' => [new HelpdeskController(), 'index'],
            'loginbasico' => [new PortfolioController(), 'loginbasico'],
            'idade' => [new PortfolioController(), 'idade'],
            'notas' => [new PortfolioController(), 'notas'],
            'notas-get' => [new PortfolioController(), 'notasGet'],
            'jogos' => [new PortfolioController(), 'jogos'],

        ],
        'POST' => [
            'helpdesk' => [new HelpdeskController(), 'index'],
            'portfolio' => [new PortfolioController(), 'index'],
            
        ]
      


    ];











?>