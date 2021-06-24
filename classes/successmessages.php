<?php

class SuccessMessages{

    const PRUEBA = "c74163200ec1e78de1223179774c0318";
    const SUCCESS_REGISTRAR_USUARIO = "c74163200ec1e78de1223187884c0318";

    private $successList = [];

    public function __construct(){
        $this->successList = [
            SuccessMessages::PRUEBA => 'ESTE ES UN MENSAJE D CLASE SUCCESS',
            SuccessMessages::SUCCESS_REGISTRAR_USUARIO => 'Te has registrado satisfactoriamente'
        ];
    }

    public function get($hash){
        return $this->successList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }
        else{
            return false;
        }
    }

}

?>