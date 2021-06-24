<?php

require_once 'models/usermodel.php';
require_once 'models/personamodel.php';

class Registrar extends SessionController{
    function __construct(){
        parent::__construct();
        error_log('INFO [REGISTRAR] => construct()');
    }

    function render(){
        error_log('INFO [REGISTRAR] => render()');
        $this->view->render('public/registrar');
    }

    function nuevoUsuario(){
        error_log('INFO [REGISTRAR] => nuevoUsuario()');
        if( $this->existPOST(['nombres','apPaterno','apMaterno','direccion','celular',
                              'correo', 'contraseña', 'perfilCuenta',
                              'tipoDocumento','numDocumento','distrito']) ){
            
            $nombres = $this->getPost('nombres');
            $apPaterno = $this->getPost('apPaterno');
            $apMaterno = $this->getPost('apMaterno');
            $direccion = $this->getPost('direccion');
            $celular = $this->getPost('celular');
            $correo = $this->getPost('correo');
            $contraseña = $this->getPost('contraseña');
            $perfil = $this->getPost('perfilCuenta');
            $tipoDoc = $this->getPost('tipoDocumento');
            $numDoc = $this->getPost('numDocumento');
            $distrito = $this->getPost('distrito');
            
            //validate data
            if( $nombres == ''      || empty($nombres)    || $apPaterno == '' || empty($apPaterno) ||
                $apMaterno == ''    || empty($apMaterno)  || $direccion == '' || empty($direccion) ||
                $celular == ''      || empty($celular)    || $correo == ''    || empty($correo) ||
                $tipoDoc == ''      || empty($tipoDoc)    || $numDoc == ''    || empty($numDoc) ||
                $distrito == ''   || empty($distrito)){
                error_log('ERROR [REGISTRAR] => nuevoUsuario() ->algun dato esta vacio');
                $this->redirect('registrar',['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EMPTY ]);
            }
            else{
                $persona = new PersonaModel();
                $user = new UserModel();
                $persona->setNombres($nombres);
                $persona->setApPaterno($apPaterno);
                $persona->setApMaterno($apMaterno);
                $persona->setDireccion($direccion);
                $persona->setCelular($celular);
                $persona->setIdDistrito($distrito);
                $persona->setTipoDoc($tipoDoc);
                $persona->setNumDoc($numDoc);
                $user->setCorreo($correo);
                $user->setContraseña($contraseña);
                $user->setPerfil($perfil);

                if($user->exists($correo)) 
                    $this->redirect('registrar', ['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EXISTS_CORREO]);
                else if($persona->exists($numDoc)) 
                    $this->redirect('registrar', ['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO_EXISTS_DOCUMENTO]);
                else{
                    if($persona->save()){
                        $user->setIdPersona($persona->getNumDocumento($numDoc)->getIdPersona());
                        if($user->save()) 
                            $this->redirect('login', ['success' => SuccessMessages::SUCCESS_REGISTRAR_USUARIO]);
                        else 
                            $this->redirect('registrar',['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO ]);
                    }else{
                        $this->redirect('registrar',['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO ]);
                    }
                        
                }
            }
        }
        else{
            $this->redirect('registrar',['error' => ErrorMessages::ERROR_REGISTRAR_NUEVO_USUARIO ]);
        }
    }

}

?>