<?php

class ProjetoController
{
    public function __call($nome, $argumentos)
    {
        require __DIR__ . '/../../../resources/views/projetos/' . $nome . '.php';
    }
}
