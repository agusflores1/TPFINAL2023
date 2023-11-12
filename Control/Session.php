<?php
class Session{
    private $objUsuario;
    private $listaRoles;
    private $mensajeoperacion;
    
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        $this->objUsuario = null;
        $this->listaRoles = [];
        $this->mensajeoperacion = "";
    }
    

    public function getObjUsuario()
    { return $this->objUsuario;}

    public function setObjUsuario($objUsuario)
    {$this->objUsuario = $objUsuario; }

    public function getListaRoles()
    { return $this->listaRoles; }

    public function setListaRoles($listaRoles)
    { $this->listaRoles = $listaRoles;}

    public function getMensajeoperacion()
    {return $this->mensajeoperacion;}

    public function setMensajeoperacion($mensajeoperacion)
    {$this->mensajeoperacion = $mensajeoperacion; }

    public function iniciar($usu, $pass) {
        $resp = false;
        $abmUsuario = new AbmUsuario();
        $where = ['usnombre' => $usu, 'uspass' => $pass, 'usdehabilitado IS NULL'];
        $listaUsuarios = $abmUsuario->buscar($where);
        if (count($listaUsuarios) > 0) {
            // Guardar el ID de usuario en la sesión
            $_SESSION['idusuario'] = $listaUsuarios[0]->getIdUsuario();
    
            // Obtener roles del usuario
            $listaRolesUsu = $this->getRol();
            // Guardar los roles en la sesión
            $_SESSION['roles'] = $listaRolesUsu; //devuekve un obj 
            
            $resp = true;
        } else {
            $this->cerrar();
        }
    
        return $resp;
    }
    
    

    
    public function validar(){
        $inicia=false;
        if(isset($_SESSION['idusuario']) && $this->activa()){
           $inicia=true;
        }
        return $inicia;
    }


    public function activa(){
        $activa=false;
        if(session_status()===PHP_SESSION_ACTIVE){
            $activa=true;
        }
        return $activa;
    }
    
    public function getUsuario(){
        if($this->validar())
        {  $abmUsuario=new AbmUsuario();
           $where =['usnombre'=>$_SESSION['nombreUsu'],'idusuario'=>$_SESSION['idusuario']];
           $listaUsuarios=$abmUsuario->buscar($where);
        if($listaUsuarios>=1){
            $usuarioLog=$listaUsuarios[0];
            $this->setObjUsuario($listaUsuarios[0]);
        }}
        return $usuarioLog;
    }
    
    public function getRol(){
        $idRoles = [];  // Inicializamos el array de IDs de roles
    
        if($this->validar()){
            $abmUsuarioRol = new AbmUsuarioRol();
            $param['idusuario'] = $_SESSION['idusuario'];
            $listaRolesUsu = $abmUsuarioRol->buscar($param);
    
            foreach ($listaRolesUsu as $usuarioRol) {
                // Acceder al ID del rol dentro del objeto UsuarioRol
                //$idRoles[] = $usuarioRol->getObjRol()->getIdRol();
                $idRoles[] = $usuarioRol->getObjRol();
            }
        }
    
        // Establecer los roles en la instancia actual (ajusta según sea necesario)
        $this->setListaRoles($idRoles);
    
        return $idRoles;
    }
    
    public function cerrar(){
        $cerrar=true;
        session_destroy();
        return $cerrar;
    }
}

