<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Login.php");
require_once("../Model/LoginDAO.php");

class LoginController {

	public function controlaConsulta() {
		if (!empty($_POST['user']) && !empty($_POST['senha'])) {
		  $login = new Login();
		  $login->usuario = $_POST['user'];
		  $login->senha = $_POST['senha'];
	  
		  $DAO = new LoginDAO();
		  $result = $DAO->Consultar($login);
	  
		  if($result) {
			if($result == -2) {
				echo "<p class=\"erro fa-blink\">USUÁRIO NÃO ENCONTRADO!</p>";
			  }
			else if($result == -1) {
			  echo "<p class=\"erro fa-blink\">SENHA INVÁLIDA!</p>";
			}
			else {
				header("location: ../View/menu.html");
			  }
		  }
		}
	  }
  }
?>