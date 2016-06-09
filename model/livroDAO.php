<?php
class LivroDAO{
    public function insertLivro(Livro $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Livros(nome,valor,genero) VALUES(?,?,?)");
        $stmt->bind_param("sds",$p->getNome(), $p->getValor(), $p->getGenero());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    // GET
 public function buscaLivro($id){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->prepare("SELECT * FROM Livros WHERE id=(?)");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $valor, $genero);
        $stmt->fetch();
        $livro = new Livro($id,$nome,$valor, $genero);
        return $livro;
    }
    
    //LISTA TODOS OS LIVROS
    public function getAllLivros(){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->query("SELECT * FROM Livros");
        $livro = [];
        for ($i = 0; $livros = $stmt->fetch_assoc(); $i++){
            $livro[$i] = new Livro($livros['id'],$livros['nome'], $livros['valor'],$livros['genero']);
        }
        return $livro;
    }
    
    // DELETE
    public function excluiLivro(Livro $p){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("DELETE FROM Livros WHERE id =(?)");
        // Por enquanto só tem a opção de delete, por ID...caso quiser excluir por outro parametro, adicionar AKI.
        $stmt->bind_param("i",$p->getId());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    // UPDATE
    public function updateLivro(Livro $p){
    $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
    if($msqli->connect_errno){
        echo "Falha no MySQL: (". $mysqli->connect_errno . ") " . $mysqli-> connect_error;
    }
    $stmt = $mysqli->prepare("UPDATE Livros SET nome=(?),valor=(?),genero=(?) WHERE id = (?)");
    $stmt->bind_param("sdsi",$p->getNome(), $p->getValor(), $p->getGenero(),$p->getId());  
     if(!$stmt->execute()){
     echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
    }
    $stmt->close();
    }    
}

?>
