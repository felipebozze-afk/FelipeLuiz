<?php

class Chamado{// READ - Ler todos os chamados
public function lerChamados(): array
{
    $arquivo = __DIR__ . '/dados.json';

// Cria o arquivo JSON se ele ainda não existir
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, '[]');
    }

    $conteudo = file_get_contents($arquivo);
    $chamados = json_decode($conteudo, true);

    return is_array($chamados) ? $chamados : [];
}

// SAVE - Salvar os chamados no JSON
public function salvarChamados(array $chamados): bool
{
    $arquivo = __DIR__ . '/dados.json';
    $json = json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    return $json !== false && file_put_contents($arquivo, $json) !== false;
}

// CREATE - Cadastrar chamado
public function cadastrarChamados(string $nome, string $setor, string $equipamento, string $descricao, string $prioridade): bool
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

    $chamados = $this->lerChamados();
    $chamados[] = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    return $this->salvarChamados($chamados);
}

// UPDATE - Atualizar status do chamado
public function atualizarChamado(int $numero, string $novoStatus): bool
{
    $chamados = $this->lerChamados();
    $statusValidos = ['Aberto', 'Em andamento', 'Resolvido'];

    if (!isset($chamados[$numero]) || !in_array($novoStatus, $statusValidos, true)) {
        return false;
    }

    $chamados[$numero]['status'] = $novoStatus;
    return $this->salvarChamados($chamados);
}

// DELETE - Excluir chamado
public function excluirChamado(int $numero): bool
{
    $chamados = $this->lerChamados();

    if (!isset($chamados[$numero])) {
        return false;
    }

    array_splice($chamados, $numero, 1);
    return $this->salvarChamados($chamados);
}

// Contar chamados por status
public function contarChamados(): array
{
    $quantidades = ['total' => 0, 'abertos' => 0, 'andamento' => 0, 'resolvidos' => 0];

    foreach ($this->lerChamados() as $chamado) {
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




  
}





?>
