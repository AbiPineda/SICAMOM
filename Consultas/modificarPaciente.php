<?php



if (isset($_REQUEST['btnEnviar'])) {
    $modi = $_REQUEST['tirar'];
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido'];
    $dui = $_REQUEST['dui'];
    $tel = $_REQUEST['telefono'];
    
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    $sql = "UPDATE t_paciente SET pac_cnombre='$nombre',pac_capellidos='$apellido',pac_cdui='$dui',pac_ctelefono='$tel' WHERE id_paciente='$modi'";

    echo 'el sql es ' . $sql;

    

    $sentencia = $conexionx->prepare($sql);
    $usuario_insertado = $sentencia->execute();
} else {

    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
    $modi = $_GET['ir'];
    ?>

    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
             <div class="card" style="background: rgba(176, 176, 176,0.7)"> 
                

                <div class="card-body wizard-content">
                    <h3 class="card-title">Modificar datos del paciente</h3>

                    <form action="modificarPaciente.php" method="post">
                        <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                    <div>
                     
                        <section>

                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <?php
                                    include_once '../Conexion/conexion.php';
                                    $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente WHERE id_paciente='$modi'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['id_paciente'];
                                        $ape = $fila['pac_capellidos'];
                                        $nom = $fila['pac_cnombre'];
                                        $dui = $fila['pac_cdui'];
                                        $tel = $fila['pac_ctelefono'];
                                        $fe = $fila['pac_ffecha_nac'];
                                        ?>
                                        <label>Nombre<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombre" value="<?php echo $nom; ?>" class="form-control" id="fnamep" placeholder="Ingrese nombre">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="col-lg-4">
                                        <label>Apellido<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="apellido" value="<?php echo $ape; ?>" class="form-control" id="fnamep" placeholder="Ingrese apellido">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>                                    
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Fecha de nacimiento<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="fecha" value="<?php echo $fe; ?>" data-format="yyyy-MM-dd" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>                              
                                    </div>


                                    <div class="col-lg-4">
                                        <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                        <div class="input-group">
                                            <input type="text" name="dui" value="<?php echo $dui; ?>" class="form-control phone-inputmask" id="phone-maske" placeholder="Ingrese DUI"> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                            </div>
                                        </div> 

                                    </div>

                                    <div class="col-lg-4">
                                        <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                        <div class="input-group">
                                            <input type="text" name="telefono" value="<?php echo $tel; ?>" class="form-control phone-inputmask2" id="phone-mask2" placeholder="Ingrese número telefónico">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 40px;">
                                            <input type="submit"  class="btn btn-info" name="btnEnviar" value="Guardar">
                                        </div>
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 40px;">
                                            <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button>
                                        </div>

                                    </div>



                                <?php } ?>
                        </section>

                    </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <?php
    include_once '../plantilla/pie.php';
}
?>