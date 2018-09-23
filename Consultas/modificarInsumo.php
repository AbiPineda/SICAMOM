<?php
    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
    $modi = $_GET['ir'];
    ?>

    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
            <div class="card" style="background: rgba(0, 101, 191,0.3)">
                <div class="contenedor-modal" style="float: right; margin-left: 10px; margin-top: 15px;" >
                </div>

                    <div class="card-body wizard-content">
                    <h3 class="card-title">Modificar Insumo | Datos personales</h3>

                    <form action="modificarInsumo.php" method="post">
                        <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                    <div>
                        <h3></h3>
                        <section>

                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <?php
                                    include_once '../Conexion/conexion.php';
                                    $sacar = mysqli_query($conexion, "SELECT*FROM t_insumo, detalle_insumo WHERE ins_codigo=id_detalle AND ins_codigo='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['ins_codigo'];
                                        $des = $fila['ins_cdescripcion'];
                                        $uni = $fila['unidad'];
                                        

                                        ?>
                                        <label style="padding-top: 12px;">Descripción<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombre" value="<?php echo $des; ?>" class="form-control" id="fnamep" placeholder="Ingrese descripcion" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="col-lg-4">
                                        <label style="padding-top: 12px;">Unidades<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="number" name="apellido" value="<?php echo $uni; ?>" class="form-control" id="fnamep" placeholder="Ingrese unidades" autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>                                    
                                    </div>

                                   

                                    
                                    <div class="col-lg-4">

                                        <div class="row mb-12" style="float: left;margin-left: 850px; margin-top: 11px;">
                                            <input type="submit"  class="btn btn-info" name="btnEnviar" value="Guardar">
                                        </div>
                                        <div class="row mb-12" style="float: left;margin-left: 750px; margin-top: -34px;">
                                            <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button>
                                        </div>

                                    </div>
                            </div>
                                    <?php
                                }
                                ?>
                        </section>

                    </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <?php
    include_once '../plantilla/pie.php';



if (isset($_REQUEST['btnEnviar'])) {
    $modi = $_REQUEST['tirar'];
    include_once '../Conexion/conexion.php';

    $des = $_REQUEST['nombre'];
    echo $nombre;
    $uni = $_REQUEST['apellido'];
   
  

    /*                    $ape = $fila['pac_capellidos'];
                                        $nom = $fila['pac_cnombre'];
                                        $dui = $fila['pac_cdui'];
                                        $tel = $fila['pac_ctelefono'];
                                        $fe = $fila['pac_ffecha_nac'];*/
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "UPDATE t_insumo, detalle_insumo SET ins_cdescripcion='$des',unidad='$uni' WHERE ins_codigo=id_detalle AND ins_codigo='$modi'";
    $sentencia = $conexionx->prepare($sql);
    $usuario_insertado = $sentencia->execute();
        echo '<script>swal({
                    title: "Registro Modificado",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="consultaInsumoMod.php";
                    
                });</script>';
} 
?>

<script>
function soloLetras(e) {
    textoArea = document.getElementById("fnamep").value;
    var total = textoArea.length;
    if (total == 0) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toString();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
      especiales = [8, 9, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }
      if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        alert('No puedes comenzar escribiendo numeros');
      }
    }
  }
</script>