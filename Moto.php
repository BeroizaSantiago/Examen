<?php
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcIncrAnual;
    private $activa;

    public function __construct($cod, $cost, $anioFab,$descripcion, $porIncrAn, $est){
        $this->codigo = $cod;
        $this->costo = $cost;
        $this->anioFabricacion = $anioFab;
        $this->porcIncrAnual = $porIncrAn;
        $this->activa = $est;
        $this->descripcion = $descripcion;
    }

    public function getCodigo(){
       return $this->codigo;
    }

    public function setCodigo($cod){
        $this->codigo = $cod;
    }

    public function getAnioFabricacion(){
      return  $this->anioFabricacion;
    }

    public function setAnioFabricacion($anioFab){
        $this->anioFabricacion = $anioFab;
    }

    public function getActiva(){
      return  $this->activa;
    }

    public function setActiva($estado){
        $this->activa = $estado;
    }

    public function getCosto(){
      return  $this->costo;
    }

    public function setCosto($cost){
        $this->costo = $cost;
    }

    public function getPorcIncrAnual(){
      return  $this->porcIncrAnual;
    }

    public function setPorcIncrAnual($porIncrAn){
        $this->porcIncrAnual = $porIncrAn;
    }

    public function getDescripcion(){
      return  $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    



    public function __toString(){
        $cadena = "\nCodigo: ". $this->getCodigo() .
                "\nCosto: ". $this->getCosto() .    
                "\nAnio de fabricacion: ". $this->getAnioFabricacion() .   
                "\nDescripcion: ". $this->getDescripcion() .   
                "\nPorcentaje anual: ". $this->getPorcIncrAnual() .    
                "\nActiva: ". $this->getActiva() ;    
                
        return $cadena;
    }


    public function darPrecioVenta(){

        $disponible = $this->getActiva();
        $ret = -1;
        $_venta = 0;
        $_compra = $this->getCosto();
        $_anio = $this->getAnioFabricacion();
        $por_inc_anual = $this->getPorcIncrAnual();

        if($disponible){
            $_venta += $_compra + $_compra * ($_anio * $por_inc_anual);
            $ret = $_venta;
        }


        return $ret;
    }


}
