<?php

abstract class Maquina {
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
    }

    // ENCAPSULAMENTO - GETTER
    public function getProducao() {
        return $this->producao;
    }

    // ENCAPSULAMENTO - ALTERAÇÃO CONTROLADA
    public function registrarProducao($quantidade) {
        if ($quantidade <= 0) {
            return false;
        }

        $this->producao += $quantidade;
        return true;
    }
 //ABSTRAÇÃO
    abstract public function operar();
}

// HERANÇA
class Esteira extends Maquina {
    public function operar() {
        return "transportando peças.\n";
    }

}
class Prensa extends Maquina {
    public function operar() {
        return "prençando peças.\n";
    }
}
 class RobodeSoldagem extends Maquina {
    public function operar() {
        return "Soldando peças.\n";
    }
}

// 3. SESSÃO - ARMAZENAMENTO TEMPORÁRIO

if (!isset($_SESSION["maquinas"])) {
    $_SESSION["maquinas"] = [];
}

$mensagem = "";

// 4. RECEBER FORMULÁRIO VIA POST

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

    if(
        $nome === "" ||
        $quantidade === false ||
        $quantidade <= 0

    
    ){
        $mensagem = "Preencha todos os campos corretamente.";

    } else{
        //CRIANDO OBJETOS COM BASE NO FORMULÁRIO
        if($tipo === "esteira") {
            $maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new Prensa($nome);
        } elseif ($tipo === "robodeSoldagem") {
            $maquina = new RobodeSoldagem($nome);
        } 
        {
    
    }
    // EXECUTANDO OS MÉTODOS DO OBJETO
    $maquina->registrarProducao($quantidade);

    // GUARDANDO O OBJETO NA SESSÃO
    $_SESSION["maquinas"][] = $maquina;

    $mensagem = "Máquina registrada com sucesso!";
    }
}

//EVITAR INTERPRETAR TEXTO COM HTML
function escapar($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/poo2.css">
    <title>Cadastro de máquinas</title>
</head>
<body>
    <main>
        <h1>Cadastro de máquinas</h1>
        <?php if ($mensagem !== ""): ?>
            <p><?= escapar($mensagem) ?></p>
        <?php endif; ?>
        <section>
            <h2>Cadastrar máquina</h2>
            <form method="POST">
                <div><label for="nome">Nome da máquina:</label><input type="text" id="nome" name="nome" required></div>
                <div><label for="tipo">Tipo:</label><select id="tipo" name="tipo" required>
                    <option value="">Selecione</option>
                    <option value="esteira">Esteira</option>
                    <option value="prensa">Prensa</option>
                    <option value="robodeSoldagem">Robô de soldagem</option>
                </select></div>
                <div><label for="quantidade">Quantidade produzida:</label><input type="number" id="quantidade" name="quantidade" min="1" required></div>
                <button type="submit">Cadastrar</button>
            </form>
        </section>
        <section>
            <h2>Consultar máquinas</h2>
            <form method="GET">
                <label for="busca">Pesquisar por nome:</label>
                <input type="search" id="busca" name="busca" value="<?= escapar($_GET['busca'] ?? '') ?>">
                <button type="submit">Pesquisar</button>
                <a href="<?= escapar($_SERVER['PHP_SELF']) ?>">Limpar</a>
            </form>
            <?php
            $busca = trim($_GET['busca'] ?? '');
            $maquinasExibidas = array_filter(
                $_SESSION['maquinas'],
                function ($maquina) use ($busca) {
                    return $busca === '' ||
                        stripos($maquina->nome, $busca) !== false;
                }
            );
            ?>
            <?php if ($maquinasExibidas) { ?>
                <table border="1">
                    <thead><tr><th>Nome</th><th>Produção</th><th>Operação</th></tr></thead>
                    <tbody>
                        <?php foreach ($maquinasExibidas as $maquina) { ?>
                            <tr>
                                <td><?= escapar($maquina->nome) ?></td>
                                <td><?= escapar($maquina->getProducao()) ?></td>
                                <td><?= escapar($maquina->operar()) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>Nenhuma máquina encontrada.</p>
            <?php } ?>
        </section>
    </main>
</body>
</html>
