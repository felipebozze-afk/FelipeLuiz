<?php

require_once dirname(__DIR__, 3) . '/app/Models/chamado.php';

function lerChamados(): array
{
    return (new Chamado())->lerChamados();
}

function salvarChamados(array $chamados): bool
{
    return (new Chamado())->salvarChamados($chamados);
}

function cadastrarChamados(string $nome, string $setor, string $equipamento, string $descricao, string $prioridade): bool
{
    return (new Chamado())->cadastrarChamados($nome, $setor, $equipamento, $descricao, $prioridade);
}

function atualizarChamado(int $numero, string $novoStatus): bool
{
    return (new Chamado())->atualizarChamado($numero, $novoStatus);
}

function excluirChamado(int $numero): bool
{
    return (new Chamado())->excluirChamado($numero);
}

function contarChamados(): array
{
    return (new Chamado())->contarChamados();
}
