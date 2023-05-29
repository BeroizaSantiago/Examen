<?php
class Venta{
    private $numero;
    private $fecha;
    private $refCliente;
    private $refColMotos;
    private $precioFinal;


    public function __construct($num,$fech,$cliente,$motos,$precio){
        $this->numero = $num;
        $this->fecha = $fech;
        $this->refCliente = $cliente;
        $this->refColMotos [] = $motos;
        $this->precioFinal = $precio;
    }

    public function getNumero(){
       return $this->numero;
    }

    public function setNumero($num){
        $this->numero = $num;
    }

    public function getFecha(){
       return $this->fecha;
    }

    public function setFecha($fech){
        $this->fecha = $fech;
    }

    public function getRefCliente(){
       return $this->refCliente;
    }

    public function setRefCliente($cliente){
        $this->refCliente = $cliente;
    }

    public function getRefColMotos(){
      return  $this->refColMotos;
    }

    public function setRefColMotos($motos){
        $this->refColMotos[] = $motos;
    }

    public function getPrecioFinal(){
      return  $this->precioFinal;
    }

    public function setPrecioFinal($precio){
        $this->precioFinal = $precio;
    }


    function verMotos() {
        $colMotos = $this->getRefColMotos();
        if (!empty($colMotos)) {
          echo "Motos en la colección:\n";
          foreach ($colMotos as $moto) {
            echo $moto;
            echo "\n";
          }
        } else {
          echo "La colección de motos está vacía.\n";
        }
    }

    public function __toString(){
        $cadena = "\nNumero: ". $this->getNumero().
                "\nFecha: ". $this->getFecha().
                "\nCliente: ". $this->getRefCliente().
                "\nMoto: ". $this->verMotos().
                "\nPrecio Final: ". $this->getPrecioFinal() ;

        return $cadena;
    }


    public function incorporarMoto($objMoto){
        $estadoMoto = $objMoto->getActiva();
        $colMotos = $this->getRefColMotos();
        $precioActual = $this->getPrecioFinal();
        $precioNuevo = 0;
    
        if($estadoMoto){
            //push
            $colMotos[] = $objMoto;
            $precioNuevo = $objMoto->darPrecioVenta();
            $this->setRefColMotos($colMotos);

            if($precioNuevo>0){
                $precioActual = $precioNuevo;
                $this->setPrecioFinal($precioActual);
            }
        }


    }


}