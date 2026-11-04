<?php

         $nome = "";
         $idade = 0;

         $nota1 = 0;
         $nota2 = 0;
         $nota3 = 0;
         $nota4 = 0;
         $nota5 = 0;

         $peso1 = 1;
         $peso2 = 2;
         $peso3 = 3;
         $soma_peso = 0;

         $resultado1 = 0;
         $resultado2 = 0;
         $resultado3 = 0;
         $resultado4 = 0;
         $resultado5 = 0;
         $resultado_total = 0;

         $requisito_media = 7;
         $media_faltante = 0;
         $media = 0;
         $nota_final = 0;

         $frequencia = 0;
         $presença = 0; 
         $dias_ano = 365;


        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $nome = $_POST["nome"];
            $idade = $_POST["idade"];
            $nota1 = $_POST["nota1"];
            $nota2 = $_POST["nota2"];
            $nota3 = $_POST["nota3"];
            $nota4 = $_POST["nota4"];
            $nota5 = $_POST["nota5"];
            $frequencia = $_POST["Frequencia"];
        }


        $resultado1 = $nota1 * $peso2;
        $resultado2 = $nota2 * $peso3;
        $resultado3 =$nota3 * $peso1;
        $resultado4 = $nota4 * $peso1;
        $resultado5 = $nota5 * $peso3;

        $resultado_total = $resultado1 + $resultado2 + $resultado3 + $resultado4 + $resultado5;
        $soma_peso = $peso1 + $peso2 + $peso3 + $peso1 + $peso3;

        $media = $resultado_total / $soma_peso;
        $nota_final = $resultado_total / $soma_peso;

        $media_faltante = $nota_final - $requisito_media;

        $frequencia = ($dias_ano / 100) * $presença;
        
        if ($nota1 < 0 || $nota2 < 0 || $nota3 < 0 || $nota4 < 0 || $nota5 < 0) {
            echo "Nota Invalida";
        }

        elseif($nota1 > 10 || $nota2 > 10 || $nota3 > 10 || $nota4 > 10 || $nota5 > 10) {
            echo "Nota Invalida";
        }

        if($idade <= 0){
            $idade = "Idade Invalida";
        }

        elseif($nota_final === $media_faltante){
            $nota_final = "falta". $media_faltante ."pra ser aprovado";
        }

        if($media <= 0){
            $media = "Erro ao calcular";
        }

        elseif($nota_final >= 7){
            $media = "aprovado";
        }

        elseif($nota_final == 10){
            $media = "Aprovado com Excelencia";
        }

        elseif($nota_final >= 5 and $nota_final < 7){
            $media = "RECUPERAÇÃO";
        }

        else{
            $media = "Reprovado";
        }


        if($frequencia >= 273.75 or $frequencia >=91){
            $frequencia = "Aprovado por Frequência";
        }
        
        else{
            $frequencia = "Reprovado por Falta";
        }
?>

    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/notas.css">
            <title>Document</title>
        </head>
        <body>
            <div class="container" >
            <form method="POST">
                <input type="text" id="nome" name="nome" placeholder="NOME" required>
                <p></p>
                <input type="number" id="idade" name="idade" placeholder="IDADE" required>
                <p></p>
                <input type="number" id="presença" name="presença" placeholder="Digite a Frequência do aluno" required>
                <p></p>
                <input type="number" id="nota1" name="nota1" placeholder="Dige a 1º Nota" required>
                <p></p>
                <input type="number" id="nota2" name="nota2" placeholder="Dige a 2º Nota" required>
                <p></p>
                <input type="number" id="nota3" name="nota3" placeholder="Dige a 3º Nota" required>
                <p></p>
                <input type="number" id="nota4" name="nota4" placeholder="Dige a 4º Nota" required>
                <p></p>
                <input type="number" id="nota5" name="nota5" placeholder="Dige a 5º Nota" required>
                <p></p>
                <button type="submit">Enviar Formulario</button>
            </form>

            <?php if($media != ""){ ?>
            
                <p>Bem Vindo <?= $nome ?></p>
                <p>Idade <?= $idade ?></p>
                <p>Sua nota é <?= $nota_final ?></p>
                <p>Está <?= $media ?> por nota</p>
                <p>Falta <?= $media_faltante ?> para que seja aprovado</p> 
                <p>Está <?= $frequencia ?></p>
            
            <?php } ?> 
            </div>
        </html>

        </body>
        </html>