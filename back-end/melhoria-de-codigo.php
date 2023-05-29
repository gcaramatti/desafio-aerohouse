<?php
// function armazenarConhecimentos($conhecimentos) {
//     $pessoa = new StdClass;
//     $nome = "Meu nome"; 
//     $pessoa->organizacao = "Nova Organização";
//     $pessoa->nome = $nome;
//     $pessoa->conhecimentos = ["None", "None", "None", "None"];
//     $c = [];
//     $pessoa->telefone = "Telefones";

//     foreach($conhecimentos as $k => $conhecimento) {
//         $c[$k] = $conhecimento;
//     }

//     foreach($c as $j => $d) {
//         $pessoa->conhecimentos[$j] = $d;
//     }

//     $pessoa->emails="Emails";
//     return $pessoa->conhecimentos;
// }

// $conhecimentos = [
//     "Js",
//     "Php",
//     "C#",
//     "NodeJs",
// ];

// print_r(armazenarConhecimentos($conhecimentos));


//Retirei as linhas não utilizadas e retirei os foreachs sem necessidade
function armazenarConhecimentos($conhecimentos) {
    $pessoa = new StdClass;
    $pessoa->nome = "Meu nome"; 
    $pessoa->organizacao = "Nova Organização";
    $pessoa->conhecimentos = $conhecimentos;
    
    return $pessoa->conhecimentos;
}

$conhecimentos = [
    "Js",
    "Php",
    "C#",
    "NodeJs",
];

print_r(armazenarConhecimentos($conhecimentos));