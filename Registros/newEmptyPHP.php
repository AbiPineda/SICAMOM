<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido'];
    $email = $_REQUEST['email'];
    $nusuario = $_REQUEST['nusuario'];
    $contrasena = password_hash($_REQUEST['contrasena'], PASSWORD_DEFAULT);
    $tusuario = $_REQUEST['tusuario'];
 
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    
    
    $numero_correo = 0;
    $numero_usuario = 0;
    
 
    $sql = "SELECT * FROM t_usuario WHERE usu_ccorreo = '$email'"; ///cantidad de usuarios con el mismo dui 
    foreach ($conexion->query($sql) as $row) {
        $numero_correo++;
    }
     
    $sql = "SELECT * FROM t_usuario WHERE usu_cusuario = '$nusuario'"; // cantidad de usuaris con el mismo telefono 
    foreach ($conexion->query($sql) as $row) {
        $numero_usuario++;
    }
    
    
    if ($numero_correo) { //entra en este si encontro el dui 
          echo '<script>  CorreoExistente();   function CorreoExistente() {alert("Este Correo ya existe ingrese otro");}</script>';
             
    }if($numero_usuario) {
         echo '<script>  UsuarioExistente();   function UsuarioExistente() {alert("Este Usuario ya existe ingrese otro");}</script>';
    }
    
    if (!$numero_correo && !$numero_usuario ) {
           mysqli_query($conexion, "INSERT INTO t_usuario(usu_cnombre,usu_capellido,usu_ccorreo,usu_cusuario,usu_ccontrasena,usu_ctipo_usuario) VALUES('$nombre','$apellido','$email','$nusuario','$contrasena','$tusuario')"); 
    }
    
     //$sql = "INSERT INTO t_usuario(usu_cnombre,usu_capellido,usu_ccorreo,usu_cusuario,usu_ccontrasena,usu_ctipo_usuario) VALUES('$nombre','$apellido','$email','$nusuario','$contrasena','$tusuario')"; 


   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();

    
    
}

else {

     ?>

<link rel="stylesheet" href="../js/toastr.min.css">
    
    
                
 <?php
    
    include_once '../plantilla/pie.php';
    
    
}
?>


<script
    src="../js/toastr.min.js">
</script>
<script
    src="../js/jquery.min.js">
</script>
<script>
    
    mensaje();
function mensaje(){
    
      toastr.success("Guardado con Exito");
    
    
}
</script>