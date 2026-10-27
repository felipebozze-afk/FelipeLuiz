<?php

require __DIR__ . "/../conexao.php";

$senha = !416*134;
$id = $_POST[""];
$jogo = $_POST[""];
$genero = $_POST[""];
$nota = $_POST[""];

$sql = "CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    id INT, jogo VARCHAR(100), genero VARCHAR(50), nota INT)";

$pdo->exec($sql);

// echo "<br>Tabela criada com sucesso";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jogo = $_POST["jogo"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];

    $sql1 = "INSERT INTO games (jogo, genero, nota)
    VALUES ('$jogo','$genero',$nota)";

    $pdo->exec($sql1);

    echo "<br>Jogo cadastrado com sucesso";
}

//busca todos os registros no banco de dados
$buscar = "SELECT * FROM games";

//exec() = executa algo quando você não precisa receber registros de volta
//query() = executa uma consulta quando você quer receber dados de volta
$stmt = $pdo->query($buscar);

$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/jogos.css">
    <title>Jogos</title>
</head>

<body>
    <form method="POST">
        <input type="text" id="jogo" name="jogo" required>
        <p></p>
        <input type="text" id="genero" name="genero" required>
        <p></p>
        <input type="number" id="nota" name="nota" min="0" max="10" required>
        <p></p>
        <button type="submit">Cadastrar</button>
    

        <h2>Jogos cadastrados</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Genêro</th>
            <th>Nota</th>
        </tr>

        <!-- foreach() -> Para cada item  nessa lista, faça alguma coisa com X variavel  -->
        <?php foreach ($jogos as $jogo) { ?>
            <tr>
                <td><?= $jogo["id"] ?></td>
                <td><?= $jogo["jogo"] ?></td>
                <td><?= $jogo["genero"] ?></td>
                <td><?= $jogo["nota"] ?></td>
            </tr>
        <?php } ?>
        </table>
        </form>
    </div>
</body>

</html>