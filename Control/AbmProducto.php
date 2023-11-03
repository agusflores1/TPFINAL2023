<?php

class AbmProducto {
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    
    public function cargarObjeto($param){
        
        //    echo "entramos a cargar objeto";
        
        $obj = null;
        
        if(array_key_exists('pronombre',$param) && array_key_exists('prodetalle',$param) && array_key_exists('procantstock',$param) && array_key_exists('proimporte', $param)){
            
            $obj = new Producto();
            
            
            
            if(array_key_exists('proimagen', $param)){
                $obj-> setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], $param['proimagen'], $param['proimporte']);
            } else {
                $obj-> setear($param['idproducto'], $param['pronombre'], $param['prodetalle'], $param['procantstock'], null, $param['proimporte']);
            }
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idproducto']) ){
            $obj = new Producto();
            $obj->setear($param['idproducto'],null, null, null, null,null);
            
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        
        $resp = false;
        if (isset($param['idproducto']))
            
            $resp = true;
            return $resp;
    }
    
    /**
     *
     * @param array $param
     */
    public function alta($param){
        
        //echo "entramos a alta";
        
        $resp = false;
        $elObjtProducto = new Producto();
        $elObjtProducto = $this->cargarObjeto($param);
        // verEstructura($elObjtProducto);
        
        // print_R($elObjtProducto);
        if ($elObjtProducto!=null and $elObjtProducto->insertar()){
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
        
        $resp = false;
        
        if ($this->seteadosCamposClaves($param)){
            
            $elObjtProducto = $this->cargarObjetoConClave($param);
            
            if ($elObjtProducto !=null and $elObjtProducto->eliminar()){
                
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
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            //verEstructura($param);  
            $elObjtProducto = $this->cargarObjeto($param);
            
            if($elObjtProducto !=null and $elObjtProducto->modificar()){
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
        
        
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idproducto']))
            $where.=" and idproducto='".$param['idproducto']."'";
            if  (isset($param['pronombre']))
            $where.=" and pronombre ='".$param['pronombre']."'";
            if  (isset($param['prodetalle']))
            $where.=" and prodetalle ='".$param['prodetalle']."'";
            if  (isset($param['procantstock']))
            $where.=" and procantstock ='".$param['procantstock']."'";
            if  (isset($param['proimagen']))
            $where.=" and proimagen ='".$param['proimagen']."'";
            if  (isset($param['proimporte']))
                $where.=" and proimporte ='".$param['proimporte']."'";
        }
        
        $arreglo = Producto::listar($where);
        
        return $arreglo;
    }

    
}
?>