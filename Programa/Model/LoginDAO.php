<?php
class LoginDAO {

  public $u = null;
  public $erro = null;
  

  public function __construct() {
    $this->u = new Conect_BD();
	$this->u->exec("set names utf8"); 
  }
  
  public function Consultar($login) {
    try {
      $stmt = $this->u->query("SELECT * FROM login WHERE usuario = '$login->usuario'");
      $registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);

      unset($this->u);

      if(!$registro) {
        return -2;
      }
      else {
        if (strcmp($registro["senha"], $login->senha) !== 0) {
          return -1;
        }
        else {
          return 1;
        }
      }
    }
    catch(PDOException $e) {
      echo "Erro: ". $e->getMessage();
      return 0;
    }
  }
 
}
?>

