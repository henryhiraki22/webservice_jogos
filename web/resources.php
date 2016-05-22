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
}

class GeneralResourceOPTIONS extends GeneralResource{
    
    public function buscaJogo(){
            header('allow: GET, OPTIONS');
            http_response_code(200); 
        }
    
    public function insereJogo(){
            header('allow: POST, OPTIONS');
            http_response_code(200);
            //nao sei se isso está certo.
        }        
    public function deletaJogo(){
        header('allow: DELETE,OPTIONS');
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
}
?>    