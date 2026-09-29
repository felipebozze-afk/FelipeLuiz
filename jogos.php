<?php
require "conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    nota INT NOT NULL,
    ano_lancamento INT NOT NULL
)";
$pdo->exec($sql);


$colunas = $pdo->query("SHOW COLUMNS FROM jogos LIKE 'ano_lancamento'");
if ($colunas->rowCount() === 0) {
    $pdo->exec("ALTER TABLE jogos ADD ano_lancamento INT NOT NULL DEFAULT 0");
}

$mensagem = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $genero = trim($_POST["genero"] ?? "");
    $nota = $_POST["nota"] ?? "";
    $ano_lancamento = $_POST["ano_lancamento"] ?? "";

    if ($nome === "" || $genero === "" || !filter_var($nota, FILTER_VALIDATE_INT) ||
        !filter_var($ano_lancamento, FILTER_VALIDATE_INT)) {
        $erro = "Preencha todos os campos com valores válidos.";
    } else {
        $nomeSQL = $pdo->quote($nome);
        $generoSQL = $pdo->quote($genero);
        $sqlInsert = "INSERT INTO jogos (nome, genero, nota, ano_lancamento)
                      VALUES ($nomeSQL, $generoSQL, $nota, $ano_lancamento)";
        $pdo->exec($sqlInsert);
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

        <?php if ($mensagem !== "") { ?>
            <p><?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?></p>
        <?php } ?>
        <?php if ($erro !== "") { ?>
            <p><?php echo htmlspecialchars($erro, ENT_QUOTES, "UTF-8"); ?></p>
        <?php } ?>
    </div>
</body>
</html>
