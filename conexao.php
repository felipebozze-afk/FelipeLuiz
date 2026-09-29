<?php

$host = "localhost";
$banco = "felipeb315";
$usuario = "felipeb315";
$senha = "315!@#";

// pdo =
// PDO =  php data objects -  é uma ferramenta do php para conversar com banco de dados.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4",$usuario,$senha);
   
   //-> serve para puxar algo que pertence aquele objeto
   // PDO::ATTR_ERRMODE - É para configurar o modo de de erros do PDO
   //PDO:: PDO::ERRMODE_EXCEPTION - é para quando acontecer alhum erro transformar em execução
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION


    );
    echo "conectado com sucesso";


} catch (PDOException $erro) {
    echo "Erro ao conectar:".$erro ->getMessage();


}
?>