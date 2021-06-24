<?php

class Inicio extends Controller{
    function __construct(){
        parent::__construct();
        error_log('Inicio::constructor -> inicio de clase Inicio');
    }

    function render(){
        error_log('Inicio::render -> cargar el view del inicio');
        $this->view->render('public/inicio');
    }
}

?>