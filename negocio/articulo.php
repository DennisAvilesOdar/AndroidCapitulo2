<?php

require_once '../datos/Conexion.clase.php';

class Articulo extends Conexion {
    
    public function listar() {
        try {
            $sql = " select * from articulo order by 2";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
}