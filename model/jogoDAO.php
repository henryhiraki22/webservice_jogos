<?php

// Aki faremos as funcoes GET, PUT, POST, DELETE;
class JogoDAO{
    //POST
    public function insert(Jogo $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Jogos(id,nome,valor,plataforma,genero) VALUES(?,?,?,?,?)");
        $stmt->bind_param("isdss",$p->getId(),$p->getNome(), $p->getValor(), $p->getPlataforma(), $p->getGenero());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
 public function buscaJogo($id){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->prepare("SELECT * FROM Jogos WHERE id=(?)");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $valor, $plataforma, $genero);
        $stmt->fetch();
        $jogo = new Jogo($id,$nome,$valor, $plataforma, $genero);
        return $jogo;
    }
  
public function excluiJogo(Jogo $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("DELETE FROM Jogos WHERE id = ?");
        $stmt->bind_param("i",$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
}
//http://php.net/manual/en/mysqli-stmt.bind-param.php explicação do metodo bind_param

?>