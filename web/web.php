<?php

class Controller{
    //VEM DA URL
    private $met;
    
    public function __construct($met){
        $this->met = $met;
    }
    
    public function gerenciar(){
        require_once "resources.php";
        $rm = $_SERVER["REQUEST_METHOD"];
        $clazz = "GeneralResource" . $rm;
        $resource = new $clazz();
        $nomeDoMetodo = $this->met;
        $resource->$nomeDoMetodo();
    }
}
$met = $_POST["metodo"];
$class = $_POST["classe"];
$met = $_GET["metodo"];
$class = $_GET["classe"];
$r = new Controller($met);
$r->gerenciar();

?>
