<?php

require_once '../negocio/venta.php';
require_once '../util/funciones/Funciones.clase.php';
require_once 'token.validar.php';
if (! isset($_POST["token"])){
    Funciones::imprimeJSON(500, "debe especificar un token", "");
    exit();
}

$token = $_POST["token"];


try {
    
    if (validarToken($token)) {
        $codigoTipoComprobante = $_POST["p_to"];
        $numeroSerie = $_POST["p_nser"];
        $codigoCliente = $_POST["p_cli"];
        //$fechaVenta = $_POST["p_fv"];
        $fechaVenta = date('Y-a-d');
        $codigoUsuario = $_POST["p_cu"];
        $detalleVenta = $_POST["p_det"];
        
        $obj = new venta();
        $obj->setCodigoTipoComprobante($codigoTipoComprobante);
        $obj->setNumeroSerie($numeroSerie);
        $obj->setCodigoCliente($codigoCliente);
        $obj->setFechaVenta($fechaVenta);
        $obj->setCodigoUsuario($codigoUsuario);
        $obj->setDetalleVenta($detalleVenta);
        
        $resultado = $obj->agregar();
        
        Funciones::imprimeJSON(200,"",$resultado);
        
    }
    
} catch (Exception $exc) {
    
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}