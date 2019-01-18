<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
include_once '../Login/funcs/conexion.php';

$modi = $_GET['ir'];

$idUsuario = $_SESSION['id_usuario'];
  $sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql);
  
  $row = $result->fetch_assoc();
?>



    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <!-- Estilo de la tabla-->
        <link href="../dist/css/styleTabla.css" rel="stylesheet">

    </head>

    <body>
        <div class="page-wrapper" style="height: 810px;">


            <div class="col-md-12 col-md-pull-12" align="right">
                <a href='#'  data-toggle="modal" data-target='#myModal'><button type='button' class='btn btn-info btn-circle btn-lg'><i class="fa fa-question fa-2"></i></button></a>
            </div>

            <br>
            <div class="row" align="center">
                <div class="col-md-12">
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
                </div>
            </div>

            <div class="container-fluid">




                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Ayuda | Expedientes.</h4> 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            </div>
                            <div class="modal-body">
                                <div style="text-align: center;">
                                    <iframe src="/1?ff" 
                                            style="width:700px; height:500px;" frameborder="0"></iframe>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <!--  <button type="button" class="btn btn-primary">Save changes</button>  --> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" >
                    <h3 class="card-title">Expedientes Registrados</h3>
                    <div class="row">
                
               
                              <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                    	    <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
                   

                                         <?php
                                  include_once '../Conexion/conexion.php';
                                  $sacar = mysqli_query($conexion, "SELECT
t_paciente.pac_cnombre,
t_paciente.pac_capellidos,
t_paciente.pac_ffecha_nac,
t_paciente.id_paciente
FROM
t_paciente WHERE t_paciente.id_paciente='$modi'");
        while ($fila = mysqli_fetch_array($sacar)) {
                                                      $modificar=$fila['id_paciente'];
                                                      $nombre=$fila['pac_cnombre'];
                                                      $apellido=$fila['pac_capellidos'];
                                                      $fecha=$fila['pac_ffecha_nac'];

                                                       ?>
                                            <label class="col-md-1 control-label">Paciente:</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="paciente" value="<?php echo $nombre; ?>" disabled>
                                            </div>

                                             
<?php } ?>
                                    </form>
                          <br>
                           <br>
                            
                         </div>
                    </div>
            

                    <div class="row">
                
               
                              <div class="col-md-12">
                        
                                     <table id="tabla" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th># de Expediente</th>
                                            <th>Alergias</th>
                                            <th>Ultima Visita</th>
                                            
                                            <th>Diagnostico</th> 
                                            <th>Abonar</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="buscar">
                                      <?php
                                      include_once '../Conexion/conexion.php';
        $sacar1 = mysqli_query($conexion, "SELECT
t_expediente.codigo,
t_expediente.alergias,
t_consulta.con_fecha_atiende,
t_consulta.con_diagnostico,
usuarios.usuario
FROM
t_expediente
INNER JOIN t_paciente ON t_expediente.fk_paciente = t_paciente.id_paciente
INNER JOIN t_consulta ON t_consulta.fk_expediente = t_expediente.id_expediente
INNER JOIN t_medico ON t_expediente.fk_medico = t_medico.idMedico
INNER JOIN usuarios ON t_medico.fk_usuario = usuarios.id
where t_medico.idMedico=$idUsuario");
            while ($fila = mysqli_fetch_array($sacar1)) {
             
                 $tipo=$fila['codigo'];  
                 $fecha=$fila['alergias'];
                 $valor=$fila['con_fecha_atiende'];  
                
                     $id=$fila['con_diagnostico'];                    
       ?>


       <tr>
        <th><?php echo $tipo;?></th>
        <td><?php echo $fecha;?></td>
        <td><?php echo $valor;?></td>
        <td><?php echo $id;?></td>
        
        
        

            <?php   }?>
      
      </tr>
    </tbody>
  </table>
                               
                                </div> <!-- Div scroll-window -->
                            </div> <!-- Div scroll-window-wrapper-->


                        </div> <!-- Div bodywrap -->

                    </div> <!-- Div col-md-12 -->
                     
                </div> <!-- Div card -->
                 
            </div> <!-- Div page-wrapper -->
           
        </div> <!-- Div page-wrapper -->
       

    </body>
    

<?php
include_once '../plantilla/pie.php';
?>
