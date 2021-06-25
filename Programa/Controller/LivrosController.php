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
			$lista = $DAO->Consultar($op, "", "");
			break;
		}
	
		if(count($lista) > 0) {
		  for($i = 0; $i < count($lista); $i++) {
			$isbn = $lista[$i]->isbn;
			$nome = $lista[$i]->nome;
			$autor = $lista[$i]->autor;
			
			echo "<tr>";
			
			if($isbn)
			  echo "<td>$isbn</td>";
			if($nome)
			  echo "<td>$nome</td>";
			if($autor)
			  echo "<td>$autor</td>";
			  
		
			  echo "<th class=\"acoes\"><a href=\"../View/cadastrarLivros.php\" class=\"btn btn-primary btn active\" role=\"button\" aria-pressed=\"true\"><i class=\"icone fas fa-plus-square\"></i>Inserir</a>";
			  echo "<a href=\"../View/excluirLivros.php?isbn=$isbn\" class=\"btn btn-danger\" role=\"button\" aria-pressed=\"true\"  onclick=\"return ConfirmarDelete();\"><i class=\"icone fas fa-trash-alt\"></i>Excluir</a></th>";
			  

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
				  
				  unset($livros);
			}
	    }
	}

	public function controlaExclusao($cod) {
		$DAO  = new LivrosDAO();
		$resultado = array();

		$resultado = $DAO->Consultar(2, "isbn", $cod);
		if($resultado) {
			$DAO  = new LivrosDAO();
			$validar = $DAO->Excluir($cod);
			if($validar) {
				echo "<p class=\"sucesso fa-blink\">LIVROS DELETADO COM SUCESSO!</p>";
				header("location: ../View/mostrarLivros.php");
			}else {
				echo "<p class=\"erro fa-blink\">NÃO FOI POSSÍVEL EXCLUIR O LIVRO, TENTE NOVAMENTE!</p>";
			}
		  } else {
			echo "<p class=\"erro fa-blink\">ESTE LIVRO NÃO EXISTE!</p>";
		  }	
	}
}

echo "<script type=\"text/javascript\" src=\"../Include/js/javascript.js\"></script>";
?>
