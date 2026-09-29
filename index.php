<?php
     require "conexao.php";
     echo "<br> Meu sistema esta conectado!";

     $sql = " CREAT TABLE IF NOT EXISTS teste (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nome VARCHAR(100),
     idade INT
    )";


    $pdo -> exec($sql);
    echo "<br>tabela criada com sucesso!";

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?v=2">
    <title>Atividades PHP</title>
</head>
<body>
    <div class="container">
        <h1>Atividades PHP</h1>
        <p><a href="idade.php">Verificador de idade</a></p>
        <p><a href="notas.php">Situação do aluno (POST)</a></p>
        <p><a href="notas-get.php">Situação do aluno (GET)</a></p>
    </div>
</body>
</html>
