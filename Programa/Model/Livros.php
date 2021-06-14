<?php

class Livros {
    private $id;
    private $isbn;
    private $nome;
    private $autor;

    public function __construct() {}

    public function __set($propiedade, $valor) {
        $this->$propiedade = $valor;
    }

    public function __get($propiedade) {
        return $this->$propiedade;
    }
}

?>