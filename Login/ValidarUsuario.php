<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//conectar a la base de datos 
$conexion=mysqli_connect("localhost", "root", "", "clinica");
$consulta="SELECT usu.usu_cusuario, usu.usu_ccontrasena FROM t_usuario as usu WHERE usu_cusuario='$usuario' and usu_ccontrasena='$clave'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if ($filas>0) {
    
	header("location:../html/ltr/index.html");
}
else {
         
	header("location:../Login/Login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

