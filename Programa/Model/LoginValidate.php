<?php


class LoginValidate {

    public static function validarLogin($u, $s) {
        if($u == 'admin' && $s == 'admin') {
            header("location: ../View/menu.html");
        }else {
            
        }
    }
}
?>