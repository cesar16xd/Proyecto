<?php

require_once 'models/usermodel.php';
require_once 'models/personamodel.php';

class Login extends SessionController{
    function __construct(){
        parent::__construct();
        error_log('Contoller/Login::constructor');
    }

    function render(){
        error_log('Login::render -> cargar el view de login');
        $this->view->render('public/login');
    }

    function autenticacion(){
        error_log('Login::autenticacion()');
        if($this->existPOST(['correo','contraseña','perfilCuenta'])){
            error_log('Login::autenticacion() 1111');
            $correo = $this->getPost('correo');
            $contraseña = $this->getPost('contraseña');
            $perfilCuenta = $this->getPost('perfilCuenta');

            if( $correo == ''   || empty($correo) ||
                $contraseña == ''   || empty($contraseña) ||
                $perfilCuenta == ''   || empty($perfilCuenta) ){
                $this->redirect('login',['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EMPTY ]);
            }
            $user = new UserModel();
            error_log('Login::autenticacion()');
            $user = $user->login($correo,$contraseña,$perfilCuenta);
            error_log('Login::autenticacion()');
            if($user != NULL){
                if($user->getCodRpta() == 1)
                    $this->initialize($user);
                else if($user->getCodRpta() == 2)
                    $this->redirect('login',['error' => ErrorMessages::ERROR_LOGIN_AUTENTICACION_DATA]);
                else
                    $this->redirect('login',['error' => ErrorMessages::ERROR_LOGIN_AUTENTICACION]);
            }
            else{
                $this->redirect('login',['error' => ErrorMessages::ERROR_LOGIN_AUTENTICACION]);
            }
        }else{
            $this->redirect('login',['error' => ErrorMessages::ERROR_LOGIN_AUTENTICACION]);
        }
    }

}

?>