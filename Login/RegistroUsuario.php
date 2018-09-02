
  <title>Registrarse</title>
  
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<?php

if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido'];
    $email = $_REQUEST['email'];
    $nusuario = $_REQUEST['nusuario'];
    $contrasena = $_REQUEST['contrasena'];
    $tusuario = $_REQUEST['tusuario'];
    $concontrasena = $_REQUEST['concontrasena'];

     Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
     $sql = "INSERT INTO t_usuario(usu_cnombre,usu_capellido,usu_ccorreo,usu_cusuario,usu_ccontrasena,usu_ctipo_usuario,usu_ccontrasena2) VALUES('$nombre','$apellido','$email','$nusuario','$contrasena','$tusuario','$concontrasena')"; 


   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();
  
}

else {

     ?>

    <div class="page-wrapper" style="height: 671px;">
  <div class="wrapper">
	<div class="container">
		<h1>Registro de Usuario</h1>
		
		<form class="form" action="registroUsuario.php" method="POST">
                    
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="text" name="apellido" placeholder="Apellido">
                    <input type="email" name="email"  placeholder="Email">
		    <input type="text" name="nusuario" placeholder="Nombre de Usuario">
		    <input type="password" name="contrasena" placeholder="Contraseña">
                    <input type="password" name="concontrasena" placeholder="Confirmar Contraseña">
                     <label style="padding-top: 5px;" >Tipo de Usuario<small class="text-muted"></small></label>
                                       <select class="custom-select" name="tusuario" style="width: 15%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="CG">Administrador</option>
                                                <option value="CE">Enfermera</option>
                                        </select>
	 
		</form>
                <form method="post" action="">
                    <input class="btn btn-outline-primary" type="submit" id="login-button" name="btnGuardar" value="Guardar">
                    <input class="btn btn-outline-info" type="submit" name="nameCancelar" value="Cancelar">
                </form>  
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
        </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

  <script  src="../js/js_login/index.js.js"></script>

                
<?php
}
?>