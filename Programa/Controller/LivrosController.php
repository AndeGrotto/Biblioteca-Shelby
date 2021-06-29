<?php 

require_once("../Model/Conect_BD.php");
require_once("../Model/Livros.php");
require_once("../Model/LivrosDAO.php");

class LivrosController {

	private function preparaDados()
	  {
		$livros = new Livros();
		
		$isbn = trim($_POST["isbn"]);
        $nome = trim($_POST["nome"]);
		$autor = trim($_POST["autor"]);

		$livros->isbn = $isbn;
		$livros->nome = $nome;
		$livros->autor = $autor;
		
		return $livros;    
	  }

	public function controlaConsulta($op) {
		$DAO = new LivrosDAO();
		$lista = array();
		$listaLivros = array();
		$numCol = 3;

		switch($op) {
		  case 1:
			$lista = $DAO->Consultar($op, "", "");
			break;
		case 2:
			$listaLivros = $DAO->Consultar($op, "", "");
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
			  
			  echo "<th class='acoes'><div class='align-bt'>
			  <a href='../View/excluirLivros.php?isbn=$isbn' class='btn btn-danger' role='button' aria-pressed='true'  onclick='return ConfirmarDelete();'><i class=' fas fa-trash-alt'></i></a></div></th>";
		  
			  echo "</tr>";
			}
		}else if(count($listaLivros) > 0) {
			for($i = 0; $i < count($listaLivros); $i++) {
			  $isbn = $listaLivros[$i]->isbn;
			  $nome = $listaLivros[$i]->nome;
			  $autor = $listaLivros[$i]->autor;
			  
			  
  
			  echo "<tr>";
			  
			  echo "<td> <INPUT TYPE=\"RADIO\" NAME=\"isbn\" value=\"{$isbn}\"></td>";
			  if($isbn)
				echo "<td>$isbn</td>";
			  if($nome)
				echo "<td>$nome</td>";
			  if($autor)
				echo "<td>$autor</td>";
				
			
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
		if (isset($_POST['isbn']) >= 1 && isset($_POST['nome']) >= 1 && isset($_POST['autor']) >= 1) {

				$DAO  = new LivrosDAO();
				$livros = $this->preparaDados();
				$result = $DAO->Inserir($livros);
				  if($result == 1)
				  {
					echo"<div class=\"alert alert-success\" role=\"alert\">
            		Livro inserido com sucesso!
        			</div>";
				  }
				  else if($result == -1) {
					echo"<div class=\"alert alert-danger\" role=\"alert\">
            		Livro já existe, tente novamente outro!
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




	public function controlaExclusao($cod) {
		$DAO  = new LivrosDAO();
		$resultado = array();

		$resultado = $DAO->Consultar(2, "isbn", $cod);
		if($resultado) {
			$DAO  = new LivrosDAO();
			$validar = $DAO->Excluir($cod);
			if($validar) {
				header("location: ../View/mostrarLivros.php");
			}else {
				echo "<p class=\"erro fa-blink\">NÃO FOI POSSÍVEL EXCLUIR O LIVRO, TENTE NOVAMENTE!</p>";
			}
		} else {
			echo "<p class=\"erro fa-blink\">NÃO FOI POSSÍVEL EXCLUIR O LIVRO, TENTE NOVAMENTE!</p>";
		  }	
		unset($resultado);
	}

}

?>
