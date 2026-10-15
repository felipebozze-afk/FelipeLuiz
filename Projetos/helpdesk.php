<?php
require_once __DIR__ . '/helpdesk-func.php';

function escapar($texto): string
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

function campoPost(string $nome): string
{
    $valor = $_POST[$nome] ?? '';
    return is_string($valor) ? $valor : '';
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cadastrar'])) {
        $sucesso = cadastrarChamados(
            campoPost('nome'),
            campoPost('setor'),
            campoPost('equipamento'),
            campoPost('descricao'),
            campoPost('prioridade')
        );
        $mensagem = $sucesso ? 'Chamado cadastrado com sucesso!' : 'Confira os dados do chamado.';
    }

    if (isset($_POST['atualizar'])) {
        $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);
        $mensagem = $numero !== false && atualizarChamado($numero, campoPost('status'))
            ? 'Status atualizado!'
            : 'Não foi possível atualizar o chamado.';
    }

    if (isset($_POST['excluir'])) {
        $numero = filter_var($_POST['numero'] ?? '', FILTER_VALIDATE_INT);
        $mensagem = $numero !== false && excluirChamado($numero)
            ? 'Chamado excluído!'
            : 'Chamado não encontrado.';
    }
}

$chamados = lerChamados();
$quantidades = contarChamados();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Help Desk</title>
</head>
<body>
    <h1>Sistema de Help Desk</h1>
    <p><?= escapar($mensagem) ?></p>

    <h2>Abrir chamado</h2>
    <form method="POST">
        <label>Nome do funcionário:</label><br>
        <input type="text" name="nome"><br><br>

        <label>Setor:</label><br>
        <select name="setor">
            <option>Produção</option>
            <option>Administrativo</option>
            <option>Logística</option>
            <option>Financeiro</option>
            <option>TI</option>
        </select><br><br>

        <label>Equipamento:</label><br>
        <select name="equipamento">
            <option>Computador</option>
            <option>Impressora</option>
            <option>Rede</option>
            <option>Sistema</option>
            <option>Outro</option>
        </select><br><br>

        <label>Descrição do problema:</label><br>
        <textarea name="descricao"></textarea><br><br>

        <label>Prioridade:</label><br>
        <select name="prioridade">
            <option>Baixa</option>
            <option>Média</option>
            <option>Alta</option>
        </select><br><br>

        <button type="submit" name="cadastrar">Cadastrar chamado</button>
    </form>

    <h2>Relatório</h2>
    <p>Total: <?= $quantidades['total'] ?></p>
    <p>Abertos: <?= $quantidades['abertos'] ?></p>
    <p>Em andamento: <?= $quantidades['andamento'] ?></p>
    <p>Resolvidos: <?= $quantidades['resolvidos'] ?></p>

    <h2>Chamados cadastrados</h2>
    <?php foreach ($chamados as $numero => $chamado): ?>
        <h3>Chamado número <?= $numero + 1 ?></h3>
        <p>Nome: <?= escapar($chamado['nome'] ?? '') ?></p>
        <p>Setor: <?= escapar($chamado['setor'] ?? '') ?></p>
        <p>Equipamento: <?= escapar($chamado['equipamento'] ?? '') ?></p>
        <p>Descrição: <?= escapar($chamado['descricao'] ?? '') ?></p>
        <p>Prioridade: <?= escapar($chamado['prioridade'] ?? '') ?></p>
        <p>Status: <?= escapar($chamado['status'] ?? '') ?></p>

        <form method="POST">
            <input type="hidden" name="numero" value="<?= $numero ?>">
            <select name="status">
                <option>Aberto</option>
                <option>Em andamento</option>
                <option>Resolvido</option>
            </select>
            <button type="submit" name="atualizar">Atualizar status</button>
        </form>

        <form method="POST">
            <input type="hidden" name="numero" value="<?= $numero ?>">
            <button type="submit" name="excluir">Excluir chamado</button>
        </form>
        <hr>
    <?php endforeach; ?>
</body>
</html>

