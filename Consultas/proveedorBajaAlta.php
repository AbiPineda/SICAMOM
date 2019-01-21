<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
//sacar usuarios para bitacora
$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora
$llego = $_REQUEST['ir'];
if ($llego != null) {
}
?>
<div class="page-wrapper" style="height: 671px;">
    <br>
    <div class="container-fluid">
        <div class="card" style="background: rgba(0, 101, 191,0.3)">div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <!-- MODAL-->
                        <
                        <h4>Justificación</h4>

                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <!-- **********MODIFICACION******************-->
                        <!--FORMULARIO PARA GUARDAR--><form action="" id="" method="post" class="form-register" >

                            <!--CAPTURA COMO LA ACCION PARA GUARDAR--><input type="hidden" name="guardar" id="pase"/>
                            <!-- **********FIN MODIFICACION******************-->
                            <div class="col-lg-12">                                      
                                <textarea rows="10" cols="61" name="justi"  placeholder="Agregar justificación" onkeypress="return soloLetras(event)"></textarea> 
                            </div>
                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Div de modal-->

        <div class="card-body wizard-content">
            <div class="wrap">
                <script src="../html/js/jquery.min.js" ></script>
                <script src="../html/js/buscaresc.js"></script>
                <div class="search">
                    <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!--Fin Búsqueda-->
            <div class="card" >
                <h3 class="card-title">Dar alta/baja | Datos del proveedor</h3>
                <div class="col-md-12">
                    <div id="bodywrap">
                        <div class="scroll-window-wrapper">
                            <div class="scroll-window">
                                <table class="table table-striped table-hover user-list fixed-header">
                                    <thead>
                                    <th><div>Nombre empresa</div></th>
                                    <th><div>Vendedor</div></th>
                                    <th><div>Dirección</div></th>
                                    <th><div>Teléfono</div></th>
                                    <th><div>Estado</div></th>
                                    <th><div>Acción</div></th>
                                    </thead>
                                    <tbody  class="buscar"> <!--Se manda a llamar la clase del jquey para que haga la búsqueda automaticamente-->
                                        <!-- Donde va el contenido de la tabla-->
<?php
$sacar = mysqli_query($conexion, "SELECT*FROM t_proveedor");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['id_proveedor'];
    $ape = $fila['pro_cnombre_responsable'];
    $nom = $fila['pro_cnombre_empresa'];
    $dui = $fila['pro_cdireccion'];
    $tel = $fila['pro_ctelefono'];
    $fe = $fila['estado'];

    if ($fe == 0) {
        $estado = "Desactivado";
    } else {
        $estado = "Activado";
    }
    ?>
                                            <tr>
                                                <th scope="row"><?php echo $nom; ?></th>
                                                <td data-title="Released"><?php echo $ape; ?></td>

                                                <td data-title="Studio"><?php echo $dui; ?></td>
                                                <td data-title="Worldwide Gross" data-type="currency"><?php echo $tel; ?></td>
                                                <td data-title="Domestic Gross" data-type="currency"><?php echo $estado; ?></td>
                                                    <?php if ($fe == 0) { ?>
                                                    <td class="text"><a href="../Consultas/proveedorBajaAlta.php?ir=<?php echo $modificar; ?>"  class="btn btn-success fas fa-arrow-circle-up">Dar Alta</a></td>
                                                  <?php
                                                } else {
                                                    ?>
                                                    <td class="text"><a href="../Consultas/proveedorBajaAlta.php?ir=<?php echo $modificar; ?>" class="btn btn-warning fas fa-arrow-circle-down" >Dar Baja</a></td>

                                                <?php }
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
</div>


<?php
include_once '../plantilla/pie.php';
echo '<script>swal({
  title: "¿Estas seguro que desea realizar el siguiente proceso?",
  text: "Los datos se modificarán!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Si!",
  cancelButtonText: "No!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {  
   swal("Justifique!", "A continuación ingresará una justificación", "success");
  } else {
    swal("Cancelado", "El cierre fue cancelado", "error");
    location.href="darBajaAltaProveedor.php";
  }
});</script>';
if (isset($_REQUEST['guardar'])) {
    // aqui vamos a guardar la informacion que contiene el modal.
    include_once '../Conexion/conexion.php';

    $sacar = mysqli_query($conexion, "SELECT*FROM t_proveedor WHERE id_proveedor='$llego'");
    while ($fila = mysqli_fetch_array($sacar)) {
        $modificar = $fila['id_proveedor'];
        $estadoUpdate = $fila['estado'];
    }

    $justifi = $_POST['justi'];
    if ($estadoUpdate == 0) {
        mysqli_query($conexion, "UPDATE t_proveedor SET estado=1,justificacion='$justifi' WHERE id_proveedor='$modificar'");
    } else {
        mysqli_query($conexion, "UPDATE t_proveedor SET estado=0,justificacion='$justifi' WHERE id_proveedor='$modificar'");
    }


    echo '<script>swal({
                    title: "Proceso",
                    text: "Exitoso!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="darBajaAltaProveedor.php";
                    
                });</script>';


    //bitacora
    ini_set('date.timezone', 'America/El_Salvador');
    $hora = date("H:i:s");
    mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
            . " VALUES('$id','$NombreUsuario','Se dio de baja al proveedor',now(),'$hora')");
    //bitacora
    //////////////
}
?>

<script type="text/javascript">
                       $('#miModal').modal('show');
</script>