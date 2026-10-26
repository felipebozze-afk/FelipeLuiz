<?php

class PortfolioController
{
    public function index()
    {
        require __DIR__ . '/../../../resources/views/projetos/portfolio.php';
    }

    public function loginbasico()
    {
        require __DIR__ . '/../../../resources/views/projetos/loginbasico.php';
    }

    public function idade()
    {
        require __DIR__ . '/../../../resources/views/projetos/idade.php';
    }

    public function notas()
    {
        require __DIR__ . '/../../../resources/views/projetos/notas.php';
    }

    public function notasGet()
    {
        require __DIR__ . '/../../../resources/views/projetos/notas-get.php';
    }

    public function jogos()
    {
        require __DIR__ . '/../../../resources/views/projetos/jogos.php';
    }
}
?>
