<?php
    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
    $modi = $_GET['ir'];

    //sacar usuarios para bitacora

include_once '../Conexion/conexion.php';
$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora
    ?>

    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
            <div class="card" style="background: rgba(0, 101, 191,0.6)">
                <div class="contenedor-modal" style="float: right; margin-left: 10px; margin-top: 15px;" >
                </div>

                
                
                
                    <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Modificar Insumo | Datos personales</h3>

                    <form action="" method="post">
                        <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                    <div>
                        <h3></h3>
                        <section>

                            <div class="row mb-12">
                               
                                    <?php
                                    include_once '../Conexion/conexion.php';
                                    $sacar = mysqli_query($conexion, "SELECT*FROM t_insumo WHERE ins_codigo AND ins_codigo='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['ins_codigo'];
                                        $nomComercial = $fila['ins_cnombre_comercial'];
                                        $marca = $fila['ins_cmarca'];
                                        $descripcion = $fila['ins_cdescripcion'];
                                    
                                        ?>
                                         <div class="col-lg-4">
                   <label style="padding-top: 12px; color: white">Nombre Comercial<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombreComercial" value="<?php echo $nomComercial; ?>" class="form-control" id="fnamep" placeholder="Ingrese descripcion" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                     <div class="col-lg-4">
                                    <label style="padding-top: 12px; color: white">Marca<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="marca" value="<?php echo $marca; ?>" class="form-control" id="fnamep" placeholder="Ingrese descripcion" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                     <div class="col-lg-4">
                                        <label style="padding-top: 12px; color: white">Descripción<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" id="fnamep" placeholder="Ingrese descripcion" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                        
                                         
                                          <div class="col-lg-4">

                                        <div class="row mb-12" style="float: left;margin-left: 975px; margin-top: 11px;">
                                            <input type="submit"  class="btn btn-info" name="btnEnviar" value="Guardar">
                                        </div>
                                        <div class="row mb-12" style="float: left;margin-left: 875px; margin-top: -34px;">
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

     $nomComercial = $_REQUEST['nombreComercial'];
    $marca = $_REQUEST['marca'];
    $descripcion = $_REQUEST['descripcion'];
    

   

    /*                    $nomComercial = $fila['ins_cnombre_comercial'];
                                        $marca = $fila['ins_cmarca'];
                                        $descripcion = $fila['ins_cdescripcion'];
                                        $presentacion = $fila['ins_cpresentacion'];
                                        $nombreEmpresa = $fila['pro_cnombre_empresa'];
                                        $nombreVendedor = $fila['pro_cnombre_responsable'];
                                        $direccion = $fila['pro_cdireccion'];
                                        $telefono = $fila['pro_ctelefono'];
                                        */
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "UPDATE t_insumo SET ins_cnombre_comercial='$nomComercial',ins_cmarca='$marca',ins_cdescripcion='$descripcion' WHERE ins_codigo AND ins_codigo='$modi'";
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

                //bitacora
        
        ini_set('date.timezone', 'America/El_Salvador');
        $hora = date("H:i:s");
        mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
                . " VALUES('$id','$NombreUsuario','Insumo Modificado',now(),'$hora')");
        //bitacora
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