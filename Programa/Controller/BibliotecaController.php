<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Alunos.php");
require_once("../Model/AlunosDAO.php");
require_once("../Model/LoginValidate.php");

class BibliotecaController {
	public function controlaInsercao() {
		if (isset($_POST['botao'])) {
			if (strlen($_POST['nome']) >= 1 && strlen($_POST['telefone']) >= 1) {
				$nome = trim($_POST["nome"]);
				$telefone = trim($_POST["telefone"]);
		  		$DAO  = new AlunosDAO();
		  		$alunos = new Alunos();
		  		$alunos->nome = $nome;
		  		$alunos->telefone = $telefone;

		  		if($DAO->Inserir($alunos)) {
					echo "CADASTRADO COM SUCESSO!";
		  		}
		  		else {
					echo "ERRO NO BANCO DE DADOS: $DAO->erro";
		  		}
			}
		else {
			echo "Em branco!";
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