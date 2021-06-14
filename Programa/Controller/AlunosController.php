<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Alunos.php");
require_once("../Model/AlunosDAO.php");
require_once("../Model/LoginValidate.php");

class AlunosController {
	public function controlaInsercao() {
		if (isset($_POST['cadastrarAluno'])) {
			if (strlen($_POST['nome']) >= 1 && strlen($_POST['telefone']) >= 1) {
				$nome = trim($_POST["nome"]);
				$telefone = trim($_POST["telefone"]);
		  		$DAO  = new AlunosDAO();
		  		$alunos = new Alunos();
		  		$alunos->nome = $nome;
		  		$alunos->telefone = $telefone;

		  		if($DAO->Inserir($alunos)) {
    				echo "<script>alert('Aluno cadastrado com sucesso');</script>";
		  		}
			}
	    }
	}

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