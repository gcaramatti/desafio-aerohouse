<?php

function menorDivisivelRecursivo($numero) {
    if ($numero % 4 == 0 && $numero % 5 == 0 && $numero % 6 == 0) {
        return $numero;
    } else {
        return menorDivisivelRecursivo($numero + 1);
    }
}

$menorDivisivelV1 = menorDivisivelRecursivo(1);
echo "O menor número divisível por 4, 5 e 6 ao mesmo tempo é: " . $menorDivisivelV1 . "\n";


function menorDivisivel() {
    for ($numero = 1; ; $numero++) {
        if ($numero % 4 == 0 && $numero % 5 == 0 && $numero % 6 == 0) {
            return $numero;
        }
    }
}

$menorDivisivelV2 = menorDivisivel();
echo "O menor número divisível por 4, 5 e 6 ao mesmo tempo é: " . $menorDivisivelV2 . "\n";

// Qual técnica gastária mais desempenho da máquina?
// As funções recursivas tendem a ter um custo computacional maior do que as funções com laços repetitivos porque 
// cada chamada recursiva adiciona uma nova camada de ativação na pilha de execução, o que consome memória.