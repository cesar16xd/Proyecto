<?php

class PersonaModel extends Model implements IModel {

    private $idPersona;
    private $idDistrito;
    private $nombres;
    private $apPaterno;
    private $apMaterno;
    private $direccion;
    private $celular;
    private $regDate;
    private $tipoDoc;
    private $numDoc;

    public function __construct(){
        parent::__construct();
        $this->idPersona = 0;
        $this->idDistrito = 0;
        $this->nombres = '';
        $this->apPaterno = '';
        $this->apMaterno = '';
        $this->direccion = '';
        $this->celular = '';
        $this->regDate = '';
    }
    public function save(){
        error_log('INFO [PERSONAMODEL] => save()');
        try{
            $this->regDate = date('Y-m-d H:i:s');
            $query = $this->prepare('INSERT INTO persona 
                            values(null,:idDistrito, :nombres,
                                   :apPaterno, :apMaterno, :direccion,
                                    :celular, :regDate , :tipoDocumento , 
                                    :numDocumento )');
            $query->execute([
                'idDistrito' => $this->idDistrito,
                'nombres'    => $this->nombres,
                'apPaterno'=> $this->apPaterno,
                'apMaterno' => $this->apMaterno,
                'direccion'    => $this->direccion,
                'celular'    => $this->celular,
                'regDate'    => $this->regDate,
                'tipoDocumento'    => $this->tipoDoc,
                'numDocumento'    => $this->numDoc
            ]);
            return true;
        }catch(PDOException $e){
            error_log('ERROR [PERSONAMODEL] => save() -> PDOException ' . $e);
            return false;
        }
    }
    public function getAll(){
        error_log('INFO [PERSONAMODEL] => getAll()');
        $items = [];
        try{
            $query = $this->query('SELECT * FROM persona');
            while($persona = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new PersonaModel();
                $item->setIdPersona($persona['idPersona']);
                $item->setIdDistrito($persona['idDistrito']);
                $item->setNombres($persona['nombres']);
                $item->setApPaterno($persona['apPaterno']);
                $item->setApMaterno($persona['apMaterno']);
                $item->setDireccion($persona['direccion']);
                $item->setCelular($persona['celular']);
                $item->setRegDate($persona['regDate']);
                $item->setTipoDoc($persona['tipoDoc']);
                $item->setNumDoc($persona['numDoc']);

                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ERROR [PERSONAMODEL] => getAll() -> PDOException ' . $e);
        }
    }
    public function getId($idPersona){
        error_log('INFO [PERSONAMODEL] => getId()');
        try{
            $query = $this->prepare('SELECT * FROM persona WHERE idPersona = :idPersona');
            $query->execute([
                'idPersona' => $idPersona
            ]);
            $persona = $query->fetch(PDO::FETCH_ASSOC);
            $this->setIdPersona($persona['idPersona']);
            $this->setIdDistrito($persona['idDistrito']);
            $this->setNombres($persona['nombres']);
            $this->setApPaterno($persona['apPaterno']);
            $this->setApMaterno($persona['apMaterno']);
            $this->setDireccion($persona['direccion']);
            $this->setCelular($persona['celular']);
            $this->setRegDate($persona['regDate']);
            $this->setTipoDoc($persona['tipoDoc']);
            $this->setNumDoc($persona['numDoc']);
            return $this;

        }catch(PDOException $e){
            error_log('ERROR [PERSONAMODEL] => getId() -> PDOException ' . $e);
            return null;
        }
    }
    public function getNumDocumento($numDoc){
        error_log('INFO [PERSONAMODEL] => getNumDocumento()');
        try{
            $query = $this->prepare('SELECT * FROM persona WHERE numDoc = :numDoc');
            $query->execute([
                'numDoc' => $numDoc
            ]);
            $persona = $query->fetch(PDO::FETCH_ASSOC);
            $this->setIdPersona($persona['idPersona']);
            $this->setIdDistrito($persona['idDistrito']);
            $this->setNombres($persona['nombres']);
            $this->setApPaterno($persona['apPaterno']);
            $this->setApMaterno($persona['apMaterno']);
            $this->setDireccion($persona['direccion']);
            $this->setCelular($persona['celular']);
            $this->setRegDate($persona['regDate']);
            $this->setTipoDoc($persona['tipoDoc']);
            $this->setNumDoc($persona['numDoc']);
            return $this;
        }catch(PDOException $e){
            error_log('ERROR [PERSONAMODEL] => getNumDocumento() -> PDOException ' . $e);
            return null;
        }
    }
    public function deleteId($id){
        error_log('INFO [PERSONAMODEL] => deleteId()');

    }
    public function updateData(){
        error_log('INFO [PERSONAMODEL] => updateData()');
    }
    public function from($array){
        error_log('INFO [PERSONAMODEL] => from()');
        $this->idPersona = $array['idPersona'];
        $this->idDistrito = $array['idDistrito'];
        $this->nombres = $array['nombres'];
        $this->apPaterno = $array['apPaterno'];
        $this->apMaterno = $array['apMaterno'];
        $this->direccion = $array['direccion'];
        $this->celular = $array['celular'];
        $this->regDate = $array['regDate'];
        $this->tipoDoc = $array['tipoDoc'];
        $this->numDoc = $array['numDoc'];

    }
    public function exists($numDoc){
        error_log('INFO [PERSONAMODEL] => exists()');
        try{
            $query = $this->prepare('SELECT COUNT(*) as total FROM persona WHERE numDoc = :numDoc');
            $query->execute([
                'numDoc' => $numDoc
            ]);
            $Data = $query->fetch(PDO::FETCH_ASSOC);
            if($Data['total'] >= 1){
                return true;
            }
            else{
                return false;
            }
        }catch(PDOException $e){
            error_log('ERROR [PERSONAMODEL] => exists() -> PDOException ' . $e);
            return false;
        }
    }
    public function setIdPersona($idPersona){   $this->idPersona = $idPersona;}
    public function setIdDistrito($idDistrito){ $this->idDistrito = $idDistrito;}
    public function setNombres($nombres){       $this->nombres = $nombres;}
    public function setApPaterno($apPaterno){   $this->apPaterno = $apPaterno;}
    public function setApMaterno($apMaterno){   $this->apMaterno = $apMaterno;}
    public function setDireccion($direccion){   $this->direccion = $direccion;}
    public function setCelular($celular){       $this->celular = $celular;}
    public function setRegDate($regDate){       $this->regDate = $regDate;}
    public function setTipoDoc($tipoDoc){       $this->tipoDoc = $tipoDoc;}
    public function setNumDoc($numDoc){       $this->numDoc = $numDoc;}
    

    public function getIdPersona(){   return $this->idPersona ;}
    public function getIdDistrito(){  return $this->idDistrito ;}
    public function getNombres(){     return $this->nombres ;}
    public function getApPaterno(){   return $this->apPaterno ;}
    public function getApMaterno(){   return $this->apMaterno ;}
    public function getDireccion(){   return $this->direccion ;}
    public function getCelular(){     return $this->celular ;}
    public function getRegDate(){     return $this->regDate ;}
    public function getTipoDoc(){     return $this->tipoDoc ;}
    public function getNumDoc(){     return $this->numDoc ;}



}

?>