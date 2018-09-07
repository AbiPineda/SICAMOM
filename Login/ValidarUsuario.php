<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//conectar a la base de datos 
$conexion=mysqli_connect("localhost", "root", "", "clinica");
$consulta="SELECT * FROM t_usuario WHERE usu_cusuario = '$usuario' && usu_ccontrasena = '$clave'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);


    foreach ($conexion->query($consulta) as $row) {
        $tipo = $row["usu_ctipo_usuario"];
    }
   
if ($filas>0) {
        
        
        $_SESSION['user'] = $usuario;
        
        
        if ($tipo == 'Administrador') { 
        /// lo redireccional al index administraqdor
          header("location:../html/ltr/index.html");  
        }else{
            // lo redireccionas al indeex secretaria 
          header("location:../html/ltr/indexSecretaria.html");  
        }
        
	
        
}
else {
         
	header("location:../Login/Login.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

