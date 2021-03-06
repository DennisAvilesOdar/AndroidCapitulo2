<?php

require_once '../negocio/cliente.clase.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'token.validar.php';
if (! isset($_POST["token"])){
    Funciones::imprimeJSON(500, "debe especificar un token", "");
    exit();
}

$token = $_POST["token"];


try {
    
    if (validarToken($token)) {
        $obj = new cliente();
        $resultado = $obj->listar();
        
        Funciones::imprimeJSON(200,"",$resultado);
        
    }
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}