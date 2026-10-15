<?php
require_once __DIR__ . "/helpdesk-func.php";

$mensagem = "";

// Identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // O operador ?? é chamado de operador de coalescência nula.
    // Ele significa:
    // Use o valor da esquerda se existir; caso contrário, use o valor da direita.
    // A ação informa qual operação será executada.
    $acao = $_POST["acao"] ?? "";

    // Alternativa ao operador ??:
    // if (isset($_POST["acao"])) {
    //     $acao = $_POST["acao"];
    // } else {
    //     $acao = "";
    // }

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
            : "Erro ao cadastrar. Verifique os dados.";
    } elseif ($acao === "atualizar") {
        $posicao = filter_var($_POST["posicao"] ?? "", FILTER_VALIDATE_INT);
        $sucesso = $posicao !== false
            && atualizarChamado($posicao, $_POST["status"] ?? "");
        $mensagem = $sucesso
            ? "Status atualizado!"
            : "Erro ao atualizar o status.";
    } elseif ($acao === "excluir") {
        $posicao = filter_var($_POST["posicao"] ?? "", FILTER_VALIDATE_INT);
        $sucesso = $posicao !== false && excluirChamado($posicao);
        $mensagem = $sucesso
            ? "Chamado excluído!"
            : "Erro ao excluir o chamado.";
    }
}

// READ - Ler chamados e contagens
$chamados = lerChamados();
$quantidades = contarChamados();

header("Content-Type: text/plain; charset=UTF-8");
echo $mensagem . PHP_EOL;
echo "Total de chamados: " . $quantidades["total"] . PHP_EOL;
echo "Abertos: " . $quantidades["abertos"] . PHP_EOL;
echo "Em andamento: " . $quantidades["andamento"] . PHP_EOL;
echo "Resolvidos: " . $quantidades["resolvidos"] . PHP_EOL;

foreach ($chamados as $posicao => $chamado) {
    echo "Chamado " . ($posicao + 1) . ": ";
    echo ($chamado["nome"] ?? "") . " - ";
    echo ($chamado["descricao"] ?? "") . " - ";
    echo ($chamado["status"] ?? "") . PHP_EOL;
}


