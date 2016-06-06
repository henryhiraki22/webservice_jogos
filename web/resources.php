<?php

abstract class GeneralResource{
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente $m"));
        http_response_code(404);
    }
}

class GeneralResourceGET extends GeneralResource{
    //GET
    public function buscaJogo(){
        //metodo que pega o jogo por um id.
        $arg1 = $_GET["arg1"];
        header('content-type: application/json');
        if($arg1 > 0){
            require_once "../model/jogo.php";
            require_once "../model/jogoDAO.php";
            $jd = new jogoDAO();
            $jogo = $jd->buscaJogo($arg1);
            if($jogo->getId() != null &&  $jogo->getNome() != null && $jogo->getValor() != null && $jogo->getPlataforma() && $jogo->getGenero() != null){
            echo json_encode(array("id"=>$jogo->getId(), "nome"=>$jogo->getNome(), "valor"=>$jogo->getValor(),
            "plataforma"=>$jogo->getPlataforma(), "genero"=>$jogo->getGenero()));
        //se for adicionar mais coisas ao jogo, adicionar aki...por enquanto temos nome, valor, plataforma e genero.
                http_response_code(200);
            }else{
                echo json_encode(array("response"=>"Nao Possui Registro"));
                http_response_code(404);
            }
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500); 
        }
    }
    //FILTRAR TODOS.

public function listaJogos(){
    header('content-type: application/json');
    require_once "../model/jogo.php";
    require_once "../model/jogoDAO.php";
    $jd = new JogoDAO();
    $jogo = $jd->getAllJogos();
    foreach($jogo as $jogos){
    $games[] = array("id"=>$jogos->getId(), "nome"=>$jogos->getNome(), "valor"=>$jogos->getValor(), "plataforma"=>$jogos->getPlataforma(), "genero"=>$jogos->getGenero());
    }if($games == null){
        echo "Jogo nao encontrado";
        http_response_code(500);
    }else{
        echo json_encode($games);
        http_response_code(200);
    }
}
    // BUSCA USUARIO.
public function buscaUsuario(){
    //metodo que pega o jogo por um id.
    $arg1 = $_GET["arg1"];
    header('content-type: application/json');
    if($arg1 > 0){
        require_once "../model/usuario.php";
        require_once "../model/usuarioDAO.php";
        $ud = new usuarioDAO();
        $user = $ud->buscaUser($arg1);
            if($user->getNome() != null){
                echo json_encode(array("ola", "nome"=>$user->getNome()));
        //se for adicionar mais coisas ao jogo, adicionar aki...por enquanto temos nome, valor, plataforma e genero.
                http_response_code(200);
                }else{
                    echo json_encode(array("response"=>"Nao Possui Registro"));
                    http_response_code(404);
                }
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500); 
        }
    }
    
public function listaUsuarios(){
      header('content-type: application/json');
      require_once "../model/usuario.php";
      require_once "../model/usuarioDAO.php";
      $us = new UsuarioDAO();
      $user = $us->getAllUser();
      foreach($user as $usuarios){
      $allUsers[] = array("nome"=>$usuarios->getNome(), "login"=>$usuarios->getLogin());
      }if($allUsers == null){
          echo "Usuario nao encontrado";
          http_response_code(500);
          }else{
                echo json_encode($allUsers);
                http_response_code(200);
         }
    }
}

class GeneralResourceOPTIONS extends GeneralResource{
    
    public function buscaJogo(){
            header('allow: GET, OPTIONS');
            http_response_code(200); 
        }
    public function buscaUsuario(){
            header('allow: GET, OPTIONS');
            http_response_code(200);
    }    
    
    public function insereJogo(){
            header('allow: POST, OPTIONS');
            http_response_code(200);
            //nao sei se isso está certo.
    }
    public function insereUsuario(){
            header('allow: GET, OPTIONS');
            http_response_code(200);
    }
    public function deletaJogo(){
        header('allow: DELETE,OPTIONS');
        http_response_code(200);
    }
    public function deletaUsuario(){
        header('allow: DELETE,OPTIONS');
        http_response_code(200);
    }
    public function atualizaJogo(){
        header('allow: GET, OPTIONS');
        http_response_code(200);
    }
    public function atualizaUsuario(){
        header('allow: GET, OPTIONS');
        http_response_code(200);
    }
}

class GeneralResourcePOST extends GeneralResource{
    
    public function insereJogo(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/jogo.php";
            require_once "../model/jogoDAO.php";
            $jogo = new Jogo($array["id"],$array["nome"],$array["valor"],$array["plataforma"], $array["genero"]);
            //array que retorna as informações, caso adicionar outra coisa relacionada ao jogo, adicionar aki tbm!
            // -X POST, para funcionar esse metodo.
            $jd = new JogoDAO();
            $jd->insert($jogo);
            echo json_encode(array("response"=>"Criado"));
            http_response_code(202);   
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500);   
        }
    }
    //inserir novo usuario.
    public function insereUsuario(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/usuario.php";
            require_once "../model/usuarioDAO.php";
            $usuario = new Usuario($array["nome"], $array["login"], $array["senha"]);
            $key = $array["senha"];
            $ud = new UsuarioDAO();
            $ud->insereUser($usuario);
            echo json_encode(array("response"=>"sucesso"));
            http_response_code(202);
        }else if($key == $key){
            echo "por favor digite uma senha";
        }
        else{
            echo json_encode(array("response"=>"Dados Invalidos"));
            http_response_code(500);
        }
    }
    
    //login do usuario ou ADM.
    
public function autenticar(){
            header('content-type: application/json');
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/usuario.php";
            require_once "../model/usuarioDAO.php";
            $us = new Usuario($array["nome"],$array["login"],$array["senha"]);
            $ud = new UsuarioDAO();
            $loginCorreto = $ud->authUser($us);
        if($loginCorreto === false){
            echo json_encode(array("response"=>"Dados invalidos"));
     } else{
            echo json_encode(array("response"=>"Login Correto"));
            require_once "JWT.php";
            $token = array();
            $token = $loginCorreto;
            header("content-type: application/json");
            $enc = JWT::encode($token, 'chave');
            echo json_encode(array("token: " => $enc)); 
            $token1 = JWT::decode($enc, 'chave'); 
            echo json_encode(array("Ola" => $token1));
          }
            
      }
public function autorizar(){
       header('content-type: application/json');
        require_once "JWT.php";
        $auth = getallheaders()["authorization"];
        if($auth == ""){
            echo "Erro";
        }else{
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/usuario.php";
            require_once "../model/usuarioDAO.php";
            $us = new Usuario($array["id"],$array["nome"],$array["login"],$array["senha"]);
            $ud = new UsuarioDAO();
            $loginCorreto = $ud->authUser($us);
            $token = $loginCorreto;
            $nome = explode(" ", $auth)[0];
            $token = explode(" ", $auth)[1];
            if($nome === "Bearer"){
                $token1 = JWT::decode($token, 'chave');
                echo json_encode(array("id" => $token1));
                if($token1 === $loginCorreto){
                    echo json_encode(array("resp" =>"OK"));
                }else{
                    echo "Erro 3";
                }
            }else{
                echo "Erro 2";                
            }
        }
    }
}

class GeneralResourceDELETE extends GeneralResource{
        
    public function deletaJogo(){
        header('content-type: application/json');
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/jogo.php";
            require_once "../model/jogoDAO.php";
            $jogo = new Jogo($array["id"],$array["nome"],$array["valor"],$array["plataforma"], $array["genero"]);
            //tentei fazer só pelo id, porém ele retorna um call stack dizendo que o resto está na __construct();
            // -X DELETE, para funcionar esse metodo.
            $jd = new jogoDAO();
            $jd->excluiJogo($jogo);
            echo json_encode(array("response"=>"Deletado."));
            http_response_code(202);   
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500);   
        }
    }
    // DELETA USUARIO PELO NOME, via POST.
    public function deletaUsuario(){
        header('content-type: application/json');
        if($_SERVER['CONTENT_TYPE'] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/usuario.php";
            require_once "../model/usuarioDAO.php";
            $user = new Usuario($array["nome"],$array["login"],$array["senha"]);
            //nessa opcao ele deleta pelo nome, tive que tirar o id passado no array.
            $ud = new usuarioDAO();
            $ud->deletaUser($user);
            echo json_encode(array("response" => "Deletado."));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados Invalidos"));
            http_response_code(500);
        }
    }
}

class GeneralResourcePUT extends GeneralResource{
    
    public function atualizaJogo(){
    if($_SERVER["CONTENT_TYPE"] === 'application/json'){
        $json = file_get_contents('php://input');
        $array = json_decode($json,true);
        require_once "../model/jogo.php";
        require_once "../model/jogoDAO.php";
        $jogo = new Jogo($array["id"], $array["nome"], $array["valor"], $array["plataforma"], $array["genero"]);
        $jd = new JogoDAO();
        $jd->updateJogo($jogo);
        echo json_encode(array("response"=>"Atualizado"));
        http_response_code(202);
        }else{
            echo json_encode(array("response"=>"Dados Invalidos"));
            http_response_code(500);
        }
    }
        //ATUALIZA USUARIO VIA POST.
     public function atualizaUsuario(){
        if($_SERVER["CONTENT_TYPE"] === 'application/json'){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "../model/usuario.php";
            require_once "../model/usuarioDAO.php";
            $user = new Usuario($array["nome"],$array["login"], $array["senha"], $array["id"]);
            $ud = new UsuarioDAO();
            $ud -> atualizaUser($user);
            echo json_encode(array("response"=>"Atualizado"));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados Invalidos"));
            http_response_code(500);
        }
    }
}
?>    