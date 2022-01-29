<?php
include_once("../classes/Conexao.php");
include_once("../classes/Utilidades.php");

class ConsultaPet{

   private $nome;
   private $nomeDono;
   private $data;
   private $hora;
   private $obs;

   private $id;
   private $utilidades;

   public $retornoBD;
   public $conexaoBD;
   
   public function  __construct()   {      
      $objConexao= new Conexao();
      $this->conexaoBD= $objConexao->getConexao();
      $this->utilidades= new Utilidades();

   }
   
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getNomeDono(){
        return $this->nomeDono;
    }
    public function getData(){
        return $this->data;
    }
    public function getHora(){
        return $this->hora;
    }
    public function getObservacao(){
        return $this->obs;
    }


    public function setNome($nome){
        return $this->nome =  mb_strtoupper($nome, 'UTF-8');
    }
    public function setNomeDono($nomeDono){
        return $this->nomeDono =  mb_strtoupper($nomeDono, 'UTF-8');
    }
    public function setData($data){
        //return $this->data = date("Y-m-d");
        return $this->data=$data;
    }
    public function setHora($hora){
        //return $this->hora = date('H:i:s');
        return $this->hora=$hora;
    }
    public function setObservacao($obs){
        return $this->obs=$obs;
    }
    public function setId($id){
        return $this->id=$id;
    }


    public function cadastrar(){

        if($this->getNomeDono()!=null){
            
            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO consulta (nome_animal, nome_cliente, data_consulta, hora_consulta, obs_consulta) 
            VALUES (?, ?, ?, ?, ?)");
            $interacaoMySql->bind_param('sssss', $this->getNome(),$this->getNomeDono(),$this->getData(),$this->getHora(),$this->getObservacao());
            $retorno= $interacaoMySql->execute();

           $id= mysqli_insert_id($this->conexaoBD);
          
           return $this->utilidades->validaRedirecionar( $retorno, $id, "admin.php?rota=visualizar_cliente", "O cliente foi cadastrado com sucesso!");
        } else{
            return $this->utilidades->mesagemParaUsuario("Erro, não foi possível cadastrar consulta! Nome do PET não foi infomado.");
        }
    }
    public function editar(){

        if($this->getId()!=null){
            
            $interacaoMySql = $this->conexaoBD->prepare("UPDATE consulta set  nome_animal=?, nome_cliente=?, data_consulta=?, hora_consulta=?, obs_consulta=?
            where id_consulta=?");
            $interacaoMySql->bind_param('sssssi', $this->getNome(),$this->getNomeDono(),$this->getData(),$this->getHora(),$this->getObservacao(),$this->getId());
            $retorno=$interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
              }

           $id= mysqli_insert_id($this->conexaoBD);
          
           return $this->utilidades->validaRedirecionar( $retorno, $this->getId(), "admin.php?rota=visualizar_consulta", "Os dados da consulta foram alterados com sucesso!");
        }else{
            return $this->utilidades->mesagemParaUsuario("Erro! aqui o erro.");
        }
    }

    public function selecionarPorId($id){
        $sql="select * from consulta where id_consulta=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarPorNomeDono($nomeDono){
        $sql="select * from consulta where nome_cliente='$nomeDono'";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarPorNomeAnimal($nome){
        $sql="select * from consulta where nome_animal='$nome'";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarConsultas(){
        $sql="select * from consulta order by data_consulta DESC";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function deletar($id){
        $sql="DELETE from consulta where id_cliente=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD,'admin.php?rota=visualizar_consulta','O registro da consulta foi deletado com sucesso!');
    }
  }

