<?php

require_once 'controllers/errores.php';

class App{

    function __construct(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url ,'/');
        $url = explode('/', $url);
        //http://localhost/TecnologyServices

        if(empty($url[0])){
            error_log('WARNING [APP] => construct() :: no hay controller expecificado');
            $archivoController = 'controllers/inicio.php';
            require_once $archivoController;
            // Controller Base
            $controller = new Inicio();
            $controller->loadModel('inicio');
            $controller->render();
            return false;
        }
        $archivoController = 'controllers/'.$url[0].'.php';

        if(file_exists($archivoController)){
            require_once $archivoController;
            // llamar al modelo del controller
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            
            if(isset($url[1])){
                if(method_exists($controller,$url[1])){
                    if(isset($url[2])){
                        //n° de parametros
                        $nparam = count($url) - 2;
                        //arreglo de parametros
                        $params = [];

                        for($i=0;$i<$nparam;$i++){
                            array_push($params,$url[$i]+2);
                        }
                        $controller->{$url[1]}($params);
                    }else{
                        //no tiene paramateros, se llama al metodo tal cual
                        $controller->{$url[1]}();
                    }
                }else{
                    //error, no existe el metodo
                    $controller = new Errores();
                    $controller->render();
                }
            }else{
                //no hay metodo a cargar, se carga el metodo por default
                $controller->render(); 
            }
        }else{
            error_log('ERROR [APP] => construct() :: no se encontro la pagina ' . $url[0]);
            //no existe el archivo, envia error
            $controller = new Errores();
            $controller->render();
        }
    }
}

?>