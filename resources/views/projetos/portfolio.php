<?php
     require __DIR__ . "/../../config/conexao.php";
     echo "<br> Meu sistema esta conectado!";

     $sql = "CREATE TABLE IF NOT EXISTS teste (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nome VARCHAR(100),
     idade INT
    )";


    $pdo->exec($sql);
    echo "<br>tabela criada com sucesso!";

    $sqlJogos = "CREATE TABLE IF NOT EXISTS jogos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        genero VARCHAR(50),
        nota INT,
        ano_lancamento INT
    )";

    $pdo->exec($sqlJogos);
    echo "<br>tabela jogos criada com sucesso!";

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio | Projetos PHP</title>
    <style>
        :root { color-scheme: light; --azul: #174ea6; --fundo: #f3f6fb; --texto: #1f2937; --borda: #d9e1ec; }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--fundo); color: var(--texto); font: 16px/1.5 Arial, sans-serif; }
        header { background: #102f61; color: white; padding: 24px max(20px, calc((100% - 1100px)/2)); }
        header h1 { margin: 0; font-size: 1.7rem; }
        header p { margin: 5px 0 0; color: #d8e5fa; }
        main { max-width: 1100px; margin: 28px auto; padding: 0 20px; }
        section { background: white; border: 1px solid var(--borda); border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px #142b4d0b; }
        section h2 { margin: 0 0 16px; font-size: 1.2rem; }
        .projetos { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 14px; }
        .projeto { min-height: 112px; display: flex; flex-direction: column; justify-content: space-between; gap: 12px; border: 1px solid var(--borda); border-radius: 8px; padding: 16px; background: #fbfcfe; }
        .projeto strong { font-size: 1.05rem; }
        .projeto a { width: fit-content; border-radius: 6px; padding: 8px 12px; background: var(--azul); color: white; text-decoration: none; font-weight: 600; }
        .projeto a:hover { background: #103d84; }
        .acoes { margin-top: 18px; }
        .acoes a { color: var(--azul); font-weight: 600; text-decoration: none; }
        .acoes a:hover { text-decoration: underline; }
        @media (max-width: 600px) { .projetos { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
<header>
    <h1>Portfólio de Projetos PHP</h1>
    <p>Atividades práticas e exercícios desenvolvidos</p>
</header>
<main>
    <section>
        <h2>Projetos disponíveis</h2>
        <div class="projetos">
            <article class="projeto"><strong>Login básico</strong><a href="index.php?rota=loginbasico">Abrir projeto</a></article>
            <article class="projeto"><strong>Verificador de idade</strong><a href="index.php?rota=idade">Abrir projeto</a></article>
            <article class="projeto"><strong>Situação do aluno (POST)</strong><a href="index.php?rota=notas">Abrir projeto</a></article>
            <article class="projeto"><strong>Situação do aluno (GET)</strong><a href="index.php?rota=notas-get">Abrir projeto</a></article>
            <article class="projeto"><strong>Cadastro de jogos</strong><a href="index.php?rota=jogos">Abrir projeto</a></article>
        </div>
        <div class="acoes"><a href="?rota=helpdesk">Acessar Central de Helpdesk</a></div>
    </section>
</main>
</body>
</html>

