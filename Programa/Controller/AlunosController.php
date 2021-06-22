<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Alunos.php");
require_once("../Model/AlunosDAO.php");

class AlunosController {

	public function controlaConsulta($op) {
		$DAO = new AlunosDAO();
		$lista = array();
		$numCol = 3;
		
		switch($op) {
		  case 1:
			$lista = $DAO->Consultar();
			break;
		/*case 2:
			$lista = $DAO->Excluir(4);
			break;*/
		}
	
		if(count($lista) > 0) {
		  for($i = 0; $i < count($lista); $i++) {
			$nome   = $lista[$i]->nome;
			$matricula   = $lista[$i]->matricula;
			$telefone = $lista[$i]->telefone;
			
			echo "<tr>";
			
			if($nome)
			  echo "<td style=\"text-align: center;\">$nome</td>";
			if($matricula)
			  echo "<td style=\"text-align: center;\">$matricula</td>";
			if($telefone)
			  echo "<td style=\"text-align: center;\">$telefone</td>";
			echo "<th><a href=\"../View/cadastrarLivros.php\" class=\"btn btn-primary btn active\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-plus-square\"></i></a>";
			echo "<a href=\"#\" class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-trash-alt\"></i></a></th>";
			//echo "<input class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-trash-alt\"></i></INPUT></th>";

			echo "</tr>";
		  }
		}
		else {
		  echo "<tr>";
		  echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
		  echo "</tr>";
		}
	  }


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
					header("Location: ../View/cadastrarAlunos.php?msg=$msg");
				  }
				  
				  unset($user);
			}
	    }
	}
  }
?>