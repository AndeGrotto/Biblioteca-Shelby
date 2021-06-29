<?php
class EmprestimoDAO {

  public $e = null;
  public $erro = null;
  

  public function __construct() {
    $this->e = new Conect_BD();
	$this->e->exec("set names utf8"); 
  }
  

  public function Inserir($emprestimo){
    try {
      $stmt = $this->e->query("SELECT * FROM emprestimo WHERE isbn = '$emprestimo->isbn'");
      if($stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	    return -1;

      $stmt = $this->e->prepare("INSERT INTO emprestimo(dataEmprestimo,dataDevolucao,
                                                         isbn, matricula) VALUES (?, ?, ?, ?)");

    $this->e->beginTransaction();
    $stmt->bindValue(1, $emprestimo->dataEmprestimo);
    $stmt->bindValue(2, $emprestimo->dataDevolucao);
    $stmt->bindValue(3, $emprestimo->isbn);
    $stmt->bindValue(4, $emprestimo->matricula);


      $stmt->execute();

      $this->e->commit(); 

      unset($this->e);
      
      return 1;
    }

	catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
	  return 0;
    }
  }


  public function Consultar($op, $param, $value) {
    try {
	  $items = array();
	  
    switch($op)
    {
      case 1:
        $query = "SELECT * FROM emprestimo";
        break; 
    }    

      if($query != null)
        $stmt = $this->e->query($query);
      else
        $stmt = $this->e->query("SELECT * FROM emprestimo");
		
	  $this->e = null;
	  
	  while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	  {
	    $e = new Emprestimo();
		
    if(isset($registro["dataEmprestimo"]))
		  $e->dataEmprestimo = $registro["dataEmprestimo"];
		if(isset($registro["dataDevolucao"]))
		  $e->dataDevolucao = $registro["dataDevolucao"];
		if(isset($registro["isbn"]))
		  $e->isbn = $registro["isbn"];
		if(isset($registro["matricula"]))
		  $e->matricula = $registro["matricula"];

	    $items[] = $e;
	  }
	  
      return $items;
    }

	catch(PDOException $e) {
      echo "Erro: ".$e->getMessage();
    }
  }

  public function Excluir($cod) {
    try {
      $stmt = $this->e->prepare("DELETE FROM emprestimo WHERE isbn=?");

      $this->e->beginTransaction();

      $stmt->bindValue(1, $cod);
    

      $stmt->execute();
      $this->e->commit();
      $this->e = null;

      return true;
    }

    catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
      return false;
    }
  }
 
}
?>

