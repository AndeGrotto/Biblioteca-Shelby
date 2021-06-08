<?php
class AlunosDAO {

  public $a = null;
  public $erro = null;
  

  public function __construct() {
    $this->a = new Conect_BD();
	$this->a->exec("set names utf8"); 
  }
  

  public function Inserir($alunos){
    try {
      $stmt = $this->a->prepare("INSERT INTO alunos(nome, telefone) VALUES (?, ?)");
    $stmt->bindValue(1, $alunos->nome);
    $stmt->bindValue(2, $alunos->telefone);
	  

      $stmt->execute();
      

      $this->a = null;
	  return true;
    }

	catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
	  return false;
    }
  }
 
}
?>