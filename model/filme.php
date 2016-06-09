<?php

class Filme{
    
    private $id, $nome, $valor, $genero;
    
    public function __construct($id,$nome,$valor,$genero){
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->genero = $genero;
    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getValor(){
        return $this->valor;
    }
  
    public function getGenero(){
        return $this->genero;
    }
}

?>
