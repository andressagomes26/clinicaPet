<?php
if (isset($_SESSION['administrador'])) {
?>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="nomeAnimal" class="form-label">Nome PET</label>
                        <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeHelp" name="nomeAnimal">
                        <div id="nomeHelp" class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="nomeCliente" class="form-label">Nome Cliente</label>
                        <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeCliente">
                        <div id="nomeHelp" class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="dataConsulta" class="form-label">Data</label>
                        <input type="date" class="form-control" id="data-consulta" aria-describedby="dataHelp" name="dataConsulta">
                        <div id="dataHelp" class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="horaConsulta" class="form-label">Hora</label>
                        <input type="time" class="form-control" id="hora-consulta" aria-describedby="horaHelp" name="horaConsulta">
                        <div id="horaHelp" class="form-text"></div>
                    </div>

                    <div class="mb-3">
                        <label for="obsConsulta" class="form-label">Observações</label>
                        <input type="text" class="form-control" id="obs-consulta" aria-describedby="obsHelp" name="obsConsulta">
                        <div id="obsHelp" class="form-text"></div>
                    </div>

                    <input type="hidden" name="formCadastrarConsulta">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>
<?php

} else {
    header("Location:../index.html");
}
?>