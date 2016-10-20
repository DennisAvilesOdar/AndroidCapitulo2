<?php

require_once '../datos/Conexion.clase.php';

class InicioSesion {
    private $email;
    private $contraseña;
    
    public function validarSesion(){
        try {
            $sql = "select * from f_validar_sesion (:p_email,:p_clave)";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->bindParam(":p_email", $this->getEmail());
            $sentencia->bindParam(":p_clave", $this->getContraseña());
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
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
