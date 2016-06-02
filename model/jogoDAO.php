<?php

// Aki faremos as funcoes GET, PUT, POST, DELETE;

//POST
class JogoDAO{
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
    
    // GET
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
    
    //LISTA TODOS OS JOGOS
    public function getAllJogos(){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->query("SELECT * FROM Jogos");
        $jogo = [];
        for ($i = 0; $jogos = $stmt->fetch_assoc(); $i++){
            $jogo[$i] = new Jogo($jogos['id'],$jogos['nome'], $jogos['valor'],$jogos['plataforma'],$jogos['genero']);
        }
        return $jogo;
    }
    
    // DELETE
public function excluiJogo(Jogo $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("DELETE FROM Jogos WHERE id =(?)");
        // Por enquanto só tem a opção de delete, por ID...caso quiser excluir por outro parametro, adicionar AKI.
        $stmt->bind_param("i",$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    // UPDATE
public function updateJogo(Jogo $p){
    $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
    if($msqli->connect_errno){
        echo "Falha no MySQL: (". $mysqli->connect_errno . ") " . $mysqli-> connect_error;
    }
    $stmt = $mysqli->prepare("UPDATE Jogos SET nome=(?),valor=(?),plataforma=(?),genero=(?) WHERE id = (?)");
    $stmt->bind_param("sdssi",$p->getNome(), $p->getValor(), $p->getPlataforma(), $p->getGenero(),$p->getId());  
     if(!$stmt->execute()){
     echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
    }
    $stmt->close();
    }    
}
/*http://php.net/manual/en/mysqli-stmt.bind-param.php explicação do metodo bind_param: 

O bind param, pega o parametro mediante o que vc colocou no banco NOME = VARCHAR, logo é uma String, então entra como s. 
ID = INT = i;
Valor = Double = d;
*/
?>






