<?php 
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombreCom'];
    $marca = $_REQUEST['marca'];
    $descripcion = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];
    $presentacion = $_REQUEST['presentacion'];
    $fecha = date('Y-m-d', strtotime($_REQUEST['fecha']));
    
  // $partes = explode('-', $fecha);
   // $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
    $esta=1;
    Conexion::abrir_conexion(); 
    $conexionx = Conexion::obtener_conexion();
    
    mysqli_query($conexion,"INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,ins_cpresentacion,ins_dprecio,ins_ffecha_caducidad,estado) VALUES('$nombre','$marca','$descripcion','$presentacion','$precio','$fecha','$esta')"); 

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
                    location.href="modalInsumo.php";
                    
                });</script>';
   
  //  $sentencia = $conexionx->prepare($sql);
    //$usuario_insertado = $sentencia->execute();
} else {
    ?>
 <div class="page-wrapper" style="height: 671px;">
     
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro de Insumos | Datos generales</h3>
                        <form id="example-form" action="" class="m-t-40" method="POST">
                            <div>
                               <section>

                                     <div class="row mb-12">
                                    <div class="col-lg-4">
                                    <label>Nombre Comercial:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="fname"  name="nombreCom" placeholder="Nombre Comercial del Insumo.">                                     
                                    </div>
                                    
                                   
                                     <div class="col-lg-3">
                                    <label>Marca:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="lname" name="marca" placeholder="Marca del Insumo.">                                     
                                    </div>

                                    <div class="col-lg-3">
                                    <label>Descripción:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="lname" name="descripcion" placeholder="Descripción de Insumo.">                                     
                                    </div>
                                   
                               
                                    <div class="col-lg-2">
                                    <label>Precio:<small class="text-muted" ></small></label>                                     
                                    <input type="number" min="0" class="form-control" id="lname" name="precio" placeholder="Digite Precio">
                                    </div>
                                    
                                    <div class="col-lg-4">
                                 <label>Fecha de Caducidad:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control mydatepicker" name="fecha" placeholder="Ingrese fecha de Caducidad." max="2019-01-01" min="2016-01-01" onChange="javascript:validate_fecha($_fecha);">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                    </div>
                                 
                                   <div class="col-lg-4">
                                     <label>Tipo de Insumo<small class="text-muted"></small></label>
                                     <select class="custom-select" name="tipo" id="tipo" style="width: 100%; height:36px;" >
                                         
                                                <option value="Contable" selected>Contables</option>
                                                <option value="No contable">No contables</option>
                                        </select>
                                  </div>
                                   
                                   <div class="col-lg-4">
                                    <label>Presentación:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="lname" name="presentacion" placeholder="Descripción del Producto.">                                     
                                    </div>
                                   
                                   <div class="col-lg-2">
                                    <label>Cantidad de Paquete:<small class="text-muted" ></small></label>                                     
                                    <input type="number" class="form-control" id="lname" name="paquete" placeholder="Cantidad de Paquete." >
                                    </div>
                                   
                                   <div class="col-lg-2">
                                    <label>Unidad:<small class="text-muted" ></small></label>                                     
                                    <input type="number" min="0" class="form-control" id="unidad" name="unidad" placeholder="Cantidad de Unidades." >
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
                 </div>
                    </div>
                
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
$( function() {
    $("#tipo").change( function() {
        if ($(this).val() === "No contable") {
            $("#unidad").prop("disabled", true);
        } else {
            $("#unidad").prop("disabled", false);
        }
    });
});
    </script>