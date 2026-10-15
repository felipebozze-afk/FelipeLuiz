<?php

function apresentarSistema() {
    echo "Bem vindo(a) ao Help Desk!";
}

apresentarSistema();

function abrirChamado($nome, $problema) {
    echo "$nome abriu um chamado: $problema";
}

abrirChamado("Lucas", "Impressora não funciona");

?>
