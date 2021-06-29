<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Login.php");
require_once("../Model/LoginDAO.php");

class LoginController {

	public function controlaConsulta() {
		if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
		  $login = new Login();
		  $login->usuario = $_POST['usuario'];
		  $login->senha = $_POST['senha'];
	  
		  $DAO = new LoginDAO();
		  $result = $DAO->Consultar($login);
	  
		  if($result) {
			if($result == -2) {
				echo "<script>alert('USUÁRIO NÃO ENCONTRADO!');</script>";
			  }
			else if($result == -1) {
				echo "<script>alert('SENHA INVÁLIDA');</script>";
			}
			else {
				session_start();
				$_SESSION["nome_usuario"] = $login->usuario;
				$_SESSION["senha_usuario"] = $login->senha;
				header("location: ../View/paginaInicial.html");  /* Direciona para a página inicial */
			  }
		  }
		}
	  }
  }
?>