<?php

class Home extends SessionController{
    private $user;
    private $persona;
    function __construct(){
        parent::__construct();
        error_log('INFO [HOME] => construct()');
    }

    function render(){
        error_log('INFO [HOME] => render()');
        // redirecciona a la carpeta vista pero la url sera con el nombre de la Clase Controller
        $this->user = $this->getUserSessionData();
        error_log('INFO [HOME] => render() -> datos de la persona : ' . $this->user->getPersona());
        if($this->user->getPerfil() == 'cliente')
            $this->view->render('cliente/home' , [ 'user' => $this->user]);
        else if($this->user->getPerfil() =='tecnico')
            $this->view->render('tecnico/home', [ 'user' => $this->user]);
        else if($this->user->getPerfil() =='colaborador')
            $this->view->render('colaborador/home', [ 'user' => $this->user]);
    }
}

?>