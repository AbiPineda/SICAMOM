<?php

include('Conexion/conexion.php');

$nombre = $_POST['nombreCom'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
$presentacion = $_POST['presentacion'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];



$sql = "INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,ins_cpresentacion,ins_dprecio,ins_ffecha_caducidad) VALUES('$nombre','$marca','$descripcion','$presentacion','$precio','$fecha')"; 

$conexion = conectar();
$ejecutar= mysqli_query($conexion,$sql);

if($ejecutar){
   
    echo "Exito";
}else{
    
    echo "No Exito";
}


?>