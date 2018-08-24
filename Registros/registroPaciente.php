<?php

include('../Conexion/conexion.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dui = $_POST['dui'];
$telefono = $_POST['telefono'];
$fechaNacimiento = $_POST['fecha'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO t_paciente(pac_cnombre,pac_capellido,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta) VALUES('$nombre','$apellido','$dui','$telefono','$fechaNacimiento','$tipo')"; 

$conexion = conectar();
$ejecutar= mysqli_query($conexion,$sql);

if($ejecutar){
   
    echo "Exito";
}else{
    
    echo "No Exito";
}


?>