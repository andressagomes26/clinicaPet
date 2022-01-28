<?php
include_once("../classes/Conexao.php");
include_once("../classes/Utilidades.php");

class Animal{

   private $nome;
   private $raca;
   private $nomeDono;
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
    public function getRaca(){
        return $this->raca;
    }
    public function getNomeDono(){
        return $this->nomeDono;
    }

    public function setNome($nome){
        //validacao
        return $this->nome =  mb_strtoupper($nome, 'UTF-8');
    }
    public function setRaca($raca){
        //validacao
        return $this->raca=$raca;
    }
    public function setNomeDono($nomeDono){
        //validacao
        return $this->nomeDono=$nomeDono;
    }    
    public function setId($id){
        //validacao
        return $this->id=$id;
    }

    public function cadastrar(){

        if($this->getNomeDono()!=null){
            
            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO animal (nome_animal, raca_animal, nome_cliente) 
            VALUES (?, ?, ?)");
            $interacaoMySql->bind_param('sss', $this->getNome(),$this->getRaca(),$this->getNomeDono());
            //echo$interacaoMySql;
            $retorno= $interacaoMySql->execute();

           $id= mysqli_insert_id($this->conexaoBD);
          
           return $this->utilidades->validaRedirecionar( $retorno, $id, "admin.php?rota=visualizar_animal", "O PET foi cadastrado com sucesso!");
        }else{
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado! O nome do dono do PET não foi infomado.");
        }
    }
    public function editar(){

        if($this->getId()!=null){
            
            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  animal set nome_animal=?, raca_animal=?, nome_cliente=?
            where id_animal=?");
            $interacaoMySql->bind_param('sssi', $this->getNome(),$this->getRaca(),$this->getNomeDono(),$this->getId());
            $retorno=$interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
              }

           $id= mysqli_insert_id($this->conexaoBD);
          
           return $this->utilidades->validaRedirecionar( $retorno, $this->getId(), "admin.php?rota=visualizar_animal", "Os dados do PET foram alterados com sucesso!");
        }else{
            return $this->utilidades->mesagemParaUsuario("Erro! O nome do dono do PET não foi infomado.");
        }
    }

    public function selecionarPorId($id){
        $sql="select * from animal where id_animal=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarPorNomeDono($nomeDono){
        $sql="select * from animal where nome_cliente='$nomeDono'";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarPorNomeAnimal($nome){
        $sql="select * from animal where nome_animal='$nome'";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarAnimais(){
        $sql="select * from animal order by nome_animal DESC";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }

    public function deletar($id){
        $sql="DELETE from animal where id_animal=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD,'admin.php?rota=visualizar_animal','O PET foi deletado com sucesso!');
    }
  }

