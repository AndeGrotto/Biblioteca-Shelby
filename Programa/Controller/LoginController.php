<?php 

//require_once("../Model/Conect_BD.php");
//require_once("../Model/Alunos.php");
//require_once("../Model/AlunosDAO.php");
require_once("../Model/LoginValidate.php");

class LoginController {

	  public function fazerLogin() {
		if (isset($_POST['login'])) {
				$usuario = trim($_POST["user"]);
				$senha = trim($_POST["senha"]);
		  		$LOG  = new LoginValidate();

		  		if($LOG->validarLogin($usuario, $senha)) {
		  		}
		}
	  }

  }
?>