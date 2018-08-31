<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['modGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombreRes'];
    echo $nombre;
    $apellido = $_REQUEST['apellidoRes'];
    $dui = $_REQUEST['duiRes'];
    $telefono = $_REQUEST['telefonoRes'];
  
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "INSERT INTO t_responsable(res_cnombre,res_capellidos,res_cdui,res_ctelefono) VALUES('$nombreRes','$apellidoRes','$duiRes','$telefonoRes')"; 

   $sentencia = $conexionx->prepare($sql);
   $usuario_insertado = $sentencia->execute();

    
    
}

else {

    ?>
<
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
                                    
                                    <form id="example-form" action="" class="m-t-40" method="POST">
                                        
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
                                        <button type="submit" class="btn btn-info" name="modGuardar" id="Guardar">Guardar </button>
                                    
                                    </div>

                                <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                    <button type="submit" class="btn btn-info" name="modCancelar">Cancelar 


                                    </button>

                                    </div>


                                  </div>
                                </div>
                              </div>
                            </div>
                         
                     </div>
                </div>
         </div>

             
 <?php
    
    include_once '../plantilla/pie.php';
}
?>
