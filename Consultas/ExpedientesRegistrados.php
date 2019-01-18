<?php
session_start();
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

include_once '../Login/funcs/conexion.php';

//
$idUsuario = $_SESSION['id_usuario'];



$sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
  
  //************kiero el id_medico a las buenas o a las malas jjejej
  $sacar1 = mysqli_query($conexion, "SELECT*FROM t_medico WHERE fk_usuario = '$idUsuario'");
        while ($fila1 = mysqli_fetch_array($sacar1)) {
            $medicoAlaFuerza=$fila1['idMedico'];
        }

        //*****************************
?>

<html lang="en" >

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
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
      <th><div># de Expediente</div></th>  
      <th><div>Expediente</div></th>
   <th><div>DUI</div></th>
   <th><div>Telefono</div></th>
  
    
      <th><div>Acción</div></th>
  
      
    </thead>
    <tbody  class="buscar"> 
        <?php
        include_once '../Conexion/conexion.php';
        $sacar = mysqli_query($conexion, "SELECT
t_expediente.codigo,
t_paciente.pac_cnombre,
t_paciente.pac_capellidos,
t_paciente.pac_cdui,
t_paciente.pac_ctelefono,
usuarios.id,
t_expediente.id_expediente
FROM
t_medico
INNER JOIN t_expediente ON t_expediente.fk_medico = t_medico.idMedico
INNER JOIN t_paciente ON t_expediente.fk_paciente = t_paciente.id_paciente
INNER JOIN usuarios ON t_medico.fk_usuario = usuarios.id
WHERE t_medico.idMedico='$medicoAlaFuerza'");
        while ($fila = mysqli_fetch_array($sacar)) {
             $modificar=$fila['id_expediente']; 
             $codigo= $fila['codigo'];
             $nombre = $fila['pac_cnombre'];
             $apellidos= $fila['pac_capellidos'];
             $dui= $fila['pac_cdui'];
             $telefono= $fila['pac_ctelefono'];
             
            ?> 
        <tr>
                
               
                <td nowrap data-title="Released"><?php echo $codigo; ?></td>
                 <td data-title="Released"><?php echo $nombre . " " . $apellidos; ?></td>
                  <td data-title="Released"><?php echo $dui; ?></td>
                   <td data-title="Released"><?php echo $telefono; ?></td>
                   
                <td class="center">
                     <a href="verConsultas.php?ir=<?php echo $modificar; ?>"class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>

                </td>

       <?php  }?>
      
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

</html>

<?php
    
    include_once '../plantilla/pie.php';

?>

