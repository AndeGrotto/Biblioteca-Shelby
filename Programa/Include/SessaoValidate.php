<?php
  require_once("../Model/Conect_BD.php");
  require_once("../Model/Login.php");
  require_once("../Model/LoginDAO.php");

  session_start(); 
  
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
    
    if($result < 1) { 
      unset($_SESSION["nome_usuario"]);
      unset($_SESSION["senha_usuario"]);
      echo "<script>";
      echo "alert(\"Você não efetuou o LOGIN!\");";
      echo "</script>";
      echo "location = \"../View/login.php\";</script>";
    }
    else {
      echo "<script>";
      echo "document.getElementById(\"idLogin\").innerHTML = 'Logado como $nome_usuario'";
      echo "</script>";
    }
  }
  else { 
    echo "<script>";
    echo "alert(\"Você não efetuou o LOGIN!\");";
    echo "location = \"../View/login.php\";</script>";
    echo "</script>";
  }
?>