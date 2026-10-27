//Programação orientada a objetos//
<?php



// Exemplo com POO
class Personagem {
    public $nome;
    public $vida = 100;

    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$personagem1 = new Personagem();
$personagem1->nome = "Felipe";
$personagem1->atacar();












?>