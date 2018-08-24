<?php

include('Conexion/conexion.php');

//atributos para Registro de Paciente
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dui = $_POST['dui'];
$telefono = $_POST['telefono'];
$fechaNacimiento = $_POST['fecha'];
$tipo = $_POST['tipo'];

//atributos para Registro de Responsable

$nombreR = $_POST['nombreRes'];
$apellidoR = $_POST['apellidoRes'];
$duiR = $_POST['duiRes'];
$telefonoR = $_POST['telefonoRes'];

$sql = "INSERT INTO t_paciente(pac_cnombre,pac_capellido,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta) VALUES('$nombre','$apellido','$dui','$telefono','$fechaNacimiento','$tipo')"; 

$sql2 = "INSERT INTO t_responsable(res_cnombre,res_capellidos,res_cdui,res_ctelefono) VALUES('$nombreR','$apellidoR','$duiR','$telefonoR')"; 

$conexion = conectar();
$ejecutar= mysqli_query($conexion,$sql);
$ejecutar2= mysqli_query($conexion,$sql2);
if($ejecutar && $ejecutar2){
   
    echo "Exito";
}else{
    
    echo "No Exito";
}


?>