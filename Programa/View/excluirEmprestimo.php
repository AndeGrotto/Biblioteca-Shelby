<?php
$isbn = $_GET['isbn'];
    include_once("../Controller/EmprestimoController.php");
    $obj = new EmprestimoController();
    $obj->controlaExclusao($isbn);
?>