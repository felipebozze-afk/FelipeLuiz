<?php

    $caminho = __DIR__ . "/dados.json";

    // abre e le o arquivo json
    $json = file_get_contents($caminho);

    // Transforma Json em array php
    $alunos = json_decode($json, true);

    // Criando aluno
    $acao = $_POST["acao"];
    if($acao === "cadastrar"){

    $novoAluno = [
        "nome" => $_POST["nome"],
        "idade" => $_POST["idade"],
        "curso" => $_POST["curso"]
    ];
}

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if (isset($novoAluno)) {
        // add o aluno a array 
        $alunos[] = $novoAluno;
    }

    //  Transformar array em json
    $jsonAtualizado = json_encode($alunos,
        JSON_PRETTY_PRINT |
        JSON_UNESCAPED_UNICODE
    );

    // Salvar os dados no arquivo JSON

    file_put_contents($caminho, $jsonAtualizado);
        

        if($acao === "atualizar"){
            $nome = $_POST["nome"];
            $novaIdade = $_POST["idade"];
            $novoCurso = $_POST["curso"];

            foreach($alunos as $posicao => $aluno){
                if($aluno["nome"] == $nome){
                    $alunos[$posicao]["idade"] = $novaIdade;
                    $alunos[$posicao]["curso"] = $novoCurso;
                }

            }

            $jsonAtualizado = json_encode($alunos,
                JSON_PRETTY_PRINT |
                 JSON_UNESCAPED_UNICODE
            );

            file_put_contents($caminho, $jsonAtualizado);

            if($acao === "deletar"){
                $nome = $_POST["nome"];
                    foreach($alunos as $posicao => $aluno){
                        if($aluno["nome"] === $nome){
                            unset($alunos[$posicao]);
                        
                        }
                    }

                    $alunos = array_values($alunos);

                    }

            }

        }

    

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/json.css">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" required>
        <label>Idade: </label>
        <input type="number" name="idade" required>
        <label>Curso: </label>
        <input type="text" name="curso" required>
        <button type="submit" name="acao" value="cadastrar" > Cadastrar </button>
        </form>

        <form method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" required>
        <label>Idade: </label>
        <input type="number" name="idade" required>
        <label>Curso: </label>
        <input type="text" name="curso" required>
        <button type="submit" name="acao" value="atualizar" > Atualizar </button>
        </form>
        
        <form method="POST">
            <button type="submit" name="acao" value="deletar" > Deletrar </button>
        </form>

    <section id="resposta" class="resposta">
        <div class="card-resposta">
        <h2>ALUNOS CADASTRADOS</h2>
            <?php foreach($alunos as $aluno){?>
                <h3><?= $aluno["nome"] ?></h3>
                <p><?= $aluno["idade"] ?></p>
                <p><?= $aluno["curso"] ?></p>
            <?php }?>
        </div>
    </section>
</body>
</html>