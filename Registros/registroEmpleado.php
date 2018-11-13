<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
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
                                        $sacar = mysqli_query($conexion, "SELECT*FROM t_usuario");
                                    ?>
                                    <label style="color: white">Usuario<small class="text-muted"></small></label>
                                    <select class="custom-select" name="doctorusu" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <?php 
                                        while($row = mysqli_fetch_array($sacar)) 
                                        { 
                                        ?>
                                        <option value="<?php echo $row['usu_cusuario'];?>"><?php echo $row['usu_cusuario'];?></option>
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

      $sacar1 = mysqli_query($conexion,"SELECT * FROM t_usuario WHERE usu_cusuario='$doctor'");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $medico=$fila1['id_usuario']; 
                      $mediconom=$fila1['usu_cnombre'];
                      $medicoape=$fila1['usu_capellido'];

        mysqli_query($conexion, "INSERT INTO t_medico(t_usuario,med_cnombre,med_capellidos,med_cespecialidad) VALUES('$medico','$mediconom','$medicoape','$espe')");
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
       
    } 

            //fin
        }

include_once '../plantilla/pie.php';
?>
