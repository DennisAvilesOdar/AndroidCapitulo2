<?php

require_once '../negocio/InicioSesion.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["email"]) || ! isset($_POST["clave"])){
    Funciones::imprimeJSON(500, "Falta completar los datos requeridos", "");
    exit();
}

$email = $_POST["email"];
$clave = $_POST["clave"];


try {
    
    $objSesion = new InicioSesion();
    $objSesion->setEmail($email);
    $objSesion->setClave($clave);
    $resultado = $objSesion->validarSesion();
    
    print_r($resultado);
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}