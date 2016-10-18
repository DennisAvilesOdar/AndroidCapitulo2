<?php

require_once '../datos/Conexion.clase.php';

class InicioSesion {
    private $email;
    private $contraseña;
    
    function getEmail() {
        return $this->email;
    }

    function getContraseña() {
        return $this->contraseña;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }


}
