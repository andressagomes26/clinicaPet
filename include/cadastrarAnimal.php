<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nomeAnimal" class="form-label">Nome PET</label>
                    <input type="text" class="form-control" id="nome-animal" aria-describedby="nomeHelp" name="nomeAnimal" >
                    <div id="nomeHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="nomeCliente" class="form-label">Nome Cliente</label>
                    <input type="text" class="form-control" id="nome-cliente" aria-describedby="nomeHelp" name="nomeCliente" >
                    <div id="nomeHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="raca" class="form-label">Raça</label>
                    <input type="text" class="form-control" id="raca-Animal" aria-describedby="racaHelp" name="racaAnimal" >
                    <div id="raca" class="form-text"></div>
                </div>

                <input type="hidden" name="formCadastrarAnimal">
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