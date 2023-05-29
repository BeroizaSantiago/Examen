<?php
include_once "Cliente.php";
include_once "Empresa.php";
include_once "Venta.php";
include_once "Moto.php";

//1

$objCliente1 = new Cliente ("Julian","Saes",true,"DNI",41994024);
$objCliente2 = new Cliente ("Agustina","Zalazar",true,"DNI",42664787);


//2
$objMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$objMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);

//4

$colMotos= [$obMoto1, $obMoto2, $obMoto3];
$colClientes= [$objCliente1, $objCliente2 ];
$colVentasRealizadas=[];
$objEmpresa = new Empresa("Alta Gama","AvArgenetina 123",$colMotos,$colClientes,$colVentasRealizadas);

//5
$colCodigosMoto= [11,12,13];
$objEmpresa->registrarVenta($colCodigosMoto, $objCliesnte2);

//6
$colCodigosMoto= [0];
$objEmpresa->registrarVenta($colCodigosMoto, $objCliente2);

//7
$colCodigosMoto= [2];
$objEmpresa->registrarVenta($colCodigosMoto, $objCliente2);

