<?php

$funcionarios = [
    [
        'nome' => 'Alessandra',
        'idade' => 18,
        'organizacao' => '1',
        'salario' => '5000'
    ],
    [
        'nome' => 'Leandro',
        'idade' => 25,
        'organizacao' => '3',
        'salario' => '1900',
    ],
    [
        'nome' => 'Bruno',
        'idade' => 23,
        'organizacao' => '1',
        'salario' => '1800',
    ],
    [
        'nome' => 'Gustavo',
        'idade' => 20,
        'organizacao' => '2',
        'salario' => '2000',
    ]
];

//Letra A
function funcionarioMaisJovem($funcionarios) {
    $maisJovem = null;
    $idadeMaisJovem = PHP_INT_MAX;

    foreach ($funcionarios as $funcionario) {
        if ($funcionario['idade'] < $idadeMaisJovem) {
            $idadeMaisJovem = $funcionario['idade'];
            $maisJovem = $funcionario['nome'];
        }
    }

    return $maisJovem;
}

echo "Funcionário mais jovem: " . funcionarioMaisJovem($funcionarios) . "\n";


//Letra B
function agruparPorOrganizacao($funcionarios) {
    $agrupados = [];

    foreach ($funcionarios as $funcionario) {
        $organizacao = $funcionario['organizacao'];
        if (!isset($agrupados[$organizacao])) {
            $agrupados[$organizacao] = [];
        }
        $agrupados[$organizacao][] = $funcionario;
    }

    return $agrupados;
}

print_r(agruparPorOrganizacao($funcionarios));


//Letra C
function mediaSalarios($funcionarios) {
    $totalSalarios = 0;
    $numFuncionarios = count($funcionarios);

    foreach ($funcionarios as $funcionario) {
        $totalSalarios += $funcionario['salario'];
    }

    return $totalSalarios / $numFuncionarios;
}

echo "Média de salários: R$" . mediaSalarios($funcionarios) . "\n";


//Letra D
function ordenarPorNome($funcionarios) {
    usort($funcionarios, function($a, $b) {
        return strcmp($a['nome'], $b['nome']);
    });

    return $funcionarios;
}

print_r(ordenarPorNome($funcionarios));