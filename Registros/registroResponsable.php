<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

if (isset($_REQUEST['nameEnviar'])) {
    include_once '../../Conexion/conexion.php';

    $nombre  = $_REQUEST['nombreCom'];
    echo $nombre;
    $marca = $_REQUEST['marca'];
    echo $marca;
     $descripcion = $_REQUEST['descripcion'];
    echo $descripcion;
    $presentacion = $_REQUEST['presentacion'];
    echo $presentacion;
    $precio = $_REQUEST['precio'];
    echo $precio;
    $fecha = $_REQUEST['fecha'];
    echo $fecha;
    
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "INSERT INTO t_responsable(idresponsable,res_cnombre,res_capellidos,res_cdui,res_ctelefono) VALUES('6','$nombre','$marca','$descripcion','$presentacion')"; 

    //$sql = "INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,ins_cpresentacion,ins_dprecio,ins_ffecha_caducidad) VALUES('$nombre','$marca','$descripcion','$presentacion','$precio','$fecha')"; 
    $sentencia = $conexionx->prepare($sql);
    $usuario_insertado = $sentencia->execute();

    
    
} else {


    ?>
 <div class="page-wrapper" style="height: 671px;">
           
            <div class="container-fluid">
              <div class="card" style="background: rgba(0, 101, 191,0.3)">
                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro Paciente.</h3>
                        <form id="example-form" action="Registros/registroPaciente.php" class="m-t-40" method="POST">
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
                                         <label style="padding-top: 12px;" name="tipo">Tipo de consulta<small class="text-muted"></small></label>
                                       <select class="custom-select" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                                <option value="CG">Consulta general</option>
                                                <option value="CE">Control de embarazo</option>
                                        </select>
                                    </div>

                                    
                                </section>

                                <h3>Encargado.</h3>
                                <section>
                                   <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <label>Nombre<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="nombreRes" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                    <div class="col-lg-6">
                                        <label>Apellido<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="apellidoRes" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                    <div class="col-lg-6">
                                         <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                     <div class="input-group">
                                    <input type="text" name="duiRes" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                </div> 
                                <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                    <label for="acceptTerms">Si el encargado no porta el DUI</label>  
                                    </div>

                                     <div class="col-lg-6">
                                         <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                     <div class="input-group">
                                    <input type="text" name="telefonoRes" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div> 
                                <input id="acceptTerms2" name="acceptTerms" type="checkbox">
                                    <label for="acceptTerms">Si el encargado no posee número telefónico</label>  
                                    </div>

                                </div>

                                </section>
                               
                            </div>
                            
                        </form>
                        <div class="row mb-12" style="float: right; margin-right: 190px; margin-top: -34px;">
                                        <button type="submit" class="btn btn-info">Cancelar1</button>
                                        
                                    </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>



    <?php
    
    include_once '../plantilla/pie.php';
}
?>

