<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Livros.php");
require_once("../Model/LivrosDAO.php");
require_once("../Model/Alunos.php");
require_once("../Model/AlunosDAO.php");
require_once("../Model/EmprestimoDAO.php");
require_once("../Model/Emprestimo.php");

class EmprestimoController {

	public function controlaConsultaLivros($op) {
		$DAO = new LivrosDAO();
		$lista = array();
		$numCol = 3;
		
		switch($op) {
		  case 1:
			$lista = $DAO->Consultar($op, "","");
			break;
		}
	
		if(count($lista) > 0) {
		  for($i = 0; $i < count($lista); $i++) {
			
			$isbn = $lista[$i]->isbn;
			$nome  = $lista[$i]->nome;
			$autor = $lista[$i]->autor;
			
			echo "<tr>";
	
			if($isbn)
            echo "<td> <INPUT TYPE=\"RADIO\" NAME=\"radioISBN\" value=\"{$isbn}\"></td>";
			if($nome)
			  echo "<td>$nome</td>";
			if($autor)
			  echo "<td>$autor</td>";
			
	
	
			//echo "<input class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-trash-alt\"></i></input></th>";

			echo "</tr>";
		  }
		}
		else {
		  echo "<tr>";
		  echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
		  echo "</tr>";
		}
	  }
      
      public function controlaConsultaAlunos($op) {
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
			$id = $lista[$i]->id;
			$nome = $lista[$i]->nome;
			$matricula = $lista[$i]->matricula;
			$telefone = $lista[$i]->telefone;

			
			echo "<tr>";
			
			if($id)
				echo "<td> <INPUT TYPE=\"RADIO\" NAME=\"radioID\" value=\"{$id}\"></td>";
			if($nome)
             echo "<td style=\"text-align: left;\">$nome</td>";
			if($telefone)
			 echo "<td style=\"text-align: left;\">$telefone</td>";
	
	
			//echo "<input class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-trash-alt\"></i></input></th>";

			echo "</tr>";
		  }
		}
		else {
		  echo "<tr>";
		  echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
		  echo "</tr>";
		}
	  }





    public function controlaInsercaoEmprestimo() {
		$codAluno = $_POST['radioID'];
		$codISBN = $_POST['radioISBN'];

		if(isset($_POST['radioID'])){
			if(!empty($_POST['radioID'])) {
				echo '  ' . $_POST['radioID'];
			} else {
				echo 'Please select the value.';
			}
		}
			
		if(isset($_POST['radioISBN'])){
			if(!empty($_POST['radioISBN'])) {
				echo '  ' . $_POST['radioISBN'];
			} else {
				echo 'Please select the value.';
			}
		}


			if (strlen($_POST['codEmprestimo']) >= 1 && strlen($_POST['dataEmprestimo']) >= 1 && strlen($_POST['dataDevolucao']) >= 1) {

				$mensagens = array();
				$codEmprestimo = trim($_POST["codEmprestimo"]);
                $dataEmprestimo = trim($_POST["dataEmprestimo"]);
				$dataDevolucao = trim($_POST["dataDevolucao"]);
				$codAluno = trim($_POST['radioID']);
				$codISBN =  trim($_POST['radioISBN']);
		  		$emprestimo = new Emprestimo();
		  		$emprestimo->codEmprestimo = $codEmprestimo;
				$emprestimo->dataEmprestimo = $dataEmprestimo;
		  		$emprestimo->dataDevolucao = $dataDevolucao;
				$emprestimo->codAluno = $codAluno;
				$emprestimo->codISBN = $codISBN;


				$DAO  = new EmprestimoDAO();
				$resultado = $DAO->Inserir($emprestimo);

				if($resultado == 1) {
					echo "<p class=\"sucesso fa-blink\">LIVROS INSERIDO COM SUCESSO!</p>";
				  }
				  else if($resultado == -1) {
					echo "<p class=\"erro fa-blink\">LIVROS JÁ EXISTE, TENTE NOVAMENTE!</p>";
				  }	  
				  else {
					$mensagens[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
					$msg = serialize($mensagens);
					header("Location: ../View/cadastrarEmprestimo.php?msg=$msg");
				  }
				  
				  unset($user);
			}
	    
	}
}
?>