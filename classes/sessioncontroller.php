<?php

require_once 'models/usermodel.php';
require_once 'models/personamodel.php';

class SessionController extends Controller{

    private $session;
    private $sites;
    private $defaultSites;
    private $user;

    function __construct()
    {
        parent::__construct();
        $this->init();
    }
    function init(){
        error_log('INFO [SESSIONCONTROLLER] => init()');
        $this->session = new Session();
        
        $json = $this->getJSONFileConfig();

        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];

        $this->validateSession();
    }
    public function validateSession(){
        error_log('INFO [SESSIONCONTROLLER] => validateSession()');
        if($this->existsSession()){
            $role = $this->getUserSessionData()->getPerfil();
            error_log('INFO [SESSIONCONTROLLER] => validateSession() -> perfil::' .$role);
            // validamos al acceso publico
            if($this->isPublic()){
                $this->redirectDefaultSiteByRole($role);
            }else if(!$this->isAutorized($role)){
                error_log('WARNING [SESSIONCONTROLLER] => validateSession() -> acceso restringido');
                $this->redirectDefaultSiteByRole($role);
                
            }
        } // no existe la session
        else if(!$this->isPublic()){
            // la pagina no es publica
            error_log('WARNING [SESSIONCONTROLLER] => validateSession() -> redireccionando a ' . constant('URL'));
            header('location: ' . constant('URL') . '/');
        }
    }
    public function existsSession(){
        error_log('INFO [SESSIONCONTROLLER] => existsSession()');
        if(!$this->session->exists()) return false;
        if($this->session->getCurrentUser() == null) return false;
        $user = $this->session->getCurrentUser();
        if($user != null) return true;
        return false;
    }
    function getUserSessionData(){
        error_log('INFO [SESSIONCONTROLLER] => getUserSessionData()');
        $this->user = $this->session->getCurrentUser();
        /* $this->user = new UserModel();
        $this->user->getId($user); */
        return $this->user;
    }
    function isPublic(){
        error_log('INFO [SESSIONCONTROLLER] => isPublic()');
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/","",$currentURL);
        for($i = 0 ; $i < sizeof($this->sites) ; $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                return true;
            }
        }
        return false;
    }
    function getCurrentPage(){
        error_log('INFO [SESSIONCONTROLLER] => getCurrentPage()');
        $actualLink = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/' , $actualLink);
        error_log(' INFO [SESSIONCONTROLLER] => getCurrentPage() -> ' . $url[2]);
        return $url[2];
    }
    function initialize($user){
        error_log('INFO [SESSIONCONTROLLER] => initialize()');
        $this->session->setCurrentUser($user); // guardando la session del usuario
        $this->authorizeAccess($user->getPerfil()); // redirigiendole a su pesta??a principal
    }
    function authorizeAccess($role){
        error_log('INFO [SESSIONCONTROLLER] => authorizeAccess() -> perfil =  ' .  $role);
        switch($role){
            case 'cliente':
                $this->redirect($this->defaultSites['cliente'],[]);
                break;
            case 'tecnico':
                $this->redirect($this->defaultSites['tecnico'],[]);
                break;
            case 'colaborador':
                $this->redirect($this->defaultSites['colaborador'],[]);
                break;
        }
    }
    function logout(){
        error_log('INFO [SESSIONCONTROLLER] => SessionController::logout()');
        $this->session->closeSession();
    }
    private function getJSONFileConfig(){
        $string = file_get_contents('config/access.json');
        $json = json_decode($string,true);
        return $json;
    }
    private function redirectDefaultSiteByRole($role){
        error_log('INFO [SESSIONCONTROLLER] => redirectDefaultSiteByRole()');
        $url = '';
        for($i = 0; $i < sizeof($this->sites);$i++){
            if($this->sites[$i]['role'] == $role){
                $url = '/TecnologyServices'. '/' . $this->sites[$i]['site'];
                error_log('INFO [SESSIONCONTROLLER] => redirectDefaultSiteByRole() -> ' . $url);
                break;
            }
        }
        header('location:' . $url);
    }
    private function isAutorized($role){
        error_log('INFO [SESSIONCONTROLLER] => isAutorized()');
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/","",$currentURL);
        for($i = 0 ; $i < sizeof($this->sites) ; $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['role'] == $role){
                return true;
            }
        }
        return false;
    }
}

?>