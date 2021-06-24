<?php
include_once 'libs/imodel.php';
class Model{
    private $msgRpta;
    private $codRpta;
    function __construct(){
        $this->db = new Database();
    }

    function query($query){
        return $this->db->connect()->query($query);
    }
    
    function prepare($query){
        return $this->db->connect()->prepare($query);
    }

    public function setMsgRpta($msgRpta){   $this->msgRpta = $msgRpta;}
    public function setCodRpta($codRpta){   $this->codRpta = $codRpta;}

    public function getMsgRpta(){   return $this->msgRpta  ;}
    public function getCodRpta(){   return $this->codRpta  ;}
}

?>