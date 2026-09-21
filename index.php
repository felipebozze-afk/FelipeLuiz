 <?php
        $nome = "";
        $idade = "";
        $resultado = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $idade = $_POST["idade"];

            if ($idade >=18)
            {
                $resultado = "você é maior de idade";
            }

            else if($idade <= 0)
            {
                $resultado = "invalido";
            }

            else {
                $resultado ="você é menor de idade";
            }
        }

    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

    <title>AULA LUCAS LUZ</title>
</head>

<body>
         <div class='container'>

         <h1>Informações do Aluno</h1>

         <form method="POST">

             <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">

             <input type="number" id="idade" name="idade" required placeholder="Digite sua idade">

             <button type="submit">Verificar</button>

         </form>

         <?php
            if ($resultado != "") {
               echo "<h2>Olá, $nome! $resultado</h2>";
            }
         ?>

         </div>

         

</body>

</html>
