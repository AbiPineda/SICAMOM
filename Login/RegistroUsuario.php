
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
    $contrasena = password_hash($_REQUEST['contrasena'], PASSWORD_DEFAULT);
    $tusuario = $_REQUEST['tusuario'];
   // $concontrasena = $_REQUEST['concontrasena'];
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
     $sql = "INSERT INTO t_usuario(usu_cnombre,usu_capellido,usu_ccorreo,usu_cusuario,usu_ccontrasena,usu_ctipo_usuario) VALUES('$nombre','$apellido','$email','$nusuario','$contrasena','$tusuario')"; 
   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();
    
}

else {

     ?>
<!--
    <div class="page-wrapper" style="height: 671px;">
  <div class="wrapper">
	<div class="container">
		<h1>Registro de Usuario</h1>
		
		<form class="form" action="RegistroUsuario.php" method="POST">
                    
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
                     <button type="submit" class="btn btn-info" name="btnGuardar" href="RegistroUsuario.php">Guardar </button>
                    
                    <input class="btn btn-outline-info" type="submit" name="nameCancelar" value="Cancelar">
                </form>  
	</div>-->
                    <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro de Usuario</h3>
                        <form id="example-form" action="registroUsuario.php" class="m-t-40" method="POST">
                            <div>
                                <h3>  </h3>
                                <section>

                                     <div class="row mb-2">
                                    <div class="col-lg-4">
                                        <label>Nombre<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="nombre" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                   <div class="col-lg-4">
                                     <label>Apellido<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="apellido" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese apellido">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>                                    
                                    </div>

                                    <div class="col-lg-4">
                                   <label>E-mail<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="email" class="form-control" autocomplete="off" placeholder="email" id="email" name="email" value="" required >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>                              
                                    </div>


                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;">Nombre de Usuario<small class="text-muted"> </small></label>
                                     <div class="input-group">
                                    <input type="text" name="nusuario" class="form-control" autocomplete="off" id="phone-maske" placeholder="Ingrese Usuario"> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                </div> 
                                    <label style="padding-top: 12px;" >Tipo de Usuario<small class="text-muted"></small></label>
                                       <select class="custom-select" name="tusuario" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="CG">Administrador</option>
                                                <option value="CE">Enfermera</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;">Contraseña<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="password" pattern=".{4,}" title="4 o mas caracteres" class="form-control" autocomplete="off" placeholder="Contraseña" id="campo1" name="contrasena" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                </div> 
                                 
                                    </div>

                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;" >Confirmar contraseña<small class="text-muted"></small></label>
                                       <div class="input-group">
                                     <input type="password" class="form-control" autocomplete="off" placeholder="Ingrese contraseña" id="campo2" name="concontrasena" onkeyup="Habilitar()" value="" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                </div> 
                                        
                                          <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                              <button type="submit" class="btn btn-info" name="btnGuardar" id="boton" onclick="return guardar()">Guardar </button>
                                          </div>
                                         
                                         <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                             <button type="submit" class="btn btn-info" name="Cancelar" id="Cancelar">Cancelar </button>
                                         </div>
                                         <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                             <button type="submit" class="btn btn-info" name="nameCancelar" id="botonCancelar">Alerta </button>
                                         </div>
                                    </div>

                                         </div>

                                    </section>

                                </div>
                            </form>
                        </div>
                     </div>

                </div>

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
      
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

<script  src="../js/js_login/index.js.js"></script>
<script>
    function Habilitar(){
        var camp1=document.getElementById("campo1");
        var camp2=document.getElementById("campo2");
        var boton=document.getElementById("boton")
        if (camp1.value!=camp2.value) {
            boton.disabled=true;
        }else{
            boton.disabled=false;
        }
    }
</script>
                
<?php
}
?>