<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


 $modi= $_GET['ir'];
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
        <form id="example-form" action="consultaExpediente.php" class="m-t-40" method="POST">
              
            <input type="hidden" name="tirar" id="pase"/>
                            <div>
                                <h3>Datos personales</h3>
                                <section>

                                     <div class="row mb-3">
                                    <div class="col-lg-4">
        <?php
              include_once '../Conexion/conexion.php';                   
       $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente WHERE id_paciente='$modi'");
            while ($fila = mysqli_fetch_array($sacar)) {
                  $modificar=$fila['id_paciente']; 
                 $ape=$fila['pac_capellidos'];  
                 $nom=$fila['pac_cnombre'];  
                 $dui=$fila['pac_cdui'];  
                 $tel=$fila['pac_ctelefono'];  
                 $fe=$fila['pac_ffecha_nac'];  
            
        ?>
                                        <label>Nombre<small class="text-muted"></small></label>
                                     <div class="input-group">
                                         <input type="text" name="nombre" value="<?php echo $nom;?>" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                   <div class="col-lg-4">
                                     <label>Apellido<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="apellido" value="<?php echo $ape;?>" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>                                    
                                    </div>

                                    <div class="col-lg-4">
                                   <label>Fecha de nacimiento<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="fecha" value="<?php echo $fe;?>" data-format="yyyy-MM-dd" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>                              
                                    </div>


                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                     <div class="input-group">
                                    <input type="text" name="dui" value="<?php echo $dui;?>" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                </div> 
                                  
                                    </div>

                                    <div class="col-lg-4">
                                         <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                     <div class="input-group">
                                    <input type="text" name="telefono" value="<?php echo $tel;?>" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div> 
                                 </div>
                                         <div class="col-lg-4">
                                         
                                          <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                   <input type="submit"  class="btn btn-info" name="btnEnviar" value="Guardar">
                                          </div>
                                         <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                             <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button>
                                         </div>

                                        </div>
                                          

                                    
         <?php }?>
                                    </section>

                                </div>
                            </form>

                        </div>


                     </div>
                </div>
         </div>

             
 <?php
    
    include_once '../plantilla/pie.php';
    
     if (isset($_REQUEST['tirar'])) {
    include_once '../Conexion/conexion.php';    
    
    $nombre = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido'];
    $dui = $_REQUEST['dui'];
   
    
    mysqli_query($conexion,"UPDATE t_paciente SET pac_cnombre='$nombre' WHERE id_paciente='$modi'"); 

    
    
}
?>