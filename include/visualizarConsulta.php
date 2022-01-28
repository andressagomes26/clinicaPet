<?php
include_once("../classes/Animal.php");
if (isset($_SESSION['administrador'])){
?>
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Consultas</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome PET</label>
                            <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeHelp" name="nomeAnimal">
                            <div id="nome" class="form-text"></div>
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
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Consultas</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nomeCliente" class="form-label">Nome do Dono</label>
                            <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeCliente">
                            <div id="nomeCliente" class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
$objConsulta = new ConsultaPet();
$objConsulta->selecionarPorId(11);

if (isset($_GET['id'])) {
    $objConsulta->selecionarPorId($_GET['id']);
} else if (isset($_POST['nomeCliente'])) {
    $objConsulta->selecionarPorNomeDono($_POST['nomeCliente']);
} else if (isset($_POST['nomeAnimal'])) {
    $objConsulta->selecionarPorNomeAnimal($_POST['nomeAnimal']);
} else {
    $objConsulta->selecionarConsultas();
}

if ($objConsulta->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Nome do PET</th>
                    <th width="20%">Nome do Dono</th>
                    <th width="15%">Data</th>
                    <th width="15%">Hora</th>
                    <th width="20%">Observações</th>
                    <th width="12%">Editar</th>
                    <th width="12%">Deletar</th>
                </tr>

                <?php

                while ($retorno = $objConsulta->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->id_consulta . '</td><td>' .
                        $retorno->nome_animal . '</td><td>' .
                        $retorno->nome_cliente . '</td><td>' .
                        $retorno->data_consulta . '</td><td>' .
                        $retorno->hora_consulta . '</td><td>' .
                        $retorno->obs_consulta . '</td>';

                    echo '<td><a href="?rota=editar_consulta&id='.$retorno->id_consulta.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarConsulta("' . $retorno->id_consulta . '")\';><i class="fas fa-trash"></i></a></td></tr>';
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