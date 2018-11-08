<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
 $modi1 = $_GET['ir2'];
?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Responsive & Accessible Data Table</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
   <!-- Estilo de la tabla-->
   <link href="../dist/css/styleTabla.css" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">
<div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Registrar Consulta</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                       </div>



    </div>
       <div class="row mb-12">   
        
            <div class="wrap">
                <div class="col-lg-12">
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
            <!--Fin Búsqueda-->


    <div class="card" >
      <h3 class="card-title" style="color: black">Consulta</h3>
      <div class="col-md-12">
    <input type="hidden" name="tirar" value="<?php echo $modi1; ?>" id="pase"/>
          <div id="bodywrap">

<?php
date_default_timezone_set('America/El_Salvador');
$d1 = date("d");
$m1 = date("m");
$y1 = date("Y");
    include_once '../Conexion/conexion.php';
   // $estado='Espera';

   /*$sacar = mysqli_query($conexion,"SELECT * FROM t_expediente");
                while ($fila = mysqli_fetch_array($sacar)) {
                      $expediente=$fila['id_expediente']; */
       mysqli_query($conexion, "INSERT INTO t_llegada(fk_expediente,lleg_ffecha_atiende,estado) VALUES('$modi1','$y1-$m1-$d1','esperando')");

            


 ?>
  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
     <thead>
     <th><div>N° de Expediente</div></th> 
     <th><div>Paciente</div></th>
     <th><div>Estado</div></th>
     <th><div>Accion</div></th>
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
<?php
date_default_timezone_set('America/El_Salvador');
$d = date("d");
$m = date("m");
$y = date("Y");                
          $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente, t_llegada WHERE fk_expediente=id_paciente AND fk_medico=idMedico AND fk_paciente=id_paciente AND fk_expediente=id_expediente AND (lleg_ffecha_atiende='$y-$m-$d') ORDER BY id_llegada");
            while ($fila = mysqli_fetch_array($sacar)) {
                   $modificar=$fila['id_paciente'];
                   $codigo=$fila['codigo'];
                   $nom=$fila['pac_cnombre']; 
                   $ape=$fila['pac_capellidos'];  
                   $fe=$fila['estado']; 
                 
                 if ($fe==0) {
                     $estado="Desactivado";
                 } else {
                     $estado="Esperando";
                 }
               //  $tipo=$fila['con_ctipo_consulta'];  
                 // $fe=$fila['pac_ffecha_nac']; 
               // $partes = explode('-', $fe);
              //  $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
             
        ?>
      <tr>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $codigo;?></td>
        <th scope="row"><?php echo $nom . " " . $ape;?></th>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $estado;?></td>
        <td class="text"><a href="../Consultas/registroConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta</a>
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
