<?php 

$host = "localhost";
$banco = "felipef315";
$usuario = "felipef315";
$senha = "315!@#";

// PDO = PHP Data Objects - É uma ferramenta do PHP para conversar com banco de dados.

try{
    $pdo = new PDO ("mysql: host = $host; dbname=$banco; charset=utf8mb4", $usuario, $senha);

    // -> serve para puxar algo que não pertence aquele a objeto
    //PDO::ATR_ERRMODE - serve para configurar o modo de erros do PDO
    //PDO::ERRMODE_EXCEPTION - serve para quando um erro ocorrer, ele seja transformado em execução
    
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // echo "Conectado com Sucesso!";

}

catch (PDOException $erro){

    echo "Erro ao conectar: ".$erro->getMessage();
    
}
?>