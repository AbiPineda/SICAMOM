<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['btnEnviar'])) {
    include_once '../Conexion/conexion.php';

    $nombre  = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido'];
    echo $apellido;
     $dui = $_REQUEST['dui'];
    echo $dui;
    $telefono = $_REQUEST['telefono'];
   echo $telefono;
    $fecha = $_REQUEST['fecha'];
<<<<<<< HEAD
   echo $fecha;
    $tipo = $_REQUEST['tipo'];
   echo $tipo;
=======
      $tipo = $_REQUEST['tipo'];
   
>>>>>>> 903045bd64790fa0c16a226ed1c5740116a3cf03
    
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "INSERT INTO t_paciente(id_paciente,pac_cnombre,pac_capellidos,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta) VALUES('',$nombre','$apellido','$dui','$telefono','$fecha','$tipo')"; 

   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();


if($sentencia){
   
    echo "Exito";
   
 }   
} else {

     ?>
     <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro Paciente.</h3>
                        <form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">
                            <div>
                                <h3>Datos personales</h3>
                                <section>

                                     <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label>Nombre<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="nombre" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                   <div class="col-lg-4">
                                     <label>Apellido<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="apellido" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>                                    
                                    </div>

                                    <div class="col-lg-4">
                                   <label>Fecha de nacimiento<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>                              
                                    </div>


                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                     <div class="input-group">
                                    <input type="text" name="dui" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                </div> 
                                <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                    <label for="acceptTerms">Si la paciente no porta el DUI</label>  
                                    </div>

                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                     <div class="input-group">
                                    <input type="text" name="telefono" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div> 
                                <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                    <label for="acceptTerms">Si la paciente no posee número telefónico</label>  
                                    </div>

                                    <div class="col-lg-4">
<<<<<<< HEAD
                                         <label style="padding-top: 12px;" name="tipo">Tipo de consulta<small class="text-muted"></small></label>
                                            <div class="input-group">
                                    <input type="text" name="tipo" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 
                                       <!--<select class="custom-select" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="CG">Consulta general</option>
                                                <option value="CE">Control de embarazo</option>
                                        </select>-->
=======
                                         <label style="padding-top: 12px;" >Tipo de consulta<small class="text-muted"></small></label>
                                       <select class="custom-select" name="tipo" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="CG">Consulta general</option>
                                                <option value="CE">Control de embarazo</option>
                                        </select>
                                          <button type="submit" class="btn btn-info" name="btnEnviar">Guardar </button>
                                        
>>>>>>> 903045bd64790fa0c16a226ed1c5740116a3cf03
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