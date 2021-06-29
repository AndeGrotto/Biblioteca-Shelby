<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Livros.php");
require_once("../Model/LivrosDAO.php");
require_once("../Model/Alunos.php");
require_once("../Model/AlunosDAO.php");
require_once("../Model/EmprestimoDAO.php");
require_once("../Model/Emprestimo.php");

class EmprestimoController {

	  private function preparaDados()
	  {
		$emprestimo = new Emprestimo();
		
		$dataEmprestimo = trim($_POST["dataEmprestimo"]);
        $dataDevolucao = trim($_POST["dataDevolucao"]);
		$isbn = trim($_POST["isbn"]);
		$matricula = trim($_POST["matricula"]);

		$emprestimo->dataEmprestimo = $dataEmprestimo;
		$emprestimo->dataDevolucao = $dataDevolucao;
		$emprestimo->isbn = $isbn;
		$emprestimo->matricula = $matricula;
		
		return $emprestimo;    
	  }


	  public function controlaInsercao() {
		if (isset($_POST['dataEmprestimo']) >= 1 && isset($_POST['dataDevolucao']) >= 1 && isset($_POST['isbn']) >= 1 && isset($_POST['matricula']) >= 1) {

				$DAO  = new EmprestimoDAO();

				$emprestimo = $this->preparaDados();
				$result = $DAO->Inserir($emprestimo);
				  if($result == 1)
				  {
					echo"<div class=\"alert alert-success\" role=\"alert\">
            		Livro inserido com sucesso!
        			</div>";
				  }
				  else if($result == -1) {
					echo"<div class=\"alert alert-success\" role=\"alert\">
            		Livro inserido com sucesso!
        			</div>";
				  }	  
				  else {
					$mensagens[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
					$msg = serialize($mensagens);
					header("Location: ../View/cadastrarLivros.php?msg=$msg");
				  }
				  
				  unset($livros);
			}
	}

	public function controlaConsulta($op) {
		$DAO = new EmprestimoDAO();
		$lista = array();
		$numCol = 4;

		switch($op) {
		  case 1:
			$lista = $DAO->Consultar($op, "", "");
			break;
		}
	
		if(count($lista) > 0) {
		  for($i = 0; $i < count($lista); $i++) {
			$dataEmprestimo = $lista[$i]->dataEmprestimo;
			$dataDevolucao = $lista[$i]->dataDevolucao;
			$isbn = $lista[$i]->isbn;
			$matricula = $lista[$i]->matricula;
			
			echo "<tr>";
			
			if($dataEmprestimo)
			  echo "<td>$dataEmprestimo</td>";
			if($dataDevolucao)
			  echo "<td>$dataDevolucao</td>";
			if($isbn)
			  echo "<td>$isbn</td>";
			if($matricula)
			  echo "<td>$matricula</td>";
			  
			  echo "<th class='acoes'><div class='align-bt'>
			  <a href='../View/excluirEmprestimo.php?isbn=$isbn' class='btn btn-danger' role='button' aria-pressed='true'  onclick='return ConfirmarDelete();'><i class=' fas fa-trash-alt'></i></a></div></th>";
		  
			  echo "</tr>";
			}
		}
		else {
		  echo "<tr>";
		  echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
		  echo "</tr>";
		}
	  }

	  public function controlaExclusao($cod) {
		$DAO  = new EmprestimoDAO();
		$resultado = array();

		$resultado = $DAO->Consultar(2, "isbn", $cod);
		echo $resultado;
		if($resultado) {
			$DAO  = new EmprestimoDAO();
			$validar = $DAO->Excluir($cod);
			if($validar) {
				header("location: ../View/mostrarEmprestimo.php");
			}else {
				echo "<p class=\"erro fa-blink\">NÃO FOI POSSÍVEL EXCLUIR O EMPRÉSTIMO, TENTE NOVAMENTE!</p>";
			}
		}
	}


    
}
?>