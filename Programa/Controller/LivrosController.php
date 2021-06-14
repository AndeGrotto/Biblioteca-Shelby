<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Livros.php");
require_once("../Model/LivrosDAO.php");

class LivrosController {

	public function controlaConsulta($op) {
		$DAO = new LivrosDAO();
		$lista = array();
		$numCol = 3;
		
		switch($op) {
		  case 1:
			$lista = $DAO->Consultar();
			break;
		case 2:
			$lista = $DAO->Excluir();
			break;
		}
	
		if(count($lista) > 0) {
		  for($i = 0; $i < count($lista); $i++) {
			$isbn = $lista[$i]->isbn;
			$nome   = $lista[$i]->nome;
			$autor   = $lista[$i]->autor;
			
			echo "<tr>";
			
			if($isbn)
			  echo "<td style=\"text-align: center;\">$isbn</td>";
			if($nome)
			  echo "<td style=\"text-align: left;\">$nome</td>";
			if($autor)
			  echo "<td style=\"text-align: right;\">$autor</td>";
			echo "<th><a href=\"../View/cadastrarLivros.php\" class=\"btn btn-primary btn active\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-plus-square\"></i></a>";
			echo "<a href=\"#\" class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"><i class=\"fas fa-trash-alt\"></i></a></th>";
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


    public function controlaInsercao() {
		if (isset($_POST['cadastrarLivros'])) {
			if (strlen($_POST['isbn']) >= 1 && strlen($_POST['nome']) >= 1 && strlen($_POST['autor']) >= 1) {
				$mensagens = array();
				$isbn = trim($_POST["isbn"]);
                $nome = trim($_POST["nome"]);
				$autor = trim($_POST["autor"]);
		  		$livros = new Livros();
		  		$livros->isbn = $isbn;
				$livros->nome = $nome;
		  		$livros->autor = $autor;

				$DAO  = new LivrosDAO();
				$resultado = $DAO->Inserir($livros);

				if($resultado == 1) {
					echo "<p class=\"sucesso fa-blink\">LIVROS INSERIDO COM SUCESSO!</p>";
				  }
				  else if($resultado == -1) {
					echo "<p class=\"erro fa-blink\">LIVROS JÁ EXISTE, TENTE NOVAMENTE!</p>";
				  }	  
				  else {
					$mensagens[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
					$msg = serialize($mensagens);
					header("Location: ../View/cadastrarLivros.php?msg=$msg");
				  }
				  
				  unset($user);
			}
	    }
	}
}
?>