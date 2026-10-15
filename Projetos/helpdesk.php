<?php
require_once __DIR__ . "/helpdesk-func.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"] ?? "";

    if ($acao === "cadastrar") {
        $sucesso = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );
        $mensagem = $sucesso
            ? "Chamado cadastrado com sucesso!"
            : "Não foi possível cadastrar. Confira os campos e tente novamente.";
    } elseif ($acao === "atualizar") {
        $posicao = filter_var($_POST["posicao"] ?? "", FILTER_VALIDATE_INT);
        $status = $_POST["status"] ?? "";
        $sucesso = $posicao !== false && atualizarChamado($posicao, $status);
        $mensagem = $sucesso ? "Status atualizado!" : "Não foi possível atualizar o chamado.";
    } elseif ($acao === "excluir") {
        $posicao = filter_var($_POST["posicao"] ?? "", FILTER_VALIDATE_INT);
        $sucesso = $posicao !== false && excluirChamado($posicao);
        $mensagem = $sucesso ? "Chamado excluído!" : "Chamado não encontrado.";
    }
}

$chamados = lerChamados();
$quantidades = contarChamados();
function escapar($valor): string
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk | Chamados</title>
    <style>
        :root { color-scheme: light; --azul: #174ea6; --fundo: #f3f6fb; --texto: #1f2937; --borda: #d9e1ec; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--fundo); color: var(--texto); font: 16px/1.5 Arial, sans-serif; }
        header { background: #102f61; color: white; padding: 24px max(20px, calc((100% - 1100px)/2)); }
        header h1 { margin: 0; font-size: 1.7rem; }
        main { max-width: 1100px; margin: 28px auto; padding: 0 20px; }
        .resumo { display: grid; grid-template-columns: repeat(auto-fit, minmax(145px, 1fr)); gap: 14px; margin-bottom: 22px; }
        .cartao, section { background: white; border: 1px solid var(--borda); border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px #142b4d0b; }
        .cartao span { display: block; color: #5b6677; }
        .cartao strong { font-size: 1.6rem; }
        section { margin-bottom: 20px; }
        h2 { margin: 0 0 16px; font-size: 1.2rem; }
        .grade { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
        label { display: grid; gap: 6px; font-weight: 600; }
        input, select, textarea, button { font: inherit; }
        input, select, textarea { width: 100%; border: 1px solid var(--borda); border-radius: 6px; padding: 10px; background: white; }
        textarea { min-height: 100px; resize: vertical; }
        .largura-total { grid-column: 1 / -1; }
        button { border: 0; border-radius: 6px; padding: 10px 14px; background: var(--azul); color: white; cursor: pointer; font-weight: 600; }
        button:hover { background: #103d84; }
        .excluir { background: #b42318; }
        .excluir:hover { background: #8f1c13; }
        .mensagem { margin-bottom: 18px; padding: 12px 15px; border-radius: 6px; background: #e6f4ea; }
        .chamado { border-top: 1px solid var(--borda); padding: 16px 0; }
        .chamado:first-of-type { border-top: 0; padding-top: 0; }
        .chamado h3 { margin: 0 0 8px; }
        .chamado p { margin: 5px 0; white-space: pre-wrap; }
        .acoes { display: flex; align-items: end; gap: 10px; margin-top: 12px; }
        .acoes label { flex: 1; }
        .vazio { color: #5b6677; }
        @media (max-width: 600px) { .grade { grid-template-columns: 1fr; } .largura-total { grid-column: auto; } .acoes { align-items: stretch; flex-direction: column; } }
    </style>
</head>
<body>
<header><h1>Central de Helpdesk</h1></header>
<main>
    <?php if ($mensagem !== ""): ?>
        <div class="mensagem" role="status"><?= escapar($mensagem) ?></div>
    <?php endif; ?>

    <div class="resumo" aria-label="Resumo dos chamados">
        <div class="cartao"><span>Total</span><strong><?= (int) $quantidades["total"] ?></strong></div>
        <div class="cartao"><span>Abertos</span><strong><?= (int) $quantidades["abertos"] ?></strong></div>
        <div class="cartao"><span>Em andamento</span><strong><?= (int) $quantidades["andamento"] ?></strong></div>
        <div class="cartao"><span>Resolvidos</span><strong><?= (int) $quantidades["resolvidos"] ?></strong></div>
    </div>

    <section>
        <h2>Abrir chamado</h2>
        <form method="post">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="grade">
                <label>Nome
                    <input type="text" name="nome" required maxlength="120">
                </label>
                <label>Setor
                    <select name="setor" required>
                        <option value="">Selecione</option>
                        <option>Produção</option><option>Administrativo</option><option>Logística</option><option>Financeiro</option><option>TI</option>
                    </select>
                </label>
                <label>Equipamento
                    <select name="equipamento" required>
                        <option value="">Selecione</option>
                        <option>Computador</option><option>Impressora</option><option>Rede</option><option>Sistema</option><option>Outro</option>
                    </select>
                </label>
                <label>Prioridade
                    <select name="prioridade" required>
                        <option value="">Selecione</option>
                        <option>Baixa</option><option>Média</option><option>Alta</option>
                    </select>
                </label>
                <label class="largura-total">Descrição do problema
                    <textarea name="descricao" required maxlength="2000"></textarea>
                </label>
                <div class="largura-total"><button type="submit">Cadastrar chamado</button></div>
            </div>
        </form>
    </section>

    <section>
        <h2>Chamados cadastrados</h2>
        <?php if ($chamados === []): ?>
            <p class="vazio">Ainda não há chamados cadastrados.</p>
        <?php else: ?>
            <?php foreach ($chamados as $posicao => $chamado): ?>
                <article class="chamado">
                    <h3>Chamado #<?= (int) $posicao + 1 ?> — <?= escapar($chamado["nome"] ?? "") ?></h3>
                    <p><strong>Setor:</strong> <?= escapar($chamado["setor"] ?? "") ?>
                       &nbsp; <strong>Equipamento:</strong> <?= escapar($chamado["equipamento"] ?? "") ?></p>
                    <p><strong>Prioridade:</strong> <?= escapar($chamado["prioridade"] ?? "") ?>
                       &nbsp; <strong>Status:</strong> <?= escapar($chamado["status"] ?? "") ?></p>
                    <p><?= escapar($chamado["descricao"] ?? "") ?></p>
                    <div class="acoes">
                        <form method="post" class="acoes" style="flex:1; margin:0">
                            <input type="hidden" name="acao" value="atualizar">
                            <input type="hidden" name="posicao" value="<?= (int) $posicao ?>">
                            <label>Status
                                <select name="status" required>
                                    <?php foreach (["Aberto", "Em andamento", "Resolvido"] as $status): ?>
                                        <option value="<?= escapar($status) ?>" <?= ($chamado["status"] ?? "") === $status ? "selected" : "" ?>><?= escapar($status) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                            <button type="submit">Atualizar status</button>
                        </form>
                        <form method="post" onsubmit="return confirm('Deseja excluir este chamado?')">
                            <input type="hidden" name="acao" value="excluir">
                            <input type="hidden" name="posicao" value="<?= (int) $posicao ?>">
                            <button class="excluir" type="submit">Excluir</button>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</main>
</body>
</html>
