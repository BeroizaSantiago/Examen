<?php
class Empresa{

    private $denominación;
    private $dirección;
    private $clientes;
    private $motos;
    private $ventas;

    public function __construct($den,$direc,$cliente,$moto,$ventas){
        $this->denominación = $den;
        $this->dirección = $direc;
        $this->clientes []= $cliente;
        $this->motos [] = $moto;
        $this->ventas []= $ventas;
    }

    public function getDenominacion(){
       return $this->denominación;
    }

    public function setDenominacion($den){
        $this->denominación = $den;
    }

    public function getDirección(){
       return $this->dirección;
    }

    public function setDirección($direc){
        $this->dirección = $direc;
    }

    public function getClientes(){
      return  $this->clientes;
    }

    public function setClientes($cliente){
        $this->clientes []= $cliente;
    }

    public function getMotos(){
      return  $this->motos;
    }

    public function setMotos($moto){
        $this->motos []= $moto;
    }

    public function getVentas(){
      return  $this->ventas;
    }

    public function setVentas($ventas){
        $this->ventas []= $ventas;
    }

    function verMotos() {
        $colMotos = $this->getMotos();
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

    function verClientes() {
        $colClientes = $this->getClientes();
        if (!empty($colClientes)) {
          echo "Clientes en la colección:\n";
          foreach ($colClientes as $cliente) {
            echo $cliente;
            echo "\n";
          }
        } else {
          echo "La colección de clientes está vacía.\n";
        }
    }

    function verVentas() {
        $colVentas = $this->getVentas();
        if (!empty($colVentas)) {
          echo "Ventas en la colección:\n";
          foreach ($colVentas as $venta) {
            echo $venta;
            echo "\n";
          }
        } else {
          echo "La colección de ventas está vacía.\n";
        }
      }
      

    public function __toString(){
        $cadena = "\Denominacion: ". $this->getDenominacion().
        "\nDiereccion: ". $this->getDirección().
        "\nClientes: ". $this->verClientes().
        "\nMotos: ". $this->verMotos().
        "\nVentas: ". $this->verVentas() ;

        return $cadena;
    }


//que recorre la colección de motos de la Empresa y 
//retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
     
    public function retornarMoto($codigoMoto){
        $motoCoincidencia = "";
        $corte = true;
        foreach ($this->getMotos()as $moto){
            if($corte){
                if($moto->getCodigo() == $codigoMoto){
                    $motoCoincidencia = $moto;
                    $corte = false;
                }
            }
           
        }

        return $motoCoincidencia;
    }


    /*método que recibe por parámetro una colección de códigos de motos, la cual es recorrida,
    y por cada elemento de la colección se busca el objeto moto correspondiente al código 
    y se incorpora a la colección de motos de la instancia Venta que debe ser creada.
    Recordar que no todos los clientes ni todas las motos, están disponibles para 
    registrar una venta en un momento determinado.*/

    public function registrarVenta($colCodigosMoto, $objCliente){
        $moto=$this->getMotos();
        $retornMoto = "";
        $colMotosVentas = $this->getVentas();

        if($objCliente->getEstado() && $moto->getActiva()){
            foreach($colCodigosMoto as $codigo){
                $retornMoto = $moto->retornarMoto($codigo);
                $colMotosVentas->incorporarMoto($retornMoto);
                $colMotosVentas->setRefColMotos($retornMoto);
            }
  
        }

        return $retornMoto;

    }

    /*recibe por parámetro el tipo y número de documento de un Cliente y 
    retorna una colección con las ventas realizadas al cliente. */

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = [];
        $corte = true;
    
        foreach($this->getClientes() as $cliente){
            if($corte){
                if($cliente->getTipoDoc() == $tipo && $cliente->getNroDoc() == $numDoc){
                    foreach($this->getVentas() as $ventas){
                        if($ventas->getRefCliente() == $cliente){
                            $ventasCliente[]= $ventas->__toString();
                            $corte = false;
                        }
                    }
                }
    
            }

        }

        return $ventasCliente;

    }





}