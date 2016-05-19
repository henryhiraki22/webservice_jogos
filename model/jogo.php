<?php

class Jogo{
    
    private $id, $nome, $valor, $plataforma, $genero;
    
    public function __construct($id,$nome,$valor,$plataforma,$genero){
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->plataforma = $plataforma;
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
    public function getPlataforma(){
        return $this->plataforma;
    }
    public function getGenero(){
        return $this->genero;
    }
}

?>