<?php

class Emprestimo {
    private $codId;
    private $dataEmprestimo;
    private $dataDevolucao;
    private $isbn;
    private $matricula;

    public function __construct() {}

    public function __set($propiedade, $valor) {
        $this->$propiedade = $valor;
    }

    public function __get($propiedade) {
        return $this->$propiedade;
    }
}

?>