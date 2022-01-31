<?php
include_once("../classes/ConsultaPet.php");
if (isset($_SESSION['administrador'])){
$objConsulta = new ConsultaPet();
if (isset($_GET['id'])) {
    $objConsulta->selecionarPorId($_GET['id']);
}
$retorno = $objConsulta->retornoBD->fetch_object();
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
                    <div class="mb-3">
                        <label for="nomeAnimal" class="form-label">Nome PET</label>
                        <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeHelp" name="nomeAnimal" value="<?php echo $retorno->nome_animal; ?>">
                        <div id="nomeHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nomeCliente" class="form-label">Nome Cliente</label>
                        <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeCliente" value="<?php echo $retorno->nome_cliente; ?>">
                        <div id="nomeHelp" class="form-text"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="dataConsulta" class="form-label">Data</label>
                        <input type="date" class="form-control" id="data-consulta" aria-describedby="dataHelp" name="dataConsulta" value="<?php echo $retorno->data_consulta; ?>">
                        <div id="dataHelp" class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="horaConsulta" class="form-label">Hora</label>
                        <input type="time" class="form-control" id="hora-consulta" aria-describedby="horaHelp" name="horaConsulta"  value="<?php echo $retorno->hora_consulta; ?>">
                        <div id="horaHelp" class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="obsConsulta" class="form-label">Observações</label>
                        <input type="text" class="form-control" id="obs-consulta" aria-describedby="obsHelp" name="obsConsulta" value="<?php echo $retorno->obs_consulta; ?>">
                        <div id="obsHelp" class="form-text"></div>
                    </div>

                    <input type="hidden" value="<?php echo $retorno->id_consulta; ?>" name="idconsulta" >
                    <input type="hidden" name="formEditarConsulta">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php

}else{
    header("Location:../index.html");
}
?>