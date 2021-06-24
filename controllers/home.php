<?php

class Home extends SessionController{
    private $user;
    function __construct(){
        parent::__construct();
        error_log('Contoller/Home::constructor');
    }

    function render(){
        error_log('Home::render -> cargar el view de home');
        // redirecciona a la carpeta vista pero la url sera con el nombre de la Clase Controller
        $this->user = $this->getUserSessionData();
        if($this->user->getPerfil() == 'cliente')
            $this->view->render('cliente/home' , [ 'user' => $this->user]);
        else if($this->user->getPerfil() =='tecnico')
            $this->view->render('tecnico/home', [ 'user' => $this->user]);
        else if($this->user->getPerfil() =='colaborador')
            $this->view->render('colaborador/home', [ 'user' => $this->user]);
    }
}

?>