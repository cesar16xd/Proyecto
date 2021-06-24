<?php

class Session{
    private $sessionName = 'user';
    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function setCurrentUser($user){
        $_SESSION[$this->sessionName] = $user;
    }

    public function getCurrentUser(){
        return $_SESSION[$this->sessionName];
    }

    public function closeSession(){
        error_log('INFO [SESSION] => closeSession() :: cerrando la session');
        session_unset();
        session_destroy();
    }

    public function exists(){
        error_log('INFO[SESSION] => exists() :: ' . isset($_SESSION[$this->sessionName]));
        return isset($_SESSION[$this->sessionName]);
    }
    
}

?>