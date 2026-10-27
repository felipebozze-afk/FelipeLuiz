<?php 

$user = "administrador";
$senha = 12345;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST["user"];
    $senha = $_POST["senha"];
}


if($user != "administrador"){
    $user = "Usuario incorreto, tente novamente";
}
else{
    $user = "Usuario correto";
}

if($senha != 12345){
    $senha = "Senha incorreta, tente novamente";
}
else{
    $senha = "Senha correta";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container" >
        <form method="POST">
            <input type="text" id="user" name="user" required>
            <p></p>
            <input type="number" id="senha" name="senha" required>
            <p></p>
            <button type="submit">Entrar</button>
        </form>

        <?php ?>

        <h2>
            <?= $user ?> 
            <p></p>
            <?=  $senha ?>
        </h2>
        
        <?php ?> 

    </div>
</body>
</html>