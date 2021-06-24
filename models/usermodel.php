<?php
class UserModel extends Model implements IModel{
    
    private $idUsuario;
    private $idPersona;
    private $correo;
    private $contraseña;
    private $imgPerfil;
    private $estado;
    private $perfil;
    private $persona;

    public function __construct(){
        parent::__construct();
        $this->idPersona = 0;
        $this->correo = '';
        $this->contraseña = '';
        $this->imgPerfil = 'public/img/perfil/userDefecto.png';
        $this->estado = 0;
        $this->perfil = 0;
        $this->persona = new PersonaModel();
    }
    public function save(){
        error_log('INFO [USERMODEL] => save()');
        $estadoUsuario = 1;
        if($this->perfil != 100) $this->estado = 0;
        else $this->estado = 1;
        try{
            // insert table USUARIO 
            $query = $this->prepare('INSERT INTO usuario values(null,:idPersona, :correo, :contrasena, :estado, :imgPerfil)');
            $query->execute([
                'idPersona' => $this->idPersona,
                'correo'    => $this->correo,
                'contrasena'=> $this->contraseña,
                'imgPerfil' => $this->imgPerfil,
                'estado'    => $estadoUsuario
            ]);
            $this->idUsuario = $this->getUsuarioExits($this->correo)->getIdUsuario();
            $query = $this->prepare('INSERT INTO usuarioperfil values(:idUsuario, :idPerfil, :estado , null)');
            $query->execute([
                'idUsuario' => $this->idUsuario,
                'idPerfil'  => $this->perfil,
                'estado'    => $this->estado
            ]);
            return true;
        }catch(PDOException $e){
            error_log('ERROR [USERMODEL] => save() -> PDOException ' . $e);
            return false;
        }
    }
    public function getUsuarioExits($correo){
        error_log('INFO [USERMODEL] => getUsuarioExits()');
        $usuario = new UserModel();
        try{
            $query = $this->prepare('SELECT * FROM usuario WHERE correo = :correo');
            $query->execute([
                'correo' => $correo
            ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $usuario->setIdUsuario($user['idUsuario']);
            $usuario->setIdPersona($user['idPersona']);
            $usuario->setCorreo($user['correo']);
            $usuario->setContraseña($user['contraseña']);
            $usuario->setImgPerfil($user['imgPerfil']);
            $usuario->setEstado($user['estado']);
            return $usuario;
        }catch(PDOException $e){
            error_log('ERROR [USERMODEL] => getUsuarioExits() -> PDOException ' . $e);
            return null;
        }
    }
    public function getAll(){
        error_log('INFO [USERMODEL] => getAll()');
        $items = [];
        try{
            $query = $this->query('SELECT * FROM usuario');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setIdUsuario($p['idUsuario']);
                $item->setIdPersona($p['idPersona']);
                $item->setCorreo($p['correo']);
                $item->setContraseña($p['contraseña']);
                $item->setImgPerfil($p['imgPerfil']);
                $item->setEstado($p['estado']);
                $item->setPerfil($p['perfil']);

                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            error_log('ERROR [USERMODEL] => getAll() -> PDOException ' . $e);
        }
    }
    public function getId($user){
        error_log('INFO [USERMODEL] => getId()');
        try{
            $query = $this->prepare('SELECT U.idUsuario,U.idPersona,U.correo,
                                        U.contraseña,U.imgPerfil,P.descripcion,U.estado
                                        FROM usuario U 
                                        INNER JOIN usuarioperfil UP 
                                            ON U.idUsuario = UP.idUsuario
                                        INNER JOIN perfil P
                                            ON P.idPerfil = UP.idPerfil
                                    WHERE U.idUsuario = :idUsuario AND UP.idPerfil = :perfil');
            $query->execute([
                'idUsuario' => $user->getIdUsuario(),
                'perfil' => $user->getPerfil()
            ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->setIdUsuario($user['idUsuario']);
            $this->setIdPersona($user['idPersona']);
            $this->setCorreo($user['correo']);
            $this->setContraseña($user['contraseña']);
            $this->setImgPerfil($user['imgPerfil']);
            $this->setEstado($user['estado']);
            $this->setPerfil($user['descripcion']);
            return $user;

        }catch(PDOException $e){
            error_log('ERROR [USERMODEL] => getId()-> PDOException ' . $e);
        }
    }
    public function deleteId($idUsuario){
        error_log('UserModel::deleteId()');
        try{
            $query = $this->prepare('DELETE FROM usuario WHERE idUsuario = :idUsuario');
            $query->execute([
                'idUsuario' => $idUsuario
            ]);
        }catch(PDOException $e){
            error_log('USERMODEL::deleteId()-> PDOException ' . $e);
        }
    }
    public function updateData(){
        error_log('UserModel::updateData()');
        try{
            $query = $this->prepare('UPDATE usuario SET correo :correo,imgPerfil :imgPerfil Where idUsuario : :idUsuario');
            $query->execute([
                'idUsuario' => $this->idUsuario,
                'correo'    => $this->correo,
                'imgPerfil' => $this->imgPerfil
            ]);
            return true;

        }catch(PDOException $e){
            error_log('USERMODEL::update()-> PDOException ' . $e);
            return false;
        }
    }
    public function from($array){
        error_log('UserModel::from()');
        $this->idUsuario    = $array['idUsuario'];
        $this->idPersona    = $array['idPersona'];
        $this->correo       = $array['correo'];
        $this->contraseña   = $array['contraseña'];
        $this->imgPerfil    = $array['imgPerfil'];
        $this->estado       = $array['estado'];
        $this->perfil       = $array['idPerfil'];
    }
    public function exists($correo){
        error_log('INFO [USERMODEL] => exists()');
        try{
            $query = $this->prepare('SELECT COUNT(*) as total FROM usuario WHERE correo = :correo');
            $query->execute([
                'correo' => $correo
            ]);
            $Data = $query->fetch(PDO::FETCH_ASSOC);
            if($Data['total'] >= 1){
                return true;
            }
            else{
                return false;
            }
        }catch(PDOException $e){
            error_log('ERROR [USERMODEL] => exists() -> PDOException ' . $e);
            return false;
        }
    }
    function login($correo, $password , $perfilCuenta){
        error_log('UserModel::login()');
        $user = new UserModel();
        $persona = new PersonaModel();
        try{
            $query = $this->prepare(
                'SELECT * FROM usuario U 
                    INNER JOIN persona P 
                        ON P.idPersona = U.idPersona
                    INNER JOIN usuarioperfil UP 
                        ON U.idUsuario=UP.idUsuario
                WHERE U.correo = :correo AND UP.idPerfil = :perfilCuenta' );
            $query->execute(['correo' => $correo , 'perfilCuenta' => $perfilCuenta]);

            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC);
                $user->from($item);
                $persona->from($item);
                $user->setPersona($persona);
                if(password_verify($password,$user->getContraseña())){
                    error_log('Success::USERMODEL::login() -> INGRESO EXISTOSAMENTE');
                    $user->setCodRpta(1);
                    return $user;
                }
                else{
                    error_log('Error::USERMODEL::login() -> CONTRASEÑA NO SON IGUALES');
                    $user->setCodRpta(2);
                    return $user;
                }
            }else{
                error_log('Error::USERMODEL::login() -> NO EXISTE EL USUARIO');
                $user->setCodRpta(2);
                return $user;
            }
        }catch(PDOException $e){
            error_log('Error::USERMODEL::login() -> error exception ' . $e);
            return null;
        }
    }

    public function setIdUsuario($idUsuario){   $this->idUsuario = $idUsuario;}
    public function setIdPersona($idPersona){   $this->idPersona = $idPersona;}
    public function setCorreo($correo){         $this->correo = $correo;}
    public function setImgPerfil($imgPerfil){   $this->imgPerfil = $imgPerfil;}
    public function setEstado($estado){         $this->estado = $estado;}
    public function setPerfil($perfil){         $this->perfil = $perfil;}
    public function setPersona($persona){       $this->persona = $persona;}
    public function setContraseña($contraseña){ $this->contraseña = $this->getHashedContraseña($contraseña); }

    public function getIdUsuario(){   return $this->idUsuario  ;}
    public function getIdPersona(){   return $this->idPersona  ;}
    public function getCorreo(){      return $this->correo     ;}
    public function getContraseña(){  return $this->contraseña ;}
    public function getImgPerfil(){   return $this->imgPerfil  ;}
    public function getEstado(){      return $this->estado     ;}
    public function getPerfil(){      return $this->perfil     ;}
    public function getPersona(){      return $this->persona   ;}

   
    private function getHashedContraseña($contraseña){
        return password_hash($contraseña, PASSWORD_DEFAULT,['cost' => 10]);
    }

}
?>