<?php

class Alunos {
    private $id;
    private $nome;
    private $matricula;
    private $telefone;

    public function __construct() {}

    public function __set($propiedade, $valor) {
        $this->$propiedade = $valor;
    }

    public function __get($propiedade) {
        return $this->$propiedade;
    }
}

?>