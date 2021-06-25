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
			$lista = $DAO->Consultar($op, "", "");
			break;
		}
	
		if(count($lista) > 0) {
		  for($i = 0; $i < count($lista); $i++) {
			$nome   = $lista[$i]->nome;
			$matricula   = $lista[$i]->matricula;
			$telefone = $lista[$i]->telefone;
			
			echo "<tr>";
			
			if($nome)
			  echo "<td>$nome</td>";
			if($matricula)
			  echo "<td>$matricula</td>";
			if($telefone)
			  echo "<td>$telefone</td>";

			  echo "<th class=\"acoes\"><a href=\"../View/cadastrarLivros.php\" class=\"btn btn-primary btn active\" role=\"button\" aria-pressed=\"true\"><i class=\"icone fas fa-plus-square\"></i>Inserir</a>";
			  echo "<a href=\"../View/excluirLivros.php?matricula=$matricula\" class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"  onclick=\"return ConfirmarDelete();\"><i class=\"icone fas fa-trash-alt\"></i>Excluir</a></th>";

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
				  
				  unset($alunos);
			}
	    }
	}

	public function controlaExclusao($cod) {
		$DAO  = new AlunosDAO();
		$resultado = array();

		$resultado = $DAO->Consultar(2, "matricula", $cod);
		if($resultado) {
			$DAO  = new AlunosDAO();
			$validar = $DAO->Excluir($cod);
			if($validar) {
				echo "<p class=\"sucesso fa-blink\">ALUNOS DELETADO COM SUCESSO!</p>";
				header("location: ../View/mostrarLivros.php");
			}else {
				echo "<p class=\"erro fa-blink\">NÃO FOI POSSÍVEL EXCLUIR O ALUNO, TENTE NOVAMENTE!</p>";
			}
		  } else {
			echo "<p class=\"erro fa-blink\">ESTE LIVRO NÃO EXISTE!</p>";
		  }	
	}
}

echo "<script type=\"text/javascript\" src=\"../Include/js/javascript.js\"></script>";
?>
