<?php
class AbmMenuRol {
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    
    private function cargarObjeto($param){
        //verEstructura($param);
        $objtMenuRol = null;
        $objRol = null;
        $objMenu = null;
        //print_r($param);
        if( array_key_exists('idrol',$param) and $param['idrol']!=null ){
            $objRol = new Rol();
            $objRol->setIdrol($param['idrol']);
            $objRol->cargar();
        }
        
        if( array_key_exists('idmenu',$param) && $param['idmenu']!=null){
            $objMenu = new Menu();
            $objMenu->setIdmenu($param['idmenu']);
            $objMenu->cargar();
        }
        
        $objMenuRol = new MenuRol();
        $objMenuRol->setear($objMenu, $objRol);
        
        
        return $objMenuRol;
    }
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object
     */
    private function cargarObjetoConClave($param){
        $objMenuRol = null;
        //print_R ($param);
        if( isset($param['idmenu']) && isset($param['idrol']) ){
            $objMenuRol = new MenuRol();
            $objMenuRol->setear($objMenu, $objRol);
        }
        return $objMenuRol;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        
        $resp = false;
        if (isset($param['idmenu']) && isset($param['idrol']));
        
        $resp = true;
        return $resp;
        
    }
    
    /**
     *
     * @param array $param
     */
    public function alta($param){
        
        //  echo "entramos a alta";
        
        $resp = false;
        $objMenuRol = $this->cargarObjeto($param);
        // verEstructura($elObjtAuto);
        
        //print_r($objMenuRol);
        if ($objMenuRol!=null and $objMenuRol->insertar()){
            $resp = true;
        }
        
        return $resp;
    }
    
    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    
    public function baja($param){
        //verEstructura($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            
            $objMenuRol = $this->cargarObjeto($param);
            
            if ($objMenuRol !=null and $objMenuRol->eliminar()){
                
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        //print_R($param);
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            
            $objMenuRol = $this->cargarObjeto($param);
            //verEstructura($objMenuRol);
            if($objMenuRol !=null and $objMenuRol->modificar($param)){
                $resp = true;
                
            }
        }
        return $resp;
    }
    
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    
    public function buscar($param){
       // verEstructura($param);
        
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idmenu']))
                $where.=" and menu.idmenu='".$param['idmenu']."'";
                if  (isset($param['idrol']))
                    $where.=" and menurol.idrol ='".$param['idrol']."'";
                    if  (isset($param['idpadre']))
                        $where.=" and idpadre ='".$param['idpadre']."'";
        }
        
        $arreglo = MenuRol::listar($where);
        //echo $where;
        return $arreglo;
        
    }public function menuesByIdRol($objRol)
    {
        // 1. Obtener el ID del rol
        $param['idRol'] = $objRol->getIdrol();
    
        // 2. Búsqueda de menús por ID de rol
        $objMenuObjRol = $this->buscar($param);
    
        // 3. Inicializar el array para almacenar los resultados finales de menús
        $menuesRoles = [];
    
        // 4. Iterar sobre los resultados de la búsqueda
        foreach ($objMenuObjRol as $objMenuRol) {
            // 5. Procesamiento de Resultados
            if (is_array($objMenuRol)) {
                // 5.1. Iterar sobre el array si el resultado es un array
                foreach ($objMenuRol as $objMR) {
                    // 5.2. Verificar si el menú pertenece al rol deseado
                    if ($objMR->getObjRol()->getIdrol() == $param['idRol']) {
                        // 5.3. Agregar el menú solo si pertenece al rol deseado
                        array_push($menuesRoles, $objMR);
                    }
                }
            } else {
                // 5.4. Verificar si el menú pertenece al rol deseado
                if ($objMenuRol->getObjRol()->getIdrol() == $param['idRol']) {
                    // 5.5. Agregar el menú solo si pertenece al rol deseado
                    array_push($menuesRoles, $objMenuRol);
                }
            }
        }
    
        // 6. Inicializar el array para almacenar los objetos de menú finales
        $menues = [];
    
        // 7. Crear el array final de menús
        foreach ($menuesRoles as $objetos) {
            array_push($menues, $objetos->getObjmenu());
        }
    
        // 8. Retorno del Resultado
        return $menues;
    }
    

}
?>