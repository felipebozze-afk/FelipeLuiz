<?php
$nome = "";
$idade = "";
$media = 0;
$situacao = "";
$classe = "";
$erro = "";
$enviado = false;
$faltaram = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $idade = $_POST["idade"] ?? "";
    $nota1 = $_POST["nota1"] ?? "";
    $nota2 = $_POST["nota2"] ?? "";
    $nota3 = $_POST["nota3"] ?? "";
    $nota4 = $_POST["nota4"] ?? "";
    $nota5 = $_POST["nota5"] ?? "";
    $frequencia = $_POST["frequencia"] ?? "";

    if (!is_numeric($idade) || $idade <= 0) {
        $erro = "A idade deve ser maior que zero.";
    } elseif (
        !is_numeric($nota1) || $nota1 < 0 || $nota1 > 10 ||
        !is_numeric($nota2) || $nota2 < 0 || $nota2 > 10 ||
        !is_numeric($nota3) || $nota3 < 0 || $nota3 > 10 ||
        !is_numeric($nota4) || $nota4 < 0 || $nota4 > 10 ||
        !is_numeric($nota5) || $nota5 < 0 || $nota5 > 10
    ) {
        $erro = "As notas devem estar entre 0 e 10.";
    } elseif (!is_numeric($frequencia) || $frequencia < 0 || $frequencia > 100) {
        $erro = "A frequência deve estar entre 0% e 100%.";
    } else {
        $media = ($nota1 * 2 + $nota2 * 3 + $nota3 + $nota4 + $nota5 * 3) / 10;

        if ($media == 10 && $frequencia >= 75) {
            $situacao = "APROVADO COM EXCELÊNCIA";
            $classe = "aprovado";
        } elseif ($media >= 7 && $frequencia >= 75) {
            $situacao = "APROVADO";
            $classe = "aprovado";
        } elseif ($media >= 7 && $frequencia < 75) {
            $situacao = "REPROVADO POR FREQUÊNCIA";
            $classe = "reprovado";
        } elseif ($media >= 5) {
            $situacao = "RECUPERAÇÃO";
            $classe = "recuperacao";
            $faltaram = 7 - $media;
        } else {
            $situacao = "REPROVADO";
            $classe = "reprovado";
            $faltaram = 7 - $media;
        }

        $enviado = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?v=2">
    <title>Situação do Aluno</title>
</head>
<body>
    <div class="container">
        <h1>Situação do Aluno</h1>

        <form method="POST">
            <input type="text" name="nome" required placeholder="Digite o nome do aluno">
            <input type="number" name="idade" min="1" required placeholder="Digite a idade">
            <input type="number" name="nota1" min="0" max="10" step="0.1" required placeholder="Nota 1 (peso 2)">
            <input type="number" name="nota2" min="0" max="10" step="0.1" required placeholder="Nota 2 (peso 3)">
            <input type="number" name="nota3" min="0" max="10" step="0.1" required placeholder="Nota 3 (peso 1)">
            <input type="number" name="nota4" min="0" max="10" step="0.1" required placeholder="Nota 4 (peso 1)">
            <input type="number" name="nota5" min="0" max="10" step="0.1" required placeholder="Nota 5 (peso 3)">
            <input type="number" name="frequencia" min="0" max="100" step="0.1" required placeholder="Frequência (0 a 100%)">
            <button type="submit">Calcular</button>
        </form>

        <?php if ($erro != "") { ?>
            <div class="card reprovado"><p><?php echo $erro; ?></p></div>
        <?php } ?>

        <?php if ($enviado) { ?>
            <div class="card <?php echo $classe; ?>">
                <p>Nome: <?php echo htmlspecialchars($nome); ?></p>
                <p>Idade: <?php echo htmlspecialchars($idade); ?> anos</p>
                <p>Frequência: <?php echo $frequencia; ?>%</p>
                <p>Média: <?php echo number_format($media, 2, ",", "."); ?></p>
                <p><strong>Situação: <?php echo $situacao; ?></strong></p>
                <?php if ($faltaram > 0) { ?>
                    <p>Faltaram <?php echo number_format($faltaram, 1, ",", "."); ?> pontos para atingir a média 7.</p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>
