<?php

class Controller{
    
    function __construct(){
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }

    function existPOST($params){
        foreach($params as $param){
            if(!isset($_POST[$param])){
                error_log("CONTROLLER::ExistPOST => No existe el parametro $param");
                return false;
            }
        }
        error_log( "CONTROLLER::ExistPOST => Existen parámetros" );
        return true;
    }

    function existGET($params){
        foreach($params as $param){
            if(!isset($_GET[$param])){
                error_log("CONTROLLER::existGet => No existe el parametro $param");
                return false;
            }
        }
        error_log( "CONTROLLER::existGET => Existen parámetros" );
        return true;
    }

    function getPost($name){
        return $_POST[$name];
    }

    function getGet($name){
        return $_GET[$name];
    }

    function redirect($url,$mensajes = []){
        $data = [];
        $params = '';

        foreach ($mensajes as $key => $mensaje){
            array_push($data,$key . '=' . $mensaje);
        }
        $params = join('&' , $data);

        if($params != ''){
            $params = '?' . $params;
        }
        error_log("CONTROLLER::redirect => redireccionando a la pestaña $url$params");
        header('location:' . constant('URL') . '/' . $url . $params);
    }
}


?>