<?php
class EmprestimoDAO {

  public $l = null;
  public $erro = null;
  

  public function __construct() {
    $this->l = new Conect_BD();
	$this->l->exec("set names utf8"); 
  }
  

  public function Inserir($emprestimo){
    try {
      $stmt = $this->l->query("SELECT * FROM emprestimo WHERE codEmprestimo = '$emprestimo->codEmprestimo'");
      if($stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	    return -1;

      $stmt = $this->l->prepare("INSERT INTO emprestimo(codEmprestimo, dataEmprestimo,dataDevolucao,
                                                         codISBN, codAluno) VALUES (?, ?, ?, ?, ?, ?)");

    $this->l->beginTransaction();
    $stmt->bindValue(1, $emprestimo->codEmprestimo);
    $stmt->bindValue(1, $emprestimo->dataEmprestimo);
    $stmt->bindValue(2, $emprestimo->dataDevolucao);
    $stmt->bindValue(1, $emprestimo->codISBN);
    $stmt->bindValue(1, $emprestimo->codAluno);

      $stmt->execute();

      $this->l->commit(); 

      unset($this->l);
      
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
        $stmt = $this->l->query($query);
      else
        $stmt = $this->l->query("SELECT * FROM emprestimo");
		
	  $this->l = null;
	  
	  while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	  {
	    $l = new emprestimo();
		
		// Sempre verifica se a query SQL retornou a respectiva coluna
		if(isset($registro["codEmprestimo"]))
		  $l->codEmprestimo = $registro["codEmprestimo"];
		if(isset($registro["dataEmprestimo"]))
		  $l->dataEmprestimo = $registro["dataEmprestimo"];
		if(isset($registro["dataDevolucao"]))
		  $l->dataDevolucao = $registro["dataDevolucao"];
    if(isset($registro["codISBN"]))
		  $l->codISBN = $registro["codISBN"];
    if(isset($registro["codAluno"]))
		  $l->codAluno = $registro["codAluno"];



		// Ao final, adiciona o registro como um item do array de retorno
	    $items[] = $l;
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

