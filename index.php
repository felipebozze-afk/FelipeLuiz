<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $nome = "felipe";
     $idade = 37;
?>

<h1> nome: <?=  $nome ?>   </h1>
<p>idade: <?= $idade ?> </p>

<?php if ($idade >= 18) { ?>
    <p>Maior de idade</p>
<?php } else { ?>
    <p>Menor de idade</p>
<?php } ?>

</body>
</html>
