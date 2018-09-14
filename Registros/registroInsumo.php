<?php 
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombreCom'];
    $marca = $_REQUEST['marca'];
    $descripcion = $_REQUEST['descripcion'];
    $presentacion = $_REQUEST['presentacion'];
    $precio = $_REQUEST['precio'];

    $fecha = date('Y-m-d', strtotime($_REQUEST['fecha']));
  // $partes = explode('-', $fecha);
   // $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
    $esta=1;
    Conexion::abrir_conexion(); 
    $conexionx = Conexion::obtener_conexion();
    
    mysqli_query($conexion,"INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,ins_cpresentacion,ins_dprecio,ins_ffecha_caducidad,estado) VALUES('$nombre','$marca','$descripcion','$presentacion','$precio','$fecha','$esta')"); 

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
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro de Insumos | Datos generales</h3>
                        <form id="example-form" action="" class="m-t-40" method="POST">
                            <div>
                               <section>

                                     <div class="row mb-3">
                                    <div class="col-lg-4">
                                    <label>Nombre Comercial:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="fname"  name="nombreCom" placeholder="Nombre Comercial del Insumo.">                                     
                                    </div>
                                     </div>
                                   
                                     <div class="col-lg-4">
                                    <label>Marca:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="lname" name="marca" placeholder="Marca del Insumo.">                                     
                                    </div>

                                    <div class="col-lg-4">
                                    <label>Descripción:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="lname" name="descripcion" placeholder="Descripción del Producto.">                                     
                                    </div>

                                    <div class="col-lg-4">
                                    <label>Presentación:<small class="text-muted" ></small></label>                                     
                                    <input type="text" class="form-control" id="lname" name="presentacion" placeholder="Detalle la forma de Presentación del Producto."></div>

                                    <div class="col-lg-4">
                                    <label>Precio:<small class="text-muted" ></small></label>                                     
                                    <input type="number" min="0" class="form-control" id="lname" name="precio" placeholder="Digite el precio del Producto.">
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