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
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro de Usuario</h3>
                        <form id="example-form" action="registroUsuario.php" class="m-t-40" method="POST">
                            <div>
                                <h3>  </h3>
                                <section>

                                     <div class="row mb-3">
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
                                              <button type="submit" class="btn btn-info" name="btnGuardar" id="boton" href="registroUsuario.php">Guardar </button>
                                          </div>
                                         <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                             <button type="submit" class="btn btn-info" name="nameCancelar" onclick="M.toast({html: 'Se limpiaron los campos..'})">Cancelar </button>
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
src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js">  
</script>