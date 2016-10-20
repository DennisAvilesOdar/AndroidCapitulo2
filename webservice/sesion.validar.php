<?php

require_once '../negocio/InicioSesion.php';
require_once '../util/funciones/Funciones.clase.php';

if (! isset($_POST["email"]) || ! isset($_POST["contraseña"])){
    Funciones::imprimeJSON(500, "Falta completar los datos requeridos", "");
    exit();
}

$email = $_POST["email"];
$clave = $_POST["contraseña"];


try {
    
    $objSesion = new InicioSesion();
    $objSesion->setEmail($email);
    $objSesion->setContraseña($contraseña);
    $resultado = $objSesion->validarSesion;
    
    print_r($resultado);
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}