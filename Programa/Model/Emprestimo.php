<?php

class emprestimo {
    private $codEmprestimo;
    private $dataEmprestimo;
    private $dataDevolucao;
    private $codAluno;
    private $codISBN;

    public function __construct() {}

    public function __set($propiedade, $valor) {
        $this->$propiedade = $valor;
    }

    public function __get($propiedade) {
        return $this->$propiedade;
    }
}

?>