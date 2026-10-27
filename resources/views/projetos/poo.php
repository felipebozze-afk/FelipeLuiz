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
    private $vida;
    public $dano;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }
    public function getVida() {
        return $this->vida;

    }
    public function setVida($vida) {
        if ($vida < 0) {
            $this->vida = 0;
            echo "Vida não pode ser negativa! ";
            return;
        
        }

      $this->vida = $vida;
    }

    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$lucas = new Personagem("Lucas", 100, 10);

$lucas->setVida(50);

$aurora = new Personagem("Aurora", 50, 5);
$chloe = new Personagem("Chloe", 30, 3);

$lucas->atacar();




class Guerreiro extends Personagem {

    // Sobrescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome atacou com uma espada!\n";
    }

    public function defender() {
        echo "$this->nome levantou o escudo!\n";
    }
}

$guerreiro = new Guerreiro("Lucas", 100, 10);

$guerreiro->atacar();// metodo herdado
$guerreiro->defender();// metodo própio

class Mago extends Personagem {

    // Sobrescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome lançou uma bola de fogo!\n";
    

    }
}
$mago = new Mago("Aurora", 50, 5);

$mago->atacar();// metodo herdado do personagem   












//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe .












?>