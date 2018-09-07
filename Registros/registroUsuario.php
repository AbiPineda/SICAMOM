
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
    $contrasena = $_REQUEST['contrasena'];
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
    
           echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroUsuario.php";
                    
                });</script>';
           
    }
    
     //$sql = "INSERT INTO t_usuario(usu_cnombre,usu_capellido,usu_ccorreo,usu_cusuario,usu_ccontrasena,usu_ctipo_usuario) VALUES('$nombre','$apellido','$email','$nusuario','$contrasena','$tusuario')"; 


   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();

    
    
}

else {

     ?>

<link rel="stylesheet" href="../js/toastr.min.css">
    <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro de Usuario</h3>
                        <form id="example-form" action="" class="m-t-40" method="POST">
                            <div>
                                <h3>  </h3>
                                <section>

                                     <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label>Nombre<small class="text-muted"></small></label>
                                     <div class="input-group">
                                         <input type="text" name="nombre" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre"  value="" required >  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                   <div class="col-lg-4">
                                     <label>Apellido<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="apellido" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese apellido" value="" required>  
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
                                    <input type="text" name="nusuario" class="form-control" autocomplete="off" id="phone-maske" placeholder="Ingrese Usuario"  value="" required> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                </div> 
                                    <label style="padding-top: 12px;" >Tipo de Usuario<small class="text-muted"></small></label>
                                       <select class="custom-select" name="tusuario" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="Administrador">Administrador</option>
                                                <option value="Secretaria">Secretaria</option>
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
                                              <button type="submit" class="btn btn-info" name="btnGuardar" id="boton">Guardar </button>
                                          </div>
                                         <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                             <button type="reset" class="btn btn-info" name="Cancelar" id="Cancelar">Cancelar </button>
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
    
                
 <?php
    
    include_once '../plantilla/pie.php';
    
    
}
?>
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

<script
    src="../js/toastr.min.js">
</script>
<script
    src="../js/jquery.min.js">
</script>
