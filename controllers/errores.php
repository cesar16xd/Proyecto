<?php

class Errores extends Controller{
    function __construct(){
        parent::__construct();
        error_log('Errores::constructor -> inicio de Errores');
    }

    function render(){
        error_log('Errores::render -> cargar el view de errores');
        $this->view->render('public/error');
    }
}

?>