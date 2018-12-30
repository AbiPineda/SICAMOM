<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include '../pdf/plantilla.php';
include_once '../Conexion/conexion.php';


?>


<link rel="stylesheet" href="../js/toastr.min.css">
    <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.6)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title" style="color: white">REPORTES</h3>
                        
                            <div>

                              <div class="col-lg-4">
                                    <label style="color:white">Seleccione la paciente <small class="text-muted" ></small></label>
                                      <select class="custom-select" name="paciente" id="paciente">
                                        <?php
                                        include_once '../Conexion/conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from t_paciente");
                                        ?>
                                        <option>Seleccionar</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               echo '<option value=' . "$row[0]" . '>' . $row[1] . " " . $row[2]. '</option>';
                                        }
                                        ?>
                                    </select>
                                    
                                 
                                </div>
                                
                                <br>
                                <a class="btn btn-success fa fa-print" href="../pdf/index.php">Imprimir receta</a>
                               

                                </div>
                          
                        </div>
                     </div>

                </div>

         </div>
    
                
 <?php
    include_once '../plantilla/pie.php';
?>

<script>
        function imprimir(){
          var objeto=document.  //obtenemos el objeto a imprimir
          
        }
    </script>
        