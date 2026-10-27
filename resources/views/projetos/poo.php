
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
abstract class Personagem {
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

    abstract public function atacar();
    abstract public function defender();
}




class Guerreiro extends Personagem {

    // Sobrescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome atacou com uma espada!\n";
    }

    public function defender() {
        echo "$this->nome levantou o escudo!\n";
    }
}

class Mago extends Personagem {

    // Sobrescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome lançou uma bola de fogo!\n";
    }

    public function defender() {
        echo "$this->nome conjurou um escudo mágico!\n";
    }
}

class Curandeiro extends Personagem {

    public function atacar() {
        echo "$this->nome atacou com uma faca!\n";
    }

    public function defender() {
        echo "$this->nome conjurou uma barreira de cura!\n";
    }

    public function curar(Personagem $alvo, int $quantidade) {
        $novaVida = $alvo->getVida() + $quantidade;
        $alvo->setVida($novaVida);
        echo "$this->nome curou $alvo->nome em $quantidade pontos!\n";
    }
}

$guerreiro = new Guerreiro("Lucas", 50, 10);
$mago = new Mago("Aurora", 100, 5);
$curandeiro = new Curandeiro("Chloe", 100, 3);

$personagens = [$guerreiro, $mago, $curandeiro];

foreach($personagens as $p) {
    $p->atacar();
}

$curandeiro->curar($guerreiro, 50);









//https://felipeb315.devlook.xyz/views/projetos/poo.php


//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe .












?>