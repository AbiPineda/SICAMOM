
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
<<<<<<< HEAD:Registros/CompraInsumo.php
=======
include_once '../Conexion/conexion.php';
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
>>>>>>> 3ddbaa6149adf36f3160173735fbbdd9a5ef03a2:Registros/CompraInsumoAbi.php
    ?>
    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <div class="container-fluid">
<<<<<<< HEAD:Registros/CompraInsumo.php
        <div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__logo">
      
      <h2 class="heading--secondary">Registro de compra</h2>
      <form>

        <div class="row mb-12"> 
=======
            <div class="card" style="background: rgba(0, 101, 191,0.6)">
                
                <div class="wrap">
              <script src="../html/js/jquery.min.js" ></script>
            <script src="../html/js/buscaresc.js"></script>
         <div class="search" center>
            <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
                <div class="col-md-20">
                <table id="tabla" center>
                        <thead>
                        <th><div>Código</div></th>
                        <th><div>Nombre</div></th>
                        </thead>
                   <tbody  class="buscar"> 
    <?php
        $sacar1 = mysqli_query($conexion, "SELECT * FROM t_insumo WHERE estado=1");
            while ($fila = mysqli_fetch_array($sacar1)) {
                $cod=$fila['codigo'];
                $nom=$fila['ins_cnombre_comercial'];  
                      

        ?> 
        <tr>
                <td data-title="Releaseda"><?php echo $cod; ?></td>
                <th scope="row"><?php echo $nom; ?></th>
                
                </td>

       <?php  }?>
      
      </tr>

    </tbody>
  </table>
                </div>
>>>>>>> 3ddbaa6149adf36f3160173735fbbdd9a5ef03a2:Registros/CompraInsumoAbi.php

        <div class="col-lg-3">
         <label style="color: black">Factura #<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

<<<<<<< HEAD:Registros/CompraInsumo.php
       <div class="col-lg-4">
      <label style="color: black">Fecha</label>
        <div class="input-group">
      <input type="text" class="form-control mydatepicker" name="fecha" id="fecha" placeholder="Ingrese">
       <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       </div>
        </div>
        </div>

        <div class="col-lg-4">
         <label style="color: black">Proveedor<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div> 
       </div>
           </div>

           <div class="col-lg-3">
         <label style="color: black">Insumo<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

      <div class="col-lg-4">
      <label style="color: black">Fecha de Caducidad</label>
        <div class="input-group">
      <input type="text" class="form-control mydatepicker" name="fecha" id="fecha" placeholder="Ingrese">
       <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       </div>
        </div>
        </div>

        <div class="col-lg-2">
         <label style="color: black">Cantidad<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

           <div class="col-lg-2">
         <label style="color: black">TOTAL<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
        </div> 
       </div>
           </div>

           <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Agregar" />
          </li>
          
        </ul>
      </div>

    </div>
      </form>
    </div>
    <div class="thumbnail__content text-center">
      
      
    </div>
    <div class="thumbnail__links">
      <ul class="list-inline m-b-0 text-center">
        
        <table id="tabla" >
                          <thead>
                            <tr>
                              <th>Código</th> 
                              <th>Proveedor</th>
                              <th>Insumo</th> 
                              <th>Cant</th>
                              <th>Costo</th>
                              <th>Sub Total</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>BL281</td>
                              <td>La. Lopez</td>
                              <td>Baja lenguas</td>
                              <td>15</td>
                              <td>$22.37</td>
                              <td>$335.55</td>
                              <td>---</td>
                            </tr>
                           
                            
                          </tbody>
                        </table>
      </ul>
    </div>
    <div class="signup__overlay"></div>
  </div>

  <div class="container__child signup__form">
   
     <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      <th><div>Código</div></th>
      <th><div>Nombre</div></th>
      
      <th><div></div></th>
    </thead>
    <tbody>
      <tr>
        <td>AH754</td>
        <td>Baja lengua</td>
        
      </tr>

      <tr>
        <td>AH754</td>
        <td>Gel antibacterial</td>
        
      </tr>
=======
                  
                  

                  <div class="col-md-1">
                      <?php
                                          include_once '../Conexion/conexion.php';
                                         // $result=$conexion->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'clinica' AND TABLE_NAME = 'compras'");
				   
                                          $pro= mysqli_query($conexion,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'clinica' AND TABLE_NAME = 't_compra'");
                                           $row = $pro->fetch_array();
                          
                                    ?>
                    <label style="color: white;" for="gender"># Factura</label>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <input type="text" class="form-control" aria-describedby="basic-addon1" id="country" value="<?php echo $row['AUTO_INCREMENT'] ?>" readonly>
                    </div>
                  </div>

                   <div class="col-md-2">
                    <label style="color: white;" for="gender">Fecha de compra</label>
                    <?php
                    date_default_timezone_set('America/El_Salvador');
                    ?>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control" aria-describedby="basic-addon1" id="FeActual" value="<?=date('d/m/y g:ia');?>" disabled>
                    </div>
                  </div>

                   <div class="col-md-1">
                    <label style="color: white;" for="gender">Código</label>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="text" class="form-control" aria-describedby="basic-addon1" id="codigo" required>
                    </div>
                  </div>
>>>>>>> 3ddbaa6149adf36f3160173735fbbdd9a5ef03a2:Registros/CompraInsumoAbi.php

      <tr>
        <td>MY843</td>
        <td>Guantes</td>
        
      </tr>
      
    </tbody>
  </table>
  </div>

<<<<<<< HEAD:Registros/CompraInsumo.php
  <div class="col-lg-12">
          <div class="input-group">                         
          <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Buscar.." class="form-control">
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div> 
       </div>
           </div>
      
      
  </div>
</div>
=======
                  <div class="col-md-1">
                    <label style="color: white;" for="gender">Cantidad</label>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <input type="numeric" class="form-control" aria-describedby="basic-addon1" id="country" required>
                    </div>
                  </div>


                </div>

                <div class="row col-md-12">

               

                                    <!-- Tabla de compra -->
                                    <table id="tabla">
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

            </div>
>>>>>>> 3ddbaa6149adf36f3160173735fbbdd9a5ef03a2:Registros/CompraInsumoAbi.php

          </div>


            <!-- ============================================================== --> 

            <?php
            include_once '../plantilla/pie.php';

//        ?>

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
       
        <script>
            var table = document.getElementById('tabla');
            for(var i = 1; i<table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    document.getElementById("codigo").value = this.cells[0].innerHTML;
               };
            }
            </script>