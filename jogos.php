<?php
require "conexao.php";

$mensagem = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $genero = trim($_POST["genero"] ?? "");
    $nota = $_POST["nota"] ?? "";
    $ano = $_POST["ano_lancamento"] ?? "";

    if ($nome == "" || $genero == "" || !is_numeric($nota) || !is_numeric($ano)) {
        $erro = "Preencha todos os campos corretamente.";
    } else {
        $sql = "INSERT INTO jogos (nome, genero, nota, ano_lancamento) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $genero, $nota, $ano]);
        $mensagem = "Jogo cadastrado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?v=2">
    <title>Cadastro de jogos</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro de jogos</h1>

        <form method="POST">
            <label for="nome">Nome do jogo</label>
            <input type="text" id="nome" name="nome" maxlength="100" required>

            <label for="genero">Gênero</label>
            <input type="text" id="genero" name="genero" maxlength="50" required>

            <label for="nota">Nota</label>
            <input type="number" id="nota" name="nota" step="1" required>

            <label for="ano_lancamento">Ano de lançamento</label>
            <input type="number" id="ano_lancamento" name="ano_lancamento" min="1950" max="2100" required>

            <button type="submit">Cadastrar</button>
        </form>

        <?php if ($mensagem != "") { ?>
            <p><?php echo $mensagem; ?></p>
        <?php } ?>

        <?php if ($erro != "") { ?>
            <p><?php echo $erro; ?></p>
        <?php } ?>
    </div>
</body>
</html>
