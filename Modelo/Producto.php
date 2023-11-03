<?php
class Producto {
    
    private $idproducto;
    private $pronombre;
    private $prodetalle;
    private $procantstock;
    private $proimagen;
    private $proimporte;
    private $mensajeoperacion;
    
    public function __construct(){
        
        $this->idproducto="";
        $this->pronombre="";
        $this->prodetalle="";
        $this->procantstock="";
        $this->proimagen="";
        $this->proimporte="";
        $this->mensajeoperacion="";
        
    }
    
    public function setear($idproducto, $pronombre, $prodetalle, $procantstock, $proimagen , $proimporte)    {
        
        $this->setIdproducto($idproducto);
        $this->setPronombre($pronombre);
        $this->setProdetalle($prodetalle);
        $this->setProcantstock($procantstock);
        $this->setProimagen($proimagen);
        $this->setProimporte($proimporte);
        
    }
    
    // METODOS DE ACCESO GET
    
    public function getIdproducto(){
        return $this->idproducto;
    }
    
    public function getPronombre(){
        return $this->pronombre;
    }
    
    public function getProdetalle(){
        return $this->prodetalle;
    }
    
    public function getProcantstock(){
        return $this->procantstock;
    }
    
    public function getProimagen(){
        return $this->proimagen;
    }
    
    public function getProimporte(){
        return $this->proimporte;
    }
    
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
    }
    
    
    // METODOS DE ACCESO SET
    
    public function setIdproducto($valor){
        $this->idproducto = $valor;
    }
    
    public function setPronombre($valor){
        $this->pronombre = $valor;
    }
    
    public function setProdetalle($valor){
        $this->prodetalle = $valor;
    }
    
    public function setProcantstock($valor){
        $this->procantstock = $valor;
    }
    
    public function setProimagen($valor){
        $this->proimagen = $valor;
    }
    
    public function setProimporte($valor){
        $this->proimporte= $valor;
    }
    
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM producto WHERE idproducto= ". $this->getIdproducto();
        //echo $sql;
        
        if ($base->Iniciar()) {
            
            $res = $base->Ejecutar($sql);
            
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['proimagen'],$row['proimporte']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("producto->listar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO producto (pronombre, prodetalle, procantstock, proimporte, proimagen) VALUES ('".$this->getPronombre()."','".$this->getProdetalle()."',".$this-> getProcantstock().",".$this -> getProimporte()."";
       
        if ($this->getProimagen()!=null && $this->getProimagen()!='null'){
            
            $sql.= ",'".$this->getProimagen()."'";
        }else {
            $sql.=',null';
        }
        $sql.= ");";
       // echo $sql;
        if ($base->Iniciar()) {
            
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdProducto($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("producto->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("producto->insertar: ".$base->getError());
        }
        
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE producto SET pronombre='".$this->getPronombre()."', prodetalle='".$this->getProdetalle()."', procantstock=".$this->getProcantstock().", proimagen='".$this->getProimagen()."', proimporte=".$this->getProimporte()."";
        $sql.= " WHERE idproducto=".$this->getIdproducto()."";
        //echo $sql;
        
        if ($base->Iniciar()) {
            
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("producto->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("producto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM producto WHERE idproducto='". $this->getIdproducto()."'";
        //echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("producto->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("producto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM producto ";
        
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        
        //echo $sql;
        
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while ($row = $base->Registro()){
                    
                    $obj = new Producto();
                    $obj->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['proimagen'], $row['proimporte']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            //     $this->setmensajeoperacion("persona->listar: ".$base->getError());
        }
        return $arreglo;
    }
    
}