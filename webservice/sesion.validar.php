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
    $foto = $objSesion->obtenerFoto($resultado["dato"]);
    $resultado["foto"] = $foto;
    
    if ($resultado["estado"]==200) {
        unset($resultado["estado"]);
        Funciones::imprimeJSON(200, "Bienvenido a la Aplicacion", $resultado);
    }else{
        Funciones::imprimeJSON(500, $resultado["dato"], "");
    }
   
    //print_r($resultado);
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}