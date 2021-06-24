<?php

class ErrorMessages{
    // ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "c74163200ec1e78de1223179774c0318";
    const ERROR_REGISTRAR_NUEVO_USUARIO = "c74163200ec1e78de2222179774c0318";
    const ERROR_REGISTRAR_NUEVO_USUARIO_EMPTY = "c74163200ec1e45de22221795474c0318";
    const ERROR_REGISTRAR_NUEVO_USUARIO_EXISTS_CORREO = "c74214200ec1e45de22221795474c0318";
    const ERROR_REGISTRAR_NUEVO_USUARIO_EXISTS_DOCUMENTO = "c84214200ac1e45de22221795474c0318";
    const ERROR_LOGIN_AUTENTICACION_EMPTY = "c14214200ec1e45de22221795474c0318";
    const ERROR_LOGIN_AUTENTICACION_DATA = "c15214200ec1e45de22221795474c0318";
    const ERROR_LOGIN_AUTENTICACION = "c17214200ec1e45de22221795474c0318";
    
    private $errorList = [];

    public function __construct(){
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'El nombre de la categoría ya existe, intenta otra',
            ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO => 'Hubo un error al intentar la solicitud',
            ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EMPTY => 'Llena todos los campos del registro',
            ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EXISTS_CORREO => 'El correo ya se encuentra registrado',
            ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EXISTS_DOCUMENTO => 'El numero de documento ya se encuentra registrado',
            ErrorMessages::ERROR_LOGIN_AUTENTICACION_EMPTY => 'Completar todos los campos',
            ErrorMessages::ERROR_LOGIN_AUTENTICACION_DATA => 'Porfavor ingrese el usuario y/o contraseña correcto',
            ErrorMessages::ERROR_LOGIN_AUTENTICACION => 'No se puede procesar la solicitud. Intentalo nuevamente'
        ];
    }

    public function get($hash){
        return $this->errorList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->errorList)){
            return true;
        }
        else{
            return false;
        }
    }
}

?>