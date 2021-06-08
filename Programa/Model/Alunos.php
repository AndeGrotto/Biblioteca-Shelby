<?php

class Alunos {
    private $id;
    private $nome;
    private $telefone;

    public function __set($propiedade, $valor) {
        $this->$propiedade = $valor;
    }

    public function __get($propiedade) {
        return $this->$propiedade;
    }
}

?>