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
            if($jogo->getId() != null &&  $jogo->getNome() != null && $jogo->getValor() != null && $jogo->getPlataforma() && $jogo->getGenero()){
                echo json_encode(array("id"=>$jogo->getId(), "nome"=>$jogo->getNome(), "valor"=>$jogo->getValor(),
                "produto"=>$jogo->getPlataforma(), "genero"=>$jogo->getGenero()));
        //se for adicionar mais coisas ao jogo, adicionar aki...por enquanto temos nome, valor, plataforma e genero.
                http_response_code(200);
            }else{
                echo json_encode(array("response"=>"Nao Contem"));
                http_response_code(404);
            }
        }else{
            echo json_encode(array("response"=>"Dados invalidos"));
            http_response_code(500); 
        }
    }
}
    
?>    