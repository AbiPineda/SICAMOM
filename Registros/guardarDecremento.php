<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

$insumo   = $_POST['insumo'];
$marca   = $_POST['marca'];
$existencia   = $_POST['existencia'];
$preparadas  = $_POST['preparadas'];

$mensaje = "";

        $consulta  = "INSERT INTO t_inventario VALUES('null','" . $insumo . "','" .$marca. "','" .$existencia. "','" .$preparadas."')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se agregaron los datos correctamente";
              header('Location: Registros/DecrementoIn.php?guardo=1');
          } else {
              $mensaje="Error al insertar los datos";
          }

?>
