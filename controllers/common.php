<?php

require_once 'models/ubigeomodel.php';

class Common extends Controller{
    private $ubigeo;
    private $items;
    function __construct(){
        parent::__construct();
        error_log('INFO [COMMON] => construct()');
        $this->ubigeo = new UbigeoModel();
        $this->items = array();
    }

    function getDepartamento(){
        error_log('INFO [COMMON] => getDepartamento() ');
        try{
            $this->ubigeo = $this->ubigeo->getDepartamento();

            for($i = 0 ; $i<sizeof($this->ubigeo); $i++){
                $item = [ 'idDepartamento'  => $this->ubigeo[$i]->getIdDepartamento() ,
                                  'nombre'  => $this->ubigeo[$i]->getNombre() ];
                array_push($this->items,$item);
            }

            echo json_encode($this->items);
        }catch(Exception $e){
            error_log('ERROR [COMMON] => getDepartamento() -> Exception ' . $e);
        }
        
    }

    function getProvincia(){
        error_log('INFO [COMMON] => getProvincia() ');
        try{
            if($this->existGET(['idDepartamento'])){

                $idDepartamento = $this->getGet('idDepartamento');
    
                if( $idDepartamento != ''   || !empty($idDepartamento)){
                    
                    $this->ubigeo = $this->ubigeo->getProvincia($idDepartamento);
                    
                    for($i = 0 ; $i<sizeof($this->ubigeo); $i++){
                        $item = [ 'idProvincia'  => $this->ubigeo[$i]->getIdProvincia() ,
                                       'nombre'  => $this->ubigeo[$i]->getNombre() ];
                        array_push($this->items,$item);
    
                    }
    
                    echo json_encode($this->items);
                }
                
            }
        }catch(Exception $e){
            error_log('ERROR [COMMON] => getProvincia() -> Exception ' . $e);
        }
    }


    function getDistrito(){
        error_log('INFO [COMMON] => getDistrito() ');
        try{
            if($this->existGET(['idProvincia'])){

                $idProvincia = $this->getGet('idProvincia');
    
                if( $idProvincia != ''   || !empty($idProvincia)){
                    
                    $this->ubigeo = $this->ubigeo->getDistrito($idProvincia);
                    
                    for($i = 0 ; $i<sizeof($this->ubigeo); $i++){
                        $item = [ 'idDistrito'  => $this->ubigeo[$i]->getIdDistrito() ,
                                      'nombre'  => $this->ubigeo[$i]->getNombre() ];
                        array_push($this->items,$item);
    
                    }
    
                    echo json_encode($this->items);
                }
                
            }
        }catch(Exception $e){
            error_log('ERROR [COMMON] => getDistrito() -> Exception ' . $e);
        }
    }

}

?>