
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
$codigo1 = '';
if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';
    $codigo = $_REQUEST['codigo'];
    $nombre = $_REQUEST['nombreCom'];
    $marca = $_REQUEST['marca'];
    $descripcion = $_REQUEST['descripcion'];
    $caducidad = $_REQUEST['tipoCaducidad'];
    $presentacion = $_REQUEST['presentacion'];
    if ($caducidad == '0') {
        $fecha = date('Y-m-d', strtotime($_REQUEST['fecha']));
    } else {
        $fecha = '0000-00-00';
    }
    // $partes = explode('-', $fecha);
    // $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
    $esta = 1;
    //$numero = rand(100,1000);
    //$codigo1 = (strtoupper((substr($nombre, 0, 3))) . $numero); 
    // $anio = date("y");


    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();

    mysqli_query($conexion, "INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,ins_cpresentacion,ins_ffecha_caducidad,estado,codigo) VALUES('$nombre','$marca','$descripcion','$presentacion','$fecha','$esta','$codigo')");
    $insumo = mysqli_query($conexion, "SELECT*FROM t_insumo ORDER BY ins_codigo DESC LIMIT 1");
    while ($row = mysqli_fetch_array($insumo)) {
        $id = $row['ins_codigo'];
        $paquete = $_REQUEST['paquete'];
        $unidad = $_REQUEST['unidad'];
    }
    mysqli_query($conexion, "INSERT INTO detalle_insumo(fk_insumo,unidad,paquete) VALUES('$id','$unidad','$paquete')");
    echo '<script>swal({
                    title: "Exito",
                    text: "Insumo Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroInsumo.php";
                    
                });</script>';



    //  $sentencia = $conexionx->prepare($sql);
    //$usuario_insertado = $sentencia->execute();
} else {
    ?>
    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <div class="container-fluid">
            <div class="card" style="background: rgba(0, 101, 191,0.6)">


                <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Registro de Insumos | Datos generales</h3>
                    <form id="example-form" action="" class="m-t-40" method="POST" autocomplete="off">
                        <div>
                            <section>

                                <div class="row mb-12"> 
                                    <div class="col-lg-2">
                                        <label style="color: white">Código<small class="text-muted" ></small></label>  
                                         <div class="input-group">
                                        <input type="text" class="form-control" id="fname"  name="codigo" placeholder="Código">
                                         <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                        </div>
                                    </div>

                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Nombre Comercial<small class="text-muted" ></small></label>   
                                         <div class="input-group">                                  
                                        <input type="text" class="form-control" id="nombreCom"  name="nombreCom" placeholder="Nombre del insumo" onkeypress="return soloLetras(event)" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-notes-medical"></i></span>
                                        </div>
                                        </div>                                     
                                    </div>


                                    <div class="col-lg-3">
                                        <label style="color: white">Marca<small class="text-muted" ></small></label>  
                                        <div class="input-group">                                 
                                        <input type="text" class="form-control" id="lname" name="marca" placeholder="Marca del insumo" onkeypress="return sinCaracterEspecial(event)" value="" required>       
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-registered"></i></span>
                                        </div>
                                        </div>                              
                                    </div>

                                    <div class="col-lg-4">
                                         
                                        <label style="color: white">Descripción<small class="text-muted" ></small></label>
                                        <div class="input-group">                                    
                                        <input type="text" class="form-control" id="lname" name="descripcion" placeholder="Descripción de insumo" onkeypress="return sinCaracterEspecial(event)" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                        </div>
                                        </div>                                     
                                    </div>


                                    <div class="col-lg-2">
                                        <label style="color: white">Caducidad<small class="text-muted"></small></label>
                                        <select class="custom-select" name="tipoCaducidad" id="tipoCaducidad" style="width: 100%; height:36px;" >

                                            <option value="0" selected>Tiene Caducidad</option>
                                            <option value="1">No tiene Caducidad</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label style="color: white">Fecha de Caducidad:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mydatepicker" name="fecha" id="fecha" placeholder="Ingrese fecha de Caducidad.">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Tipo de Insumo<small class="text-muted"></small></label>
                                        <select class="custom-select" name="tipo" id="tipo" style="width: 100%; height:36px;" >

                                            <option value="Contable" selected>Contable</option>
                                            <option value="No contable">No contable</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label style="color: white">Presentación<small class="text-muted" ></small></label>
                                         <div class="input-group">                                   
                                        <input type="text" class="form-control" id="lname" name="presentacion" placeholder="Presentación del insumo" onkeypress="return sinCaracterEspecial(event)" value="" required>
                                        <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>
                                        </div>                                     
                                    </div>

                                    <div class="col-lg-2">
                                        <label style="color: white">Cantidad de Paquete<small class="text-muted" ></small></label>
                                          <div class="input-group">                         
                                        <input type="number" min="0" class="form-control" id="lname" name="paquete" placeholder="Paquetes" value="" required>
                                        <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            </div> 
                                           </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <label style="color: white">Unidad<small class="text-muted" ></small></label>     
                                        <div class="input-group">                                  
                                        <input type="number" min="0" class="form-control" id="unidad" name="unidad" placeholder="Unidades" value="" required >
                                        <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            </div> 
                                    </div>
                                    </div>

                                    <div class="col-lg-12">

                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                            <button type="submit" class="btn btn-info" name="btnGuardar" id="boton">Guardar </button>
                                        </div>
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                            <button type="reset" class="btn btn-info" name="Cancelar" id="Cancelar">Cancelar </button>
                                        </div>

                                    </div> 
                                </div>
                        </div>
                    </form>
                </div>

            </div>




            <!-- ============================================================== --> 

            <?php
            include_once '../plantilla/pie.php';
        }
        ?>
        <script type="text/javascript">
            /**
             * Funcion que devuelve true o false dependiendo de si la fecha es correcta.
             * Tiene que recibir el dia, mes y año
             */
            function isValidDate(day, month, year)
            {
                var dteDate;
                month = month - 1;
                dteDate = new Date(year, month, day);
                return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
            }
            function validate_fecha(fecha)
            {
                var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
                if (fecha.search(patron) == 0)
                {
                    var values = fecha.split("-");
                    if (isValidDate(values[2], values[1], values[0]))
                    {
                        return true;
                    }
                }
                return false;
            }
        </script>
        <script>
            $(function () {
                $("#tipo").change(function () {
                    if ($(this).val() === "No contable") {
                        $("#unidad").prop("disabled", true);
                    } else {
                        $("#unidad").prop("disabled", false);
                    }
                });
            });
        </script>
        <script>
            $(function () {
                $("#tipoCaducidad").change(function () {
                    if ($(this).val() === "1") {
                        $("#fecha").prop("disabled", true);
                    } else {
                        $("#fecha").prop("disabled", false);
                    }
                });
            });
        </script>    

        <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
        <script>
            $(document).ready(function () {
                $("#nombreCom").keyup(function () {

                    var value = $(this).val();
                    $cod = value.substr(0, 3).toUpperCase();
                    if (value != "") {
                        var numero = Math.floor(Math.random() * (999 - 100)) + 100;
                        $codigo = $cod + numero;
                        $("#fname").val($codigo);
                    } else {
                        $("#fname").val("");
                    }

                });
            });
        </script>

        <script>
            function soloLetras(e) {
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key).toLowerCase();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                especiales = "8-37-38-46-164";
                teclado_especial = false;
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true;
                        break;
                    }
                }
                if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                }
            }
        </script>

        <script>
            function sinCaracterEspecial(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                //Tecla de retroceso para borrar, siempre la permite
                if (tecla == 8) {
                    return true;
                }
                // Patron de entrada, en este caso solo acepta numeros, letras, espacio.
                patron = /[A-Za-z0-9 ]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>