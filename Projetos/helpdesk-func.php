<?php

// READ - Ler todos os chamados
function lerChamados(): array
{
    $pasta = __DIR__ . '/../dados';
    $arquivo = $pasta . '/chamados.json';

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    // Cria o arquivo JSON se ele ainda não existir
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, '[]');
    }

    $conteudo = file_get_contents($arquivo);
    $chamados = json_decode($conteudo, true);

    return is_array($chamados) ? $chamados : [];
}

// SAVE - Salvar os chamados no JSON
function salvarChamados(array $chamados): bool
{
    $arquivo = __DIR__ . '/../dados/chamados.json';
    $json = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    return $json !== false && file_put_contents($arquivo, $json) !== false;
}

// CREATE - Cadastrar chamado
function cadastrarChamados(string $nome, string $setor, string $equipamento, string $descricao, string $prioridade): bool
{
    $setores = ['Produção', 'Administrativo', 'Logística', 'Financeiro', 'TI'];
    $equipamentos = ['Computador', 'Impressora', 'Rede', 'Sistema', 'Outro'];
    $prioridades = ['Baixa', 'Média', 'Alta'];

    if (trim($nome) === '' || trim($descricao) === '') {
        return false;
    }

    if (!in_array($setor, $setores, true) || !in_array($equipamento, $equipamentos, true) || !in_array($prioridade, $prioridades, true)) {
        return false;
    }

    $chamados = lerChamados();
    $chamados[] = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    return salvarChamados($chamados);
}

// UPDATE - Atualizar status do chamado
function atualizarChamado(int $numero, string $novoStatus): bool
{
    $chamados = lerChamados();
    $statusValidos = ['Aberto', 'Em andamento', 'Resolvido'];

    if (!isset($chamados[$numero]) || !in_array($novoStatus, $statusValidos, true)) {
        return false;
    }

    $chamados[$numero]['status'] = $novoStatus;
    return salvarChamados($chamados);
}

// DELETE - Excluir chamado
function excluirChamado(int $numero): bool
{
    $chamados = lerChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    array_splice($chamados, $numero, 1);
    return salvarChamados($chamados);
}

// Contar chamados por status
function contarChamados(): array
{
    $quantidades = ['total' => 0, 'abertos' => 0, 'andamento' => 0, 'resolvidos' => 0];

    foreach (lerChamados() as $chamado) {
        $quantidades['total']++;

        if (($chamado['status'] ?? '') === 'Aberto') {
            $quantidades['abertos']++;
        } elseif (($chamado['status'] ?? '') === 'Em andamento') {
            $quantidades['andamento']++;
        } elseif (($chamado['status'] ?? '') === 'Resolvido') {
            $quantidades['resolvidos']++;
        }
    }

    return $quantidades;
}
