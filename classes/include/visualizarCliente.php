<?php
include_once("../classes/Cliente.php");
if (isset($_SESSION['administrador'])){
?>
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Clientes</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf-cliente" aria-describedby="cpfHelp" name="cpfCliente">
                            <div id="cpf" class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Clientes</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nome" class="form-label">NOME</label>
                            <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeCliente">
                            <div id="nome" class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$objCliente = new Cliente();
$objCliente->selecionarPorId(11);

if (isset($_GET['id'])) {
    $objCliente->selecionarPorId($_GET['id']);
} else if (isset($_POST['cpfCliente'])) {
    $objCliente->selecionarPorCPF($_POST['cpfCliente']);
} else if (isset($_POST['nomeCliente'])) {
    $objCliente->selecionarPorNome($_POST['nomeCliente']);
} else {
    $objCliente->selecionarClientes();
}

if ($objCliente->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Nome</th>
                    <th width="20%">Email</th>
                    <th width="10%">CPF</th>
                    <th width="10%">Endereço</th>
                    <th width="15%">Celular</th>
                    <th width="10%">Editar</th>
                    <th width="10%">Deletar</th>
                </tr>

                <?php

                while ($retorno = $objCliente->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->id_cliente . '</td><td>' .
                        $retorno->nome_cliente . '</td><td>' .
                        $retorno->email_cliente . '</td><td>' .
                        $retorno->cpf_cliente .  '</td><td>' .
                        $retorno->endereco_cliente .  '</td><td>' .
                        $retorno->celular_cliente . '</td>';

                    echo '<td><a href="?rota=editar_cliente&id='.$retorno->id_cliente.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarCliente("' . $retorno->id_cliente . '")\';><i class="fas fa-trash"></i></a></td></tr>';
                }

                ?>
            </table>
        </div>
    </div>
<?php
}
}else{
    header("Location:../index.php");
}
?>