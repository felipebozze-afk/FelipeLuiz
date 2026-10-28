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


