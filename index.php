<?php

    // carregando arquivo de rotas
    $rotas = require __DIR__ . "/routes/web.php";

    // se a rota estiver vazia, vai direto pro portifolio
    $rota = $_GET['rota'] ?? 'portfolio';

    // definindo a variavel de verificação do metodo http requisitado
    $metodo = $_SERVER['REQUEST_METHOD'];

    // verifica se a rota existe , se n existe define erro 404
    if (!isset($rotas[$metodo][$rota])) {
        http_response_code(404);
        echo "Página não encontrada";
        exit;
    };

    //
    [$controller, $acao] = $rotas[$rota][$metodo];

    //
    $controller -> $acao();
?>
