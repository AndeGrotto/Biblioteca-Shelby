<?php
$matricula = $_GET['matricula'];
    include_once("../Controller/AlunosController.php");
    $obj = new AlunosController();
    $obj->controlaExclusao($matricula);
?>