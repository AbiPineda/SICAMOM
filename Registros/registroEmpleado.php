<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

//sacar usuarios para bitacora

include_once '../Conexion/conexion.php';
$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<div class="page-wrapper" style="height: 671px;">

    <div class="container-fluid">
        <div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Registro Empleado | Datos generales</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                <form action="" id="f1" name="f1" method="post" class="form-register" >
                    <input type="hidden" name="tirar" id="pase"/>
                    <div>
                            <br/>
                        <section>
                            <div class="row mb-12">

                                  <div class="col-lg-4">
                                    <?php
                                        include_once '../Conexion/conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT
usuarios.id,
usuarios.usuario,
tipo_usuario.tipo
FROM
usuarios
INNER JOIN tipo_usuario ON usuarios.id_tipo = tipo_usuario.id
WHERE 
tipo_usuario.id = 1");
                                    ?>
                                    <label style="color: white">Usuario<small class="text-muted"></small></label>
                                    <select class="custom-select" name="doctorusu" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <?php 
                                        while($row = mysqli_fetch_array($sacar)) 
                                        { 
                                        ?>
                                        <option value="<?php echo $row['usuario'];?>"><?php echo $row['usuario'];?></option>
                                       <?php 
                                        } 
                                        ?> 
                                    </select>
                                 </div>

                                <div class="col-lg-3">
                                    <label style="color: white">Especialidad<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <select class="custom-select" name="especialidad" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                            <option value="General">General</option>
                                            <option value="Ginecologico">Ginecológico</option>
                                        </select>   
                                        <div class="input-group-append">
                                            
                                        </div>
                                    </div>                                    
                                </div>

                                <br>
                                <div class="col-lg-12">

                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                            <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                          <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button></div>

                                    </div>   
                                
                            </div>
                    </div>
                    </section>

            </div>

            </form>

        </div>



    </div>
</div>
</div>


<?php

if (isset($_REQUEST['tirar'])) {
    include_once '../Conexion/conexion.php';

   $doctor= $_REQUEST['doctorusu'];
   $espe = $_REQUEST['especialidad'];                 

      $sacar1 = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$doctor'");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $medico=$fila1['id']; 
                      $mediconom=$fila1['nombre'];
                    

        mysqli_query($conexion, "INSERT INTO t_medico(med_cnombre,med_cespecialidad,fk_usuario) VALUES('$mediconom','$espe','$medico')");
        echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroEmpleado.php";
                    
                });</script>';
        //bitacora
        ini_set('date.timezone', 'America/El_Salvador');
        $hora = date("H:i:s");
        mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
                . " VALUES('$id','$NombreUsuario','Registro Empleado',now(),'$hora')");
        //bitacora
    } 

            //fin
        }

include_once '../plantilla/pie.php';
?>
