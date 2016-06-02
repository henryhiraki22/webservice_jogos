<?php

class Usuario{
    
    private $nome, $login, $senha, $id;
    
    public function __construct($nome,$login,$senha,$id){
        //$this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }
    /*public function getId(){
        return $this->id;
    }*/
    public function getNome(){
        return $this->nome;
    }
    
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
}
?>