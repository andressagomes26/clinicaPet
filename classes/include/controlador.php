<?php
include_once("../classes/Cliente.php");
include_once("../classes/Animal.php");
include_once("../classes/ConsultaPet.php");

//Get
if (isset($_GET['rota'])) {
    switch ($_GET['rota']) {
        case "cadastrar_cliente":
            include("../include/cadastrarCliente.php");
            break;

        case "visualizar_cliente":
            include("../include/visualizarCliente.php");
            break;

        case "editar_cliente":
            include("../include/editarCliente.php");
            break;
        
        case "cadastrar_animal":
            include("../include/cadastrarAnimal.php");
            break;

        case "visualizar_animal":
            include("../include/visualizarAnimal.php");
            break;

        case "editar_animal":
            include("../include/editarAnimal.php");
            break;

        case "cadastrar_consulta":
            include("../include/cadastrarConsulta.php");
            break;

        case "visualizar_consulta":
            include("../include/visualizarConsulta.php");
            break;

        case "editar_consulta":
            include("../include/editarConsulta.php");
            break;
    }
}


//Post
if (isset($_POST['formCadastrarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setEndereco($_POST['enderecoCliente']);
    $objCliente->setCelular($_POST['celularCliente']);

    $objCliente->cadastrar();

} else if (isset($_POST['formEditarCliente'])) {
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setEndereco($_POST['enderecoCliente']);
    $objCliente->setCelular($_POST['celularCliente']);
    $objCliente->setID($_POST['idCliente']);
    $objCliente->editar();

} else if (isset($_POST['formCadastrarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setRaca($_POST['racaAnimal']);
    $objAnimal->setNomeDono($_POST['nomeCliente']);
    $objAnimal->cadastrar();

} else if (isset($_POST['formEditarAnimal'])) {
    $objAnimal = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setRaca($_POST['racaAnimal']);
    $objAnimal->setNomeDono($_POST['nomeCliente']);
    $objAnimal->setID($_POST['idAnimal']);
    $objAnimal->editar();

} else if (isset($_POST['formCadastrarConsulta'])) {
    $objConsulta = new ConsultaPet();
    $objConsulta->setNome($_POST['nomeAnimal']);
    $objConsulta->setNomeDono($_POST['nomeCliente']);
    $objConsulta->setData($_POST['dataConsulta']);
    $objConsulta->setHora($_POST['horaConsulta']);
    $objConsulta->setObservacao($_POST['obsConsulta']);

    $objConsulta->cadastrar();

} else if (isset($_POST['formEditarConsulta'])) {
    $objConsulta = new ConsultaPet();
    $objConsulta->setNome($_POST['nomeAnimal']);
    $objConsulta->setNomeDono($_POST['nomeCliente']);
    $objConsulta->setData($_POST['dataConsulta']);
    $objConsulta->setHora($_POST['horaConsulta']);
    $objConsulta->setObservacao($_POST['obsConsulta']);
    $objConsulta->setID($_POST['idconsulta']);
    $objConsulta->editar();

} 