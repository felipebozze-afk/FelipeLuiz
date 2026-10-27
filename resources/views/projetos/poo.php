//Programação orientada a objetos//
<?php
// ENCAPSULAMENTO
// Proteger informações para que não sejam alteradas de qualquer jeito.

// HERANÇA
// Criar uma classe nova aproveitando características de outra.

// POLIMORFISMO
// Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.

// ABSTRAÇÃO
// Mostrar o que é necessário e esconder detalhes complicados de funcionamento.

// Exemplo com POO
class Personagem {
    public $nome;
    public $vida;
    public $dano;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }

    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$lucas = new Personagem("Lucas", 100, 10);
$aurora = new Personagem("Aurora", 50, 5);
$chloe = new Personagem("Chloe", 30, 3);

$lucas->atacar();




class Guerreiro extends Personagem {
    public function defender() {
        echo "$this->nome levantou o escudo!";
    }
}

$guerreiro = new Guerreiro("Lucas", 100, 10);

$guerreiro->atacar();// metodo herdado
$guerreiro->defender();// metodo própio













?>