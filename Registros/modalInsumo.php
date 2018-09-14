<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
?>

<div class="page-wrapper" style="height: 671px;">

    <div class="container-fluid">
        <div class="card" style="background: rgba(0, 101, 191,0.3)">
            <!-- MODAL-->
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4>Datos de Proveedor</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <!--<form id="example-form" action="" class="m-t-40" method="POST">-->
                            <!-- **********MODIFICACION******************-->
                            <!--FORMULARIO PARA GUARDAR--><form action="" id="" method="post" class="form-register" >

                                <!--CAPTURA COMO LA ACCION PARA GUARDAR--><input type="hidden" name="guardar" id="pase"/>
                                <!-- **********FIN MODIFICACION******************-->


                                <div class="col-lg-12">
                                    <?php
                                    include_once '../Conexion/conexion.php';
                                    //saco el ultimo registro de la tabla paciente
                                    //porque es el paciente del que se va ha registrar el encargado
                                    //para capturar el id y guardarlo como foranea de la tabla encargado
                                    $paciente = mysqli_query($conexion, "SELECT*FROM t_insumo ORDER BY ins_codigo DESC LIMIT 1");
                                    while ($row = mysqli_fetch_array($paciente)) {
                                        $id = $row['ins_codigo'];
                                        $noPa = $row['ins_cnombre_comercial'];
                                       // $ape = $row['pac_capellidos'];
                                    }
                                    ?>
                                    <label>Insumo<small class="text-muted"></small></label><br>
                                    <div class="input-group">
                                        <input type="text" name="encargado" value="<?php echo $noPa; ?>" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                    </div> <br>

                                    <label>Nombre de Empresa<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="nombreEmp" class="form-control" id="fnamep" placeholder="Ingrese el Nombre de la Empresa" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> <br>
                                    
                                     <label>Nombre del Responsable<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="nombreRes" class="form-control" id="fnamep" placeholder="Ingrese el nombre del Responsable" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> <br>
                                     
                                     <label>Dirección<small class="text-muted"></small></label>
                                    <div class="input-group">
                                         <input type="text" name="direccion" class="form-control" id="fnamep" placeholder="Ingrese dirección" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div><br>
                                     
                                    <label>Teléfono<small class="text-muted"> 9999-9999</small></label>
                                    <div class="input-group">
                                        <input type="text" name="telefonoProv" class="form-control phone-inputmask2" id="phone-mask2"  value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div> 

                                </div>

                               

                               


                               
                                <!--ERROR COMUN Y LO DEJARE AQUI PARA QUE VEAS
                                LA ETIQUETA </form> DETRO DE ELLA SIEMPRE TEIENE QUE ESTAR LOS BOTONES-->

                                <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                <input type="submit" class="btn btn-info" value="Guardar" name="modGuardar">

                                </div>

                                <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                    <button type="submit" class="btn btn-info" name="modCancelar">Cancelar </button>

                                </div>
                            </form>
                           
                        </div>


                    </div>
                </div>
            </div>
            <!-- Fin Div de modal-->



        </div>
    </div>
</div>


<?php
include_once '../plantilla/pie.php';
                            if (isset($_REQUEST['guardar'])) {
                                // aqui vamos a guardar la informacion que contiene el modal.
                                include_once '../Conexion/conexion.php';

                                $nombreEm = $_POST['nombreEmp'];
                                $nombreRes = $_REQUEST['nombreRes'];
                                $direccion = $_REQUEST['direccion'];
                                $telefono = $_REQUEST['telefonoProv'];

////////////
     //  $verificar_insert = mysqli_query($conexion, "SELECT * FROM t_responsable WHERE res_cdui='$dui'");
         $verificar_insert2 = mysqli_query($conexion, "SELECT * FROM t_proveedor WHERE pro_ctelefono='$telefono'");
        if (mysqli_num_rows($verificar_insert2) > 0 ) {
            echo '<script>swal("Teléfono ya existe")
             .then((value) => {
              swal(`Verifique los datos`);
                });</script>';
        }else {
                                 mysqli_query($conexion, "INSERT INTO t_proveedor(fk_insumo,pro_cnombre_empresa,pro_cnombre_responsable,pro_cdireccion,pro_ctelefono)VALUES('$id','$nombreEm','$nombreRes','$direccion','$telefono')");

                                echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroInsumo.php";
                    
                });</script>';
                            }
                         
}

                            ?>

<script type="text/javascript">
    $('#miModal').modal('show');
</script>