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

			  echo "<th class='acoes'><div class='align-bt'>
			  <a href='../View/excluirAlunos.php?matricula=$matricula' class='btn btn-danger' role='button' aria-pressed='true'  onclick='return ConfirmarDelete();'><i class=' fas fa-trash-alt'></i></a></div></th>";

			echo "</tr>";
		  }
		}
		else {
		  echo "<tr>";
		  echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
		  echo "</tr>";
		}
	  }

	  private function preparaDados()
	  {
		$alunos = new Alunos();
		
		$nome = trim($_POST["nome"]);
        $matricula = trim($_POST["matricula"]);
		$telefone = trim($_POST["telefone"]);

		$alunos->nome = $nome;
		$alunos->matricula = $matricula;
		$alunos->telefone = $telefone;
		
		return $alunos;    
	  }

	  public function controlaInsercao() {
		if (isset($_POST['nome']) >= 1 && isset($_POST['matricula']) >= 1 && isset($_POST['telefone']) >= 1) {

				$DAO  = new AlunosDAO();
				$alunos = $this->preparaDados();
				$result = $DAO->Inserir($alunos);
				  if($result == 1)
				  {
					echo"<div class=\"alert alert-success\" role=\"alert\">
            		Aluno inserido com sucesso!
        			</div>";
				  }
				  else if($result == -1) {
					echo"<div class=\"alert alert-danger\" role=\"alert\">
            		Aluno já existe, tente novamente outro!
        			</div>";
				  }	  
				  else {
					$mensagens[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
					$msg = serialize($mensagens);
					header("Location: ../View/cadastrarAlunos.php?msg=$msg");
				  }
				  
				  unset($alunos);
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
				
				header("location: ../View/mostrarAlunos.php");
			}else {
			
			}
		  } else {
		
		  }	
	}
}

echo "<script type=\"text/javascript\" src=\"../Include/js/javascript.js\"></script>";
?>
