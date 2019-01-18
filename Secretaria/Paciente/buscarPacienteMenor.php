<?php

include_once '../plantillaSecretaria/cabeceraSecretaria.php';
include_once '../plantillaSecretaria/menuSecretaria.php';
include_once '../plantillaSecretaria/menuLateralSecretaria.php';
include_once '../../Conexion/conexion.php';

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
   <link href="../../dist/css/styleTabla.css" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">

   

            <div class="wrap">
                <script src="../../html/js/jquery.min.js" ></script>
                <script src="../../html/js/buscaresc.js"></script>
         <div class="search">
            <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
            <!--Fin Búsqueda-->

    <div class="card" >
      <h3 class="card-title">Paciente Menor de Edad | Datos generales</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
      <th><div>Nombre</div></th>
      <th><div>Apellido</div></th>
      <th><div>Responsable</div></th>
      <th><div>DUI</div></th>
      <th><div>Teléfono</div></th>
      
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
    <?php
    //SELECT CONCAT(p.res_cnombre," ",p.res_capellidos) as res_cnombre from t_responsable p;
        $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente, t_responsable WHERE id_paciente=idresponsable AND estado=1");
            //$nombre = mysqli_query($conexion, "SELECT CONCAT(p.res_cnombre,' ',p.res_capellidos) as res_cnombre from t_responsable p");
            
        while ($fila = mysqli_fetch_array($sacar)) {
                 $ape=$fila['pac_capellidos'];  
                 $nom=$fila['pac_cnombre'];  
                 $dui=$fila['pac_cdui'];  
                 $tel=$fila['pac_ctelefono'];  
                 $res=$fila['res_cnombre'];            
            
        ?>
      <tr>
        <th scope="row"><?php echo $nom;?></th>
        <td data-title="Released"><?php echo $ape;?></td>
        <td data-title="Studio"><?php echo $res;?></td>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $dui;?></td>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $tel;?></td>
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
include_once '../plantillaSecretaria/pieSecretaria.php';

?>

