<?php

include('../Conexion/conexion.php');

//atributos para Registro de Paciente
/*$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dui = $_POST['dui'];
$telefono = $_POST['telefono'];
$fechaNacimiento = $_POST['fecha'];
$tipo = $_POST['tipo'];
*/
//atributos para Registro de Responsable

$nombre = $_POST['nombreRes'];
$apellido = $_POST['apellidoRes'];
$dui = $_POST['duiRes'];
$telefono = $_POST['telefonoRes'];

/*
$sql = "INSERT INTO t_paciente(pac_cnombre,pac_capellido,pac_cdui,pac_ctelefono,pac_ffecja_nac,pac_ctipo_consulta) VALUES('$nombre','$apellido','$dui','$telefono','$fechaNacimiento','$tipo')"; 
*/
$sql = "INSERT INTO t_responsable(res_cnombre,res_capellidos,res_cdui,res_ctelefono) VALUES('$nombre','$apellido','$dui','$telefono)"; 

$conexion = conectar();
$ejecutar= mysqli_query($conexion,$sql);

if($ejecutar){
   
    echo "Exito";
}else{
    
    echo "No Exito";
}


?>