    <?php

// Aki faremos as funcoes GET, PUT, POST, DELETE;
class JogoDAO{
    //POST
    public function insert(Jogo $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Jogos(nome,valor,plataforma,genero) VALUES(?,?,?,?)");
        $stmt->bind_param("sdss",$p->getNome(), $p->getValor(), $p->getPlataforma(), $p->getGenero());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
 public function buscaJogo($id){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->prepare("SELECT * FROM Jogos WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $valor, $plataforma, $genero);
        $stmt->fetch();
        $jogo = new Jogo($id,$nome,$valor, $plataforma, $genero);
        return $jogo;
    }
    
    public function excluiJogo($id){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->prepare("DELETE FROM Jogos WHERE id=?");
        $stmt->bind_param("i",$id); // o, "i" -> representa INT, caso fosse uma String seria, "s";
        $stmt->execute();
        $stmt->bind_result();
    }
}
//http://php.net/manual/en/mysqli-stmt.bind-param.php explicação do metodo bind_param





?>