<?php
include_once("../classes/Cliente.php");
include_once("../classes/Animal.php");
include_once("../classes/ConsultaPet.php");


$objCliente = new Cliente();
$objAnimal = new Animal();
$objConsulta = new ConsultaPet();

if(isset($_POST['idClienteDeletar'])){
    $objCliente = new Cliente();
    $objCliente->deletar($_POST['idClienteDeletar']);
}

if(isset($_POST['idAnimalDeletar'])){
    $objAnimal = new Animal();
    $objAnimal->deletar($_POST['idAnimalDeletar']);
}

if(isset($_POST['idConsultaDeletar'])){
    $objConsulta = new ConsultaPet();
    $objConsulta->deletar($_POST['idConsultaDeletar']);
}
