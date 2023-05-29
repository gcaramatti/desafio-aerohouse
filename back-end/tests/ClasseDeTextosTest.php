<?php
use PHPUnit\Framework\TestCase;
require 'OrientacaoAObjetos.php';

class ClasseDeTextosTest extends TestCase
{
    public function testVerificaTextoPadrão()
    {
        $assert = 'Texto concatenado utilizando orientação de objeto em PHP!';
        $minhaClasse = new ClasseDeTextos();
        
        $resultado = $minhaClasse->concatenarPropriedades(false);
        
        $this->assertEquals($assert, $resultado);
    }

    public function testVerificaTextoPersonalizado()
    {
        $assert = 'Texto personalizado';
        $minhaClasse = new ClasseDeTextos();
        
        $resultado = $minhaClasse->concatenarPropriedades(true);
        
        $this->assertEquals($assert, $resultado);
    }
}
