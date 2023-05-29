<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDoc;
    private $nroDoc;

    

    public function __construct($nom, $apell, $estado, $tipoDoc , $nroDoc){
        $this->nombre = $nom;
        $this->apellido = $apell;
        $this->estado = $estado;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;
    }

    public function getNombre(){
       return $this->nombre;
    }

    public function setNombre($nom){
        $this->nombre = $nom;
    }

    public function getApellido(){
       return $this->apellido;
    }

    public function setApellido($apell){
        $this->apellido = $apell;
    }

    public function getEstado(){
       return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getTipoDoc(){
      return  $this->tipoDoc;
    }

    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }

    public function getNroDoc(){
      return  $this->nroDoc;
    }

    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }


    public function __toString(){
        $cadena = "\nNombre: ". $this->getNombre().
                "\nApellido: ". $this->getApellido().
                "\nEstado: ". $this->getEstado().
                "\nTipo de documento: ". $this->getTipoDoc().
                "\nNumero de documento: ". $this->getNroDoc();

        return $cadena;

    }



    
}








