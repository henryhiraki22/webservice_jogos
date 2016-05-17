<?php

class Jogo{
    
    private $id, $nome, $valor, $plataforma, $categoria;
    
    public function __construct($id=0,$nome,$valor,$plataforma,$categoria){
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->plataforma = $plataforma;
        $thi->categoria = $categoria;
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
    public function getCategoria(){
        return $this->categoria;
    }
}






?>