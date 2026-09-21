<?php
$nome = "";
$idade = "";
$media = 0;
$situacao = "";
$enviado = false;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["nome"])) {
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $nota1 = $_GET["nota1"];
    $nota2 = $_GET["nota2"];
    $nota3 = $_GET["nota3"];
    $nota4 = $_GET["nota4"];
    $nota5 = $_GET["nota5"];

    $media = ($nota1 * 2 + $nota2 * 3 + $nota3 + $nota4 + $nota5 * 3) / 10;

    if ($media >= 7) {
        $situacao = "APROVADO";
    } elseif ($media >= 5) {
        $situacao = "RECUPERAÇÃO";
    } else {
        $situacao = "REPROVADO";
    }

    $enviado = true;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Situação do Aluno - GET</title>
</head>
<body>
    <div class="container">
        <h1>Situação do Aluno - GET</h1>

        <form method="GET">
            <input type="text" name="nome" required placeholder="Digite o nome do aluno">
            <input type="number" name="idade" min="1" required placeholder="Digite a idade">
            <input type="number" name="nota1" min="0" max="10" step="0.1" required placeholder="Nota 1 (peso 2)">
            <input type="number" name="nota2" min="0" max="10" step="0.1" required placeholder="Nota 2 (peso 3)">
            <input type="number" name="nota3" min="0" max="10" step="0.1" required placeholder="Nota 3 (peso 1)">
            <input type="number" name="nota4" min="0" max="10" step="0.1" required placeholder="Nota 4 (peso 1)">
            <input type="number" name="nota5" min="0" max="10" step="0.1" required placeholder="Nota 5 (peso 3)">
            <button type="submit">Calcular</button>
        </form>

        <?php if ($enviado) { ?>
            <p>Nome: <?php echo htmlspecialchars($nome); ?></p>
            <p>Idade: <?php echo htmlspecialchars($idade); ?> anos</p>
            <p>Média: <?php echo number_format($media, 2, ",", "."); ?></p>
            <p>Situação: <?php echo $situacao; ?></p>
        <?php } ?>
    </div>
</body>
</html>
