<?php

//POST
class UsuarioDAO{
    
    public function insereUser(Usuario $u){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO User(nome,login,senha) VALUES(?,?,?)");
        $stmt->bind_param("sss",$u->getNome(),$u->getLogin(),$u->getSenha());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    // GET
 public function buscaUser($id){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->prepare("SELECT nome FROM User WHERE id=(?)");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($nome);
        $stmt->fetch();
        $user = new Usuario($nome,$id,$login,$senha);
        return $user;
    }
    
    //LISTA TODOS OS USUARIOS.
    
    public function getAllUser(){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        $stmt = $mysqli->query("SELECT * FROM User");
        $user = [];
        for ($i = 0; $usuario = $stmt->fetch_assoc(); $i++){ // fetch_assoc retorna uma matriz associativa.
            $user[$i] = new Usuario($usuario['nome'], $usuario['login'], $usuario['senha']);
        }
        return $user;
    }
    
    // DELETE
public function deletaUser(Usuario $u){
        $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("DELETE FROM User WHERE nome = (?)");
        $stmt->bind_param("s",$u->getNome());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }
    
    // UPDATE
public function atualizaUser(Usuario $u){
    $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
    if($msqli->connect_errno){
        echo "Falha no MySQL: (". $mysqli->connect_errno . ") " . $mysqli-> connect_error;
    }
    $stmt = $mysqli->prepare("UPDATE User SET nome=(?),login=(?),senha=(?) WHERE id = (?)");
    $stmt->bind_param("sssi",$u->getNome(), $u->getLogin(), $u->getSenha(),$u->getId());
     if(!$stmt->execute()){
     echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
    }
    $stmt->close();
}

public function authUser(Usuario $a){
 $mysqli = new mysqli("127.0.0.1", "henryhiraki22", "", "trabalho");
 $stmt = $mysqli->prepare("SELECT nome FROM User WHERE login=(?) AND senha=(?)");
        $stmt->bind_param("ss",$a->getLogin(),$a->getSenha());
        $stmt->execute();
        $stmt->bind_result($nome);
        $stmt->fetch();
        if($nome === null){
            return false;
        }else{
            return $nome;
    
        }
    }
}
/*http://php.net/manual/en/mysqli-stmt.bind-param.php explicação do metodo bind_param: 

O bind param, pega o parametro mediante o que vc colocou no banco NOME = VARCHAR, logo é uma String, então entra como s. 
ID = INT = i;
Valor = Double = d;
*/

?>