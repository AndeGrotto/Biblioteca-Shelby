<?php
$isbn = $_GET['isbn'];
    include_once("../Controller/LivrosController.php");
    $obj = new LivrosController();
    $obj->controlaExclusao($isbn);
?>