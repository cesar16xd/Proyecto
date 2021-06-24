<?php

class UbigeoModel extends Model{

    private $idDepartamento;
    private $idProvincia;
    private $idDistrito;
    private $nombre;

    public function __construct(){
        parent::__construct();
        $this->idDepartamento = 0;
        $this->idProvincia = 0;
        $this->idDistrito = 0;
        $this->nombre ='';
    }

    public function getDepartamento(){
        error_log('INFO [UBIGEOMODEL] => getDepartamento()');
        $items = [];
        try{
            $query = $this->query('SELECT * FROM departamento');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UbigeoModel();
                $item->setIdDepartamento($p['idDepartamento']);
                $item->setNombre($p['nombre']);
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ERROR [UBIGEOMODEL] => getDepartamento() -> PDOException ' . $e);
        }
    }

    public function getProvincia($id){
        error_log('INFO [UBIGEOMODEL] => getProvincia()');
        $items = [];
        try{
            $query = $this->prepare('SELECT * FROM provincia WHERE idDepartamento = :idDepartamento');
            $query->execute([
                'idDepartamento' => $id
            ]);
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UbigeoModel();
                $item->setIdProvincia($p['idProvincia']);
                $item->setNombre($p['nombre']);

                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ERROR [UBIGEOMODEL] => getProvincia() -> PDOException ' . $e);
        }
    }

    public function getDistrito($id){
        error_log('INFO [UBIGEOMODEL] => getDistrito()');
        $items = [];
        try{
            $query = $this->prepare('SELECT * FROM distrito WHERE idProvincia = :idProvincia');
            $query->execute([
                'idProvincia' => $id
            ]);
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UbigeoModel();
                $item->setIdDistrito($p['idDistrito']);
                $item->setNombre($p['nombre']);

                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ERROR [UBIGEOMODEL] => getDistrito() -> PDOException ' . $e);
        }
    }

    public function setIdDepartamento($idDepartamento){   $this->idDepartamento = $idDepartamento;}
    public function setIdProvincia($idProvincia){   $this->idProvincia = $idProvincia;}
    public function setIdDistrito($idDistrito){   $this->idDistrito = $idDistrito;}
    public function setNombre($nombre){   $this->nombre = $nombre;}

    public function getIdDepartamento(){   return $this->idDepartamento  ;}
    public function getIdProvincia(){   return $this->idProvincia  ;}
    public function getIdDistrito(){      return $this->idDistrito     ;}
    public function getNombre(){  return $this->nombre ;}

}


?>
