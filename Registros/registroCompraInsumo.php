
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
//$codigo1 = '';
//if (isset($_REQUEST['btnGuardar'])) {
//    include_once '../Conexion/conexion.php';
//    $codigo = $_REQUEST['codigo'];
//    $nombre = $_REQUEST['nombreCom'];
//    $marca = $_REQUEST['marca'];
//    $descripcion = $_REQUEST['descripcion'];
//    $caducidad = $_REQUEST['tipoCaducidad'];
//    $presentacion = $_REQUEST['presentacion'];
//    if ($caducidad == '0') {
//        $fecha = date('Y-m-d', strtotime($_REQUEST['fecha']));
//    } else {
//        $fecha = '0000-00-00';
//    }
//    // $partes = explode('-', $fecha);
//    // $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
//    $esta = 1;
//    //$numero = rand(100,1000);
//    //$codigo1 = (strtoupper((substr($nombre, 0, 3))) . $numero); 
//    // $anio = date("y");
//
//
//    Conexion::abrir_conexion();
//    $conexionx = Conexion::obtener_conexion();
//
//    mysqli_query($conexion, "INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,ins_cpresentacion,ins_ffecha_caducidad,estado,codigo) VALUES('$nombre','$marca','$descripcion','$presentacion','$fecha','$esta','$codigo')");
//    $insumo = mysqli_query($conexion, "SELECT*FROM t_insumo ORDER BY ins_codigo DESC LIMIT 1");
//    while ($row = mysqli_fetch_array($insumo)) {
//        $id = $row['ins_codigo'];
//        $paquete = $_REQUEST['paquete'];
//        $unidad = $_REQUEST['unidad'];
//    }
//    mysqli_query($conexion, "INSERT INTO detalle_insumo(fk_insumo,unidad,paquete) VALUES('$id','$unidad','$paquete')");
//    echo '<script>swal({
//                    title: "Exito",
//                    text: "Insumo Guardado!",
//                    type: "success",
//                    confirmButtonText: "Aceptar",
//                    closeOnConfirm: false
//                },
//                function () {
//                    location.href="registroInsumo.php";
//                    
//                });</script>';
//
//
//
//    //  $sentencia = $conexionx->prepare($sql);
//    //$usuario_insertado = $sentencia->execute();
//}
    ?>
    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <div class="container-fluid">
            <div class="card" style="background: rgba(0, 101, 191,0.6)">


                <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Registro de Compra | Insumo</h3>
                    <form id="f1" name="f1" action="" class="m-t-40" method="POST" autocomplete="off">
                        <input type="hidden" name="tirar" id="pase"/>
                        <div>
                            <section>

                                <div class="row mb-12"> 

                                  <div class="col-lg-3">
                                        <label style="color: white">Fecha de Compra<small class="text-muted" ></small></label>  
                                         <div class="input-group">
                                             <?php
                                             date_default_timezone_set('America/El_Salvador');
                                             ?>
                                             <input type="text" class="form-control" id="FeActual"  name="FeActual" placeholder="Fecha Actual" value="<?=date('d/m/y g:ia');?>" >
                                         <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                    </div>

                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <label style="color: white">Proveedor<small class="text-muted"></small></label>
                                        <select class="custom-select" name="proveedor" id="proveedor" style="width: 100%; height:36px;" >
                                             <?php
                                          include_once '../Conexion/conexion.php';
                                          $pro= mysqli_query($conexion,"SELECT*from t_proveedor WHERE estado=1");
                              ?>
                            <option value="None" disabled selected required>Seleccione</option>
                            <?php
                             while ($row = mysqli_fetch_array($pro)) {
                                         $prove=$row['id_proveedor'];
                                           echo '<option value='."$row[0]".'>'.$row['1'].'</option>';
                                    }
                                    ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Insumo<small class="text-muted"></small></label>
                                        <select class="custom-select" name="insumo" id="insumo" style="width: 100%; height:36px;" >
                                             <?php
                                          include_once '../Conexion/conexion.php';
                                          $ins= mysqli_query($conexion,"SELECT*from t_insumo WHERE estado=1");
                              ?>
                            <option value="None" disabled selected required>Seleccione</option>
                            <?php
                             while ($row = mysqli_fetch_array($ins)) {
                                           
                                           echo '<option value='."$row[0]".'>'.$row['1'].' '.$row['3'].'</option>';
                                    }
                                    ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Fecha de Caducidad</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mydatepicker" name="fecha" id="fecha" placeholder="Ingrese">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Cantidad<small class="text-muted" ></small></label>
                                          <div class="input-group">                         
                                        <input type="number" min="0" class="form-control" id="Cpaquete" name="Cpaquete" placeholder="Ingrese" value="" required>
                                        <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            </div> 
                                           </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Unidad por paquete<small class="text-muted" ></small></label>     
                                        <div class="input-group">                                  
                                        <input type="number" min="0" class="form-control" id="unidad" name="unidad" placeholder="Ingrese" value="" required >
                                        <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            </div> 
                                    </div>
                                    </div>

                                   

                                     <div class="col-lg-3">
                                        <label style="color: white">Precio por paquete<small class="text-muted" ></small></label>     
                                        <div class="input-group">                                  
                                            <input type="number" placeholder="0.00" required name="price" min="0" value="0" step="0.01" class="form-control" id="precioPa" name="precioPa" onChange="javascript:totalPrecio()" placeholder="Precio" value="" required >
                                        <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            </div> 
                                    </div>
                                    </div>

                                     <div class="col-lg-3">
                                        <label style="color: white">Total<small class="text-muted" ></small></label>  
                                         <div class="input-group">
                                             <input type="text" class="form-control" id="Tpagar"  name="Tpagar" placeholder="Total" disabled>
                                         <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                    </div>

                                    </div>
                                    
                                    

                                    <div class="col-lg-7" >


                                      <div class="col-md-1 pull-right">
                                            <input type="submit" class="btn btn-info" name="btnCancelar" id="boton" value="Cancelar">
                                        </div>

                                        <div class="col-md-2 pull-right">
                                            <input type="submit" class="btn btn-info" name="btnComprar" id="boton" value="Comprar">
                                        </div>
                                        
                                        <div class="col-md-2 pull-right">
                                            <input type="submit" class="btn btn-info" name="btnAgregar" id="boton" value="Agregar">
                                        </div>

                                    </div> 

                                    <!-- Tabla de compra -->
                                    <table>
  <thead>
    <tr>
      <th>Código</th>
      <th>Proveedor</th>
      <th>Insumo</th>
      <th>Cantidad</th>
      <th>Costo</th>
      <th>Total</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Apple</td>
      <td>Red</td>
      <td>These are red.</td>
      <td>AAAAAAA</td>
      <td>BBBBBBB</td>
      <td>CCCCCCC</td>
      <td>DDDDDDD</td>
    </tr>
    <tr>
      <td>Pear</td>
      <td>Green</td>
      <td>These are green.</td>
       <td>AAAAAAA</td>
      <td>BBBBBBB</td>
      <td>CCCCCCC</td>
      <td>DDDDDDD</td>
    </tr>
     <tr>
      <td>Pear</td>
      <td>Green</td>
      <td>These are green.</td>
       <td>AAAAAAA</td>
      <td>BBBBBBB</td>
      <td>CCCCCCC</td>
      <td>DDDDDDD</td>
    </tr>
    
  </tbody>
</table>
                                </div>
                        </div>
                    </form>
                </div>

            </div>




            <!-- ============================================================== --> 

            <?php
            include_once '../plantilla/pie.php';
        if (isset($_REQUEST['tirar'])) {
         include_once '../Conexion/conexion.php';
         $prove=$_REQUEST['proveedor'];
         $insumo=$_REQUEST['insumo'];
         $caducidad=$_REQUEST['tipoCaducidad'];
         $tipo=$_REQUEST['tipo'];
          $cantidad=$_REQUEST['Cpaquete'];
          //tira un error por que el campo viene vacio
          if (isset($_REQUEST['unidad'])!=null){
          $uni=$_REQUEST['unidad'];
          }else{
              $uni=0;
          }
          $presen=$_REQUEST['presentacion'];
          $precio=$_REQUEST['precioPa'];
          $total=$_REQUEST['Tpagar'];
          
           if ($caducidad == '0') {
        $fecha = date('Y-m-d', strtotime($_REQUEST['fecha']));
    } else {
        $fecha = '0000-00-00';
    }
          mysqli_query($conexion, "INSERT INTO t_compra(fk_proveedor,fk_insumo,presentacion,fecha_caducidad,precio_unitario,cantidad,unidad,total) "
                  . "VALUES('$prove','$insumo','$presen','$fecha','$precio','$cantidad','$uni','$total')");
        echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroCompraInsumo.php";
                    
                });</script>';
         
        }
        ?>
            <script type="text/javascript">
                function totalPrecio(){
        var Cpaquete=document.getElementById("Cpaquete").value;
        var precio=document.getElementById("precioPa").value;
        var calculo=Cpaquete*precio;
        document.f1.Tpagar.value =calculo;
                }
                </script>
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
       
        