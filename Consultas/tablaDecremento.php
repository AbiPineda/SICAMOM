<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';


$result = $conexion->query("SELECT * from t_inventario");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $fila->insumo . "</td>";
        echo "<td>" . $fila->marca . "</td>";
        echo "<td>" . $fila->inv_ecantidad_actual . "</td>";
        echo "<td>" . $fila->inv_ecantidad_saliente . "</td>";
        
     echo "</tr>";

    }
}
?>

