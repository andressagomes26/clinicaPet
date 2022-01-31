<?php
include_once("../classes/Conexao.php");
include_once("../classes/Utilidades.php");

if(isset($_POST['formFazerLogin'])){
    $objConexao= new Conexao(); 
    $utilidades = new Utilidades();
    $conexaoBD= $objConexao->getConexao();
    
    $usuario = ($_POST['email']); $senha = ($_POST['password']);

    $sql = mysqli_query($conexaoBD, "select * from administrador where email_admin='$usuario' and senha_admin='$senha'");
    
    if(mysqli_num_rows($sql)>0){
      session_start();
      $_SESSION["administrador"] = 'true';
      header("Location: admin.php"); 
    } else {
      $utilidades->mesagemParaUsuario("Login inválido!");
      $utilidades->redireciona("/PHP_projetoClinicaPet2/produto/index.php");
    }
}
