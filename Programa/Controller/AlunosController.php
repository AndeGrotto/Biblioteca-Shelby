<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Alunos.php");
require_once("../Model/AlunosDAO.php");

class AlunosController {
	public function controlaInsercao() {
		if (isset($_POST['cadastrarAluno'])) {
			if (strlen($_POST['nome']) >= 1 && strlen($_POST['matricula']) >= 1 && strlen($_POST['telefone']) >= 1) {
				$mensagens = array();
				$nome = trim($_POST["nome"]);
				$matricula = trim($_POST["matricula"]);
				$telefone = trim($_POST["telefone"]);
		  		$alunos = new Alunos();
		  		$alunos->nome = $nome;
				$alunos->matricula = $matricula;
		  		$alunos->telefone = $telefone;

				$DAO  = new AlunosDAO();
				$resultado = $DAO->Inserir($alunos);

				if($resultado == 1) {
					echo "<p class=\"sucesso fa-blink\">ALUNO INSERIDO COM SUCESSO!</p>";
				  }
				  else if($resultado == -1) {
					echo "<p class=\"erro fa-blink\">ALUNO JÁ EXISTE, TENTE NOVAMENTE!</p>";
				  }	  
				  else {
					$mensagens[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
					$msg = serialize($mensagens);
					header("Location: ../View/cadastroAlunos.php?msg=$msg");
				  }
				  
				  unset($user);
			}
	    }
	}
  }
?>