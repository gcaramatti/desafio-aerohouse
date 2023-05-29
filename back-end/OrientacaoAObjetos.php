<?php

class ClasseDeTextos {
    private $texto1;
    private $texto2;
    private $texto3;
    
    public function getTexto1() {
        return $this->texto1;
    }
    
    public function setTexto1($valor) {
        $this->texto1 = $valor;
    }
    
    public function getTexto2() {
        return $this->texto2;
    }
    
    public function setTexto2($valor) {
        $this->texto2 = $valor;
    }
    
    public function getTexto3() {
        return $this->texto3;
    }
    
    public function setTexto3($valor) {
        $this->texto3 = $valor;
    }
    
    public function concatenarPropriedades($textoPersonalizado) {
        if($textoPersonalizado)
            return 'Texto personalizado';
            
        $this->setTexto1('Texto concatenado ');
        $this->setTexto2('utilizando ');
        $this->setTexto3('orientação de objeto em PHP!');
        return $this->texto1 . $this->texto2 . $this->texto3;
    }
}

$obj = new ClasseDeTextos();

echo $obj->concatenarPropriedades(false);

//Descreva e utilize um padrão de projeto de sua escolha para encapsular a criação da sua classe.
// Pesquisando a fundo sobre essa questão, encontrei um padrão chamado: Factory Method, que criam objetos de classes concretas, mas os retornam como objetos de tipo ou interface abstrata.
// E pesquisando um pouco mais encontrei que podemos aplicar o Factory Method ao padrão de código MVC (Model-view-controller), onde teremos uma super classe para definir os modelos/interfaces 
// das entidades (M - V - C).

// No contexto do Factory Method, você pode ter uma classe abstrata AbstractModel que define a interface para os modelos.
// Cada classe de modelo concreta estenderá a classe AbstractModel e implementará o método fábrica create() para criar instâncias do modelo específico, e o mesmo podemos aplicar para aa entidade
// Controller