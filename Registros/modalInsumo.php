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

                            <h4>Datos extras de Insumo Médico</h4>
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

                                    <label>Precio<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="precio" class="form-control" id="fnamep" placeholder="Ingrese precio" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> <br>
                                    
                                     <label>Cantidad<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="cantidad" class="form-control" id="fnamep" placeholder="Ingrese cantidad" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> <br>
                                     
                                     <label>Fecha de Caducidad<small class="text-muted"></small></label>
                                    <div class="input-group">
                                         <input type="text" class="form-control mydatepicker" name="fecha" placeholder="Ingrese fecha de Caducidad." max="2019-01-01" min="2016-01-01">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> 

                                </div>

                               

                               


                               
                                <!--ERROR COMUN Y LO DEJARE AQUI PARA QUE VEAS
                                LA ETIQUETA </form> DETRO DE ELLA SIEMPRE TEIENE QUE ESTAR LOS BOTONES-->

                                <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                    <!--yo lo utilizo tipo input porque asi me funciona--><input type="submit" class="btn btn-info" value="Guardar" name="modGuardar">

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

                                $nombre_res = $_POST['nombreRes'];
                                $apellido = $_REQUEST['apellidoRes'];
                                $dui = $_REQUEST['duiRes'];
                                $telefono = $_REQUEST['telefonoRes'];

////////////
       $verificar_insert = mysqli_query($conexion, "SELECT * FROM t_responsable WHERE res_cdui='$dui'");
         $verificar_insert2 = mysqli_query($conexion, "SELECT * FROM t_responsable WHERE res_ctelefono='$telefono'");
        if (mysqli_num_rows($verificar_insert) > 0 || mysqli_num_rows($verificar_insert2) > 0 ) {
            echo '<script>swal("DUI o Teléfono ya existen")
             .then((value) => {
              swal(`Verifique los datos`);
                });</script>';
        }else {
                                 mysqli_query($conexion, "INSERT INTO t_responsable(t_paciente,res_cnombre,res_capellidos,res_cdui,res_ctelefono)"
                                        . " VALUES('$id','$nombre_res','$apellido','$dui','$telefono')");

                                echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroPaciente.php";
                    
                });</script>';
                            }
                                //////////////
}

                            ?>

<script type="text/javascript">
    $('#miModal').modal('show');
</script>