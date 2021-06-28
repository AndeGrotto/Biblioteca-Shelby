<?php
  require_once("../Model/Conect_BD.php");
  require_once("../Model/Login.php");
  require_once("../Model/LoginDAO.php");
  
  /* Arquivo de autenticação:
     Verifica se o valor das variáveis de sessão realmente existem e se contém as informações corretas.
     Assim, evita-se o acesso a uma página diretamente pelo endereço URL, sem passar pelo login. */
    
  session_start();  /* restaurando os dados da sessão atual */
  
  if(isset($_SESSION["nome_usuario"]))
    $nome_usuario = $_SESSION["nome_usuario"];
    
  if(isset($_SESSION["senha_usuario"]))
    $senha_usuario = $_SESSION["senha_usuario"];
  
  if(!empty($nome_usuario) || !empty($senha))
  {
    $login = new Login();
    $login->usuario = $nome_usuario;
    $login->senha = $senha_usuario;
  
    $DAO = new LoginDAO();
    $result = $DAO->Consultar($login);
    
    if($result < 1) {  // Pode ter injetado um usuário existente, mas a senha não conferirá devido ao hash 
      unset($_SESSION["nome_usuario"]);
      unset($_SESSION["senha_usuario"]);
      echo "<script>";
      echo "alert(\"Você não efetuou o LOGIN!\");";
      echo "</script>";
      echo "location = \"login.php\";</script>";  /* Direciona para a página de login */
    }
    else {
      echo "<script>";
      echo "document.getElementById(\"idLogin\").innerHTML = 'Logado como $nome_usuario'";
      echo "</script>";
    }
  }
  else {  // Se um dos campos for vazio
    echo "<script>";
    echo "alert(\"Você não efetuou o LOGIN!\");";
    echo "location = \"login.php\";</script>";  /* Direciona para a página de login */
    echo "</script>";
  }
?>