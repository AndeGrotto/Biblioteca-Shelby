<?php
include '../../db_connection.php';
$conn = OpenCon();


var_dump($_POST);
echo $_POST["nome"];
echo $_POST["preco"];
echo $_POST["quantidade"];


?>
