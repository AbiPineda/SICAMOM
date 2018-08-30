<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['btnEnviar'])) {
    include_once '../Conexion/conexion.php';

    $nombre  = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido']; 
    
     $dui = $_REQUEST['dui'];
    
    $telefono = $_REQUEST['telefono'];
   
    $fecha = $_REQUEST['fecha'];
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    $tipo = $_REQUEST['tipo'];
=======
=======
>>>>>>> 89f4e850563b1dc94490bf1d651d9221118013cd
=======
>>>>>>> 38e4ecb2acfad515e383d06a997f3fc2e662a06b
=======
>>>>>>> 38e4ecb2acfad515e383d06a997f3fc2e662a06b
  
      $tipo = $_REQUEST['tipo'];
>>>>>>> 89f4e850563b1dc94490bf1d651d9221118013cd
   
    
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "INSERT INTO t_paciente(pac_cnombre,pac_capellidos,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta) VALUES('$nombre','$apellido','$dui','$telefono','$_fecha','$tipo')"; 

   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();

    
    
}
/*
else if(isset($_REQUEST['modGuardar']))
    {
    include_once '../Conexion/conexion.php';

<<<<<<< HEAD
    $nombreR = $_REQUEST['nombreRes'];
    echo $nombreR;
    $apellidoR = $_REQUEST['apellidoRes'];

    $duiR = $_REQUEST['duiRes'];

    $telefonoR = $_REQUEST['telefonoRes'];
=======
    $nombre = $_REQUEST['nombreRes'];
    echo $nombre;
    $apellido = $_REQUEST['apellidoRes'];
    $dui = $_REQUEST['duiRes'];
    $telefono = $_REQUEST['telefonoRes'];
    
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 89f4e850563b1dc94490bf1d651d9221118013cd
=======
>>>>>>> 89f4e850563b1dc94490bf1d651d9221118013cd
=======
>>>>>>> 38e4ecb2acfad515e383d06a997f3fc2e662a06b
=======
>>>>>>> 38e4ecb2acfad515e383d06a997f3fc2e662a06b
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "INSERT INTO t_responsable(res_cnombre,res_capellidos,res_cdui,res_ctelefono) VALUES('$nombreR','$apellidoR','$duiR','$telefonoR')"; 

     $sentencia = $conexionx->prepare($sql);
     $usuario_insertado = $sentencia->execute();
}*/
else {

     ?>
     <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      <div class="contenedor-modal" style="float: right; margin-left: 10px; margin-top: 15px;" >
                              <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#miModal">Registro encargado</button>
                            </div>

                            <!-- MODAL-->
                            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4>Datos generales del encargado</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                  </div>
                                  <div class="modal-body">
                                    
                                    <form>
                                        
                                <div class="col-lg-12">
                                        <label>Nombre<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="nombreRes" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                <div class="col-lg-12">
                                     <label>Apellido<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="apellidoRes" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>                                    
                                    </div>

                                
                                <div class="col-lg-12">
                                         <label>DUI<small class="text-muted"> 99999999-9</small></label>
                                     <div class="input-group">
                                    <input type="text" name="duiRes" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                </div>  
                                    </div>


                                <div class="col-lg-12">
                                         <label>Teléfono<small class="text-muted"> 9999-9999</small></label>
                                     <div class="input-group">
                                    <input type="text" name="telefonoRes" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div> 
                                
                                    </div>   
                                    </form>

                                    <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                    <button type="submit" onclick="M.toast({html: 'Guardando..'})" class="btn btn-info" name="modGuardar">Guardar </button>
                                    
                                    </div>

                                <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                    <button type="submit" class="btn btn-info" name="modCancelar">Cancelar </button>

                                    </div>


                                  </div>
                                </div>
                              </div>
                            </div>
                                <!-- Fin Div de modal-->
                      
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
                                    <input type="text" name="fecha" data-format="yyyy-MM-dd" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">
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
                                         <label style="padding-top: 12px;" >Tipo de consulta<small class="text-muted"></small></label>
                                       <select class="custom-select" name="tipo" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="CG">Consulta general</option>
                                                <option value="CE">Control de embarazo</option>
                                        </select>
                                          <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                          <button type="submit" href="registroPaciente.php" class="btn btn-info" name="btnEnviar">Guardar </button>
                                          </div>
                                         <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                             <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button>
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