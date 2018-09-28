<?php
    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
    $modi = $_GET['ir1'];
    ?>

    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
            <div class="card" style="background: rgba(0, 101, 191,0.6)">
                <div class="contenedor-modal" style="float: right; margin-left: 10px; margin-top: 15px;" >
                </div>

                    <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Modificar Paciente | Datos personales</h3>

                    <form action="modificarPacienteMenor.php" method="post">
                        <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                    <div>
                        <h3></h3>
                        <section>
                        
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <?php
                                    include_once '../Conexion/conexion.php';
                                    $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente, t_responsable WHERE id_paciente='$modi' AND t_paciente=id_paciente");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['id_paciente'];
                                        $ape = $fila['pac_capellidos'];
                                        $nom = $fila['pac_cnombre'];
                                        $resnombre=$fila['res_cnombre'];
                                        $resapellidos=$fila['res_capellidos'];
                                         $dui=$fila['res_cdui'];  
                                        $tel=$fila['res_ctelefono']; 

                                        

                                        ?>

                                        <label style="padding-top: 12px; color: white">Nombre del Paciente<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombre" value="<?php echo $nom; ?>" class="form-control" id="fnamep" placeholder="Ingrese nombre" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="col-lg-4">
                                        <label style="padding-top: 12px; color: white">Apellido del Paciente<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="apellido" value="<?php echo $ape; ?>" class="form-control" id="fnamep" placeholder="Ingrese apellido" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>                                    
                                    </div>
                                   
                        </section>

                    </div>
                                        <div>
                        <h3><br/></h3>
                        <section>

                            <div class="row mb-12">
                                <div class="col-lg-3">

                                        <label style="color: white">Nombre del Responsable<small class="text-muted"><br/><br/></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombreRes" value="<?php echo $resnombre; ?>" class="form-control" id="fnamep" placeholder="Ingrese nombre" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Apellido del Responsable<small class="text-muted"><br/><br/></small></label>
                                        <div class="input-group">
                                            <input type="text" name="apellidoRes" value="<?php echo $resapellidos; ?>" class="form-control" id="fnamep" placeholder="Ingrese apellido" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required autocomplete="off">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">DUI del Responsable<small class="text-muted"> <br/>99999999-9</small></label>
                                   <div class="input-group">
                                        <input type="text" name="duiRes" value="<?php echo $dui; ?>"class="form-control phone-inputmask" id="dui" placeholder="Ingrese DUI" autocomplete="off" value="" required> 
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                    </div> 
                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Teléfono del Responsable<small class="text-muted"> <br/>9999-9999</small></label>
                                        <div class="input-group">
                                            <input type="text" name="telefonoRes" value="<?php echo $tel; ?>" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico" value="" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                        </div> 
                                    </div>
 </section>

                    </div>
                                     <div>
                        <h3></h3>
                        <section>

                                    <div class="col-lg-4">

                                        <div class="row mb-12" style="float: left;margin-left: 975px; margin-top: 11px;">
                                            <input type="submit"  class="btn btn-info" name="btnEnviar" value="Guardar">
                                        </div>
                                        <div class="row mb-12" style="float: left;margin-left: 875px; margin-top: -34px;">
                                            <button type="reset" class="btn btn-info" name="nameCancelar" onclick="location.href='modificarMenoresdeEdad.php'">Cancelar </button>
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

    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $nombreRespon = $_REQUEST['nombreRes'];
    $apellidoRespon = $_REQUEST['apellidoRes'];
    $duiRespon = $_REQUEST['duiRes'];
    $telRespon = $_REQUEST['telefonoRes'];
  

    /*                    $ape = $fila['pac_capellidos'];
                                        $nom = $fila['pac_cnombre'];
                                        $dui = $fila['pac_cdui'];
                                        $tel = $fila['pac_ctelefono'];
                                        $fe = $fila['pac_ffecha_nac'];*/
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "UPDATE t_paciente, t_responsable SET pac_cnombre='$nombre',pac_capellidos='$apellido', res_cnombre='$nombreRespon',res_capellidos='$apellidoRespon',res_cdui='$duiRespon',res_ctelefono='$telRespon' WHERE id_paciente='$modi' AND t_paciente=id_paciente";
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
                    location.href="modificarMenoresdeEdad.php";
                    
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