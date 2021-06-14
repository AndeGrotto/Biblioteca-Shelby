<?php
class LivrosDAO {

  public $l = null;
  public $erro = null;
  

  public function __construct() {
    $this->l = new Conect_BD();
	$this->l->exec("set names utf8"); 
  }
  

  public function Inserir($livros){
    try {
      $stmt = $this->l->query("SELECT * FROM livros WHERE isbn = '$livros->isbn'");
      if($stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	    return -1;

      $stmt = $this->l->prepare("INSERT INTO livros(isbn, nome, autor) VALUES (?, ?, ?)");

    $this->l->beginTransaction();
    $stmt->bindValue(1, $livros->isbn);
    $stmt->bindValue(2, $livros->nome);
    $stmt->bindValue(3, $livros->autor);

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
        $stmt = $this->l->query("SELECT * FROM livros");
		
	  $this->l = null;
	  
	  while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	  {
	    $l = new Livros();
		
		// Sempre verifica se a query SQL retornou a respectiva coluna
		if(isset($registro["isbn"]))
		  $l->isbn = $registro["isbn"];
		if(isset($registro["nome"]))
		  $l->nome = $registro["nome"];
		if(isset($registro["autor"]))
		  $l->autor = $registro["autor"];

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

