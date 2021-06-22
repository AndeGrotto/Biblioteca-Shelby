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
      $stmt = $this->a->query("SELECT * FROM alunos WHERE matricula = '$alunos->matricula'");
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


  public function Consultar($query=null) {
    try {
	  $items = array();
	  
      if($query != null)
        $stmt = $this->a->query($query);
      else
        $stmt = $this->a->query("SELECT * FROM alunos");
		
	  $this->a = null;
	  
	  while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	  {
	    $a = new Alunos();
		
		// Sempre verifica se a query SQL retornou a respectiva coluna
		if(isset($registro["nome"]))
		  $a->nome = $registro["nome"];
		if(isset($registro["matricula"]))
		  $a->matricula = $registro["matricula"];
		if(isset($registro["telefone"]))
		  $a->telefone = $registro["telefone"];

		// Ao final, adiciona o registro como um item do array de retorno
	    $items[] = $a;
	  }
	  
      return $items;
    }
	// Em caso de erro, retorna a mensagem:
	catch(PDOException $e) {
      echo "Erro: ".$e->getMessage();
    }
  }
 
}
?>

