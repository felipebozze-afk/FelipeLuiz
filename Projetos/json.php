<?php

// 1. DECLARAR O CAMINHO DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2. ABRIR/LER O ARQUIVO JSON (CRIA UM VAZIO SE NÃO EXISTIR)
$json = file_exists($caminho) ? file_get_contents($caminho) : '[]';

// 3. TRANSFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

if (!is_array($alunos)) {
    $alunos = [];
}

$acao = $_POST["acao"] ?? "";

// CADASTRAR NOVO ALUNO
if ($acao === "cadastrar") {

    // 4. CRIAR UM ALUNO
    $novoAluno = [
        "nome"  => $_POST["nome"],
        "idade" => $_POST["idade"],
        "curso" => $_POST["curso"]
    ];

    // 5. ADICIONAR O ALUNO NO ARRAY
    $alunos[] = $novoAluno;

    // 6. TRANSFORMAR ARRAY PHP EM JSON
    $jsonAtualizado = json_encode(
        $alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    // 7. SALVAR NO ARQUIVO
    file_put_contents($caminho, $jsonAtualizado);

    echo "DADOS REGISTRADOS EM dados.json";

// ATUALIZAR ALUNO EXISTENTE
} elseif ($acao === "atualizar") {

    // PEGAR OS DADOS DO FORMULÁRIO
    $nome = $_POST["nome"];
    $novaIdade = $_POST["idade"];
    $novoCurso = $_POST["curso"];

    // PERCORRER TODOS OS ALUNOS
    foreach ($alunos as $posicao => $aluno) {
        if ($aluno["nome"] == $nome) {
            $alunos[$posicao]["idade"] = $novaIdade;
            $alunos[$posicao]["curso"] = $novoCurso;
        }
    }

    // SALVAR AS ALTERAÇÕES NO ARQUIVO JSON
    $jsonAtualizado = json_encode(
        $alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    file_put_contents($caminho, $jsonAtualizado);

    echo "DADOS ATUALIZADOS EM dados.json";

// DELETAR CADASTRO
} elseif ($acao === "deletar") {

    $nome = $_POST["nome"];

    // PERCORRER E REMOVER O ALUNO
    foreach ($alunos as $posicao => $aluno) {
        if ($aluno["nome"] == $nome) {
            unset($alunos[$posicao]);
        }
    }

    // REINDEXAR O ARRAY
    $alunos = array_values($alunos);

    // SALVAR AS ALTERAÇÕES NO ARQUIVO JSON
    $jsonAtualizado = json_encode(
        $alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    file_put_contents($caminho, $jsonAtualizado);

    echo "DADOS DELETADOS EM dados.json";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>

<body>

    <h2>CADASTRAR ALUNO</h2>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Idade:</label>
        <input type="number" name="idade" required>

        <label>Curso:</label>
        <input type="text" name="curso" required>

        <button type="submit" name="acao" value="cadastrar">
            Cadastrar
        </button>

    </form>

    <h2>DELETAR CADASTRO</h2>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <button type="submit" name="acao" value="deletar">
            Deletar
        </button>

    </form>

    <h2>ALUNOS CADASTRADOS</h2>

    <?php foreach ($alunos as $aluno) { ?>

        <form method="POST" style="margin-bottom: 15px;">
            <input type="hidden" name="nome" value="<?= $aluno["nome"] ?>">

            <h3><?= $aluno["nome"] ?></h3>

            <label>Idade:</label>
            <input type="number" name="idade" value="<?= $aluno["idade"] ?>" required>

            <label>Curso:</label>
            <input type="text" name="curso" value="<?= $aluno["curso"] ?>" required>

            <button type="submit" name="acao" value="atualizar">
                Atualizar
            </button>
        </form>

    <?php } ?>

</body>

</html>