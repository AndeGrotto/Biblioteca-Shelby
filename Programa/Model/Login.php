<?php

class Login {
    private $id;
    private $usuario;
    private $senha;

    public function __construct() {}

    public function __set($propiedade, $valor) {
        $this->$propiedade = $valor;
    }

    public function __get($propiedade) {
        return $this->$propiedade;
    }
}

?>