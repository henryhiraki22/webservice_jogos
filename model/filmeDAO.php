<?php

class FilmeDAO{
    //POST
    public function insertFilme(Filme $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Filme(nome,valor,genero) VALUES(?,?,?)");
        $stmt->bind_param("sds",$p->getNome(), $p->getValor(), $p->getGenero());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
 public function buscaFilme($id){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->prepare("SELECT * FROM Filme WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $valor, $genero);
        $stmt->fetch();
        $jogo = new Filme($id,$nome,$valor,$genero);
        return $jogo;
    }
    
   public function deletaFilme(Filme $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("DELETE FROM Filme WHERE id =(?)");
        $stmt->bind_param("i",$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    //123
     public function atualizaFilme(Filme $p){
            $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if($msqli->connect_errno){
            echo "Falha no MySQL: (". $mysqli->connect_errno . ") " . $mysqli-> connect_error;
        }
        $stmt = $mysqli->prepare("UPDATE Filme SET nome=(?),valor=(?),genero=(?) WHERE id = (?)");
        $stmt->bind_param("sdsi",$p->getNome(), $p->getValor(), $p->getGenero(),$p->getId());  
        if(!$stmt->execute()){
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
       }
        $stmt->close();
    }    
}
?>
