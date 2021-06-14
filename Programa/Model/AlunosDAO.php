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
      $stmt = $this->a->query("SELECT * FROM alunos WHERE nome = '$alunos->nome'");
      if($stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	    return -1;

      $stmt = $this->a->prepare("INSERT INTO alunos(nome, matricula, telefone) VALUES (?, ?, ?)");

    $this->a->beginTransaction();
    $stmt->bindValue(1, $alunos->nome);
    $stmt->bindValue(2, $alunos->matricula);
    $stmt->bindValue(3, $alunos->telefone);

      $stmt->execute();

      $this->a->commit(); 

      unset($this->a);
      
      return 1;
    }

	catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
	  return 0;
    }
  }
 
}
?>

