<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

$guardo  = $_REQUEST["guardo"];
if($guardo==1){
msg("Los datos fueron almacenados con exito");
}
?>

    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <div class="container-fluid">
            <div class="signup__container">
                <div class="container__child signup__thumbnail">
                    <div class="thumbnail__logo">

                        <h2 class="heading--secondary">Decremento insumo</h2>
                        <form action="../Registros/guardarDecremento.php" method="POST" >

                            <div class="row mb-12"> 

                                

                                <div class="col-lg-3">
                                    <label style="color: black">Insumo<small class="text-muted" ></small></label>
                                      <select class="custom-select" name="insumo" id="insumo">
                                        <?php
                                        include_once '../Conexion/conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from t_insumo");
                                        ?>
                                        <option>Insumo</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               echo '<option value=' . "$row[1]" . '>' . $row[5] . " - " . $row[1]. " " . $row[3] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    
                                 
                                </div>

                                <div class="col-lg-3">
                                    <label style="color: black">Marca<small class="text-muted" ></small></label>
                                    <select class="custom-select" name="marca" id="marca">
                                        <?php
                                        include_once '../Conexion/conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from t_insumo WHERE estado=1");
                                        ?>
                                        <option>Marca</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                            $prove = $row['id_proveedor'];
                                            echo '<option value=' . "$row[0]" . '>' . $row[2] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <label style="color: black">Existencia<small class="text-muted" ></small></label>
                                    <div class="input-group">                         
                                        <input type="text" class="form-control" id="existencia" name="existencia">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div> 
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <label style="color: black">Unidades a preparar<small class="text-muted" ></small></label>
                                    <div class="input-group">                         
                                        <input type="text" class="form-control" id="preparadas" name="preparadas">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div> 
                                    </div>
                                </div>

                              

                                <div class="col-lg-12">

                                    <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                        <button type="submit" class="btn btn-info" id="guardar" name="guardar">Agregar</button>
                                    </div>
                                    <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                        <button type="submit" class="btn btn-info" name="Cancelar" id="Cancelar">Finalizar</button>
                                    </div>
                                </div>


                            </div>
                        </form>

                         <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
      <table  id="tablaDecremento" class="table table-striped table-hover user-list fixed-header">
          <thead>
              <tr>

                  <th>Insumo</th> 
                  <th>Marca</th>
                  <th>Existencia</th>
                  <th>Unidades a Preparar</th>

              </tr>
          </thead>
          <tbody class="tabla_ajax">
          <?php include('../Consultas/tablaDecremento.php') ?>
          </tbody>


      </table>
  </div> <!-- Div scroll-window -->
  </div> <!-- Div scroll-window-wrapper-->


                         </div> <!-- Div bodywrap -->
                    </div>



                </div>
            </div>
        </div>
    </div>




<!-- ============================================================== 
                <div class="container__child signup__form">
                    

                   

                </div>

            </div>
 ============================================================== --> 

            <!-- ============================================================== --> 

            <?php
            include_once '../plantilla/pie.php';
            ?>

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 


        <script type="text/javascript"> 
                
          $("#guardar").on('click',function(){
                   //alert('si');
                    var insumo = $('#insumo').val();
                    var marca = $('#marca').val();
                    var existencia = $('#existencia').val();
                    var preparadas = $('#preparadas').val();
                  var tabla = $('#tablaDecremento');
                    
                    var datos = "<tr>"+
                            "<td>"+insumo+"</td>"+
                            "<td>"+marca+"</td>"+
                            "<td>"+existencia+"</td>"+
                            "<td>"+preparadas+"</td>"+
                            "</tr>";
                    
                    tabla.append(datos);
                }
                 </script>
                 
                 <?php
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo"alert('$texto');";
    echo "</script>";
}
 function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetConfirm('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
 ?>