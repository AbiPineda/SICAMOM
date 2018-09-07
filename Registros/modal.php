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

                            <h4>Datos generales del encargado</h4>
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
                                    $paciente = mysqli_query($conexion, "SELECT*FROM t_paciente ORDER BY id_paciente DESC LIMIT 1");
                                    while ($row = mysqli_fetch_array($paciente)) {
                                        $id = $row['id_paciente'];
                                        $noPa = $row['pac_cnombre'];
                                        $ape = $row['pac_capellidos'];
                                    }
                                    ?>
                                    <label>Paciente<small class="text-muted"></small></label><br>
                                    <div class="input-group">
                                        <input type="text" name="encargado" value="<?php echo $noPa . " " . $ape; ?>" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                    </div> <br>

                                    <label>Nombre<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="nombreRes" class="form-control" id="fnamep" placeholder="Ingrese nombre" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> 

                                </div>

                                <div class="col-lg-12">
                                    <label>Apellido<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="apellidoRes" class="form-control" id="fnamep" placeholder="Ingrese apellido" value="" required autocomplete="off">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>                                    
                                </div>


                                <div class="col-lg-12">
                                    <label>DUI<small class="text-muted"> 99999999-9</small></label>
                                    <div class="input-group">
                                        <input type="text" name="duiRes" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI" value="" required> 
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                    </div>  
                                </div>


                                <div class="col-lg-12">
                                    <label>Teléfono<small class="text-muted"> 9999-9999</small></label>
                                    <div class="input-group">
                                        <input type="text" name="telefonoRes" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
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

            <div class="card-body wizard-content">
                <h3 class="card-title">Registro Paciente.</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                <form action="" id="f1" name="f1" method="post" class="form-register" >
                    <input type="hidden" name="tirar" id="pase"/>
                    <div>
                        <h3>Datos personales</h3>
                        <section>
                            <div class="row mb-12">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label>Nombre<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombre" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="col-lg-3">
                                        <label>Apellido<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="apellido" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <div class="col-lg-3">
                                        <label>Fecha de nacimiento<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <!--<input type="date" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">-->
                                            <input type="date" name="user_date" class="form-control" id="user_date" onChange="javascript:calcularEdad();"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>

                                        </div> 
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Edad<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <!--<input type="date" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">-->
                                            <input name="inp" id="inp" class="form-control"> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>


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

                                <div class="col-lg-3">
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

                                <div class="col-lg-3">
                                    <label style="padding-top: 12px;" >Tipo de consulta<small class="text-muted"></small></label>
                                    <select class="custom-select" name="tipo" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <option value="CG">Consulta general</option>
                                        <option value="CE">Control de embarazo</option>
                                    </select>
                                    <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                        <input type="submit" class="btn btn-info" name="btnEnviar" value="Guardar">
                                    </div>
                                    <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                        <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button>
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