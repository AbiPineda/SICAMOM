<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

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
            <!--Fin Búsqueda-->

    <div class="card" >
      <h3 class="card-title">Modificar Insumo | Datos generales</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
  
  <thead>  
  <th><div>Codigo</div></th>
  <th><div>Nombre Comercial</div></th>
  <th><div>Descripción</div></th>
  <th><div>Presentación</div></th>
  <th><div>Paquete</div></th>
  <th><div>Unidad</div></th>
  <th><div>Acción</div></th>
    </thead>
    <tbody  class="buscar"> 
    <?php
        $sacar = mysqli_query($conexion, "SELECT *FROM t_insumo, detalle_insumo WHERE ins_codigo=id_detalle AND estado=1 ");
            while ($fila = mysqli_fetch_array($sacar)) {
                 $modificar=$fila['ins_codigo']; 
                
                 $nom=$fila['ins_cnombre_comercial'];  
                 $descrip=$fila['ins_cdescripcion'];  
                 $pre=$fila['ins_cpresentacion']; 
                 $cod=$fila['codigo'];  
                 $paq=$fila['paquete'];
                 $uni=$fila['unidad'];
              
        ?>
      <tr>
        <th scope="row"><?php echo $cod;?></th>
        <td data-title="Released"><?php echo $nom;?></td>
        <td data-title="Studio"><?php echo $descrip;?></td>
        <td data-title="Worldwide Gross"><?php echo $pre;?></td>
        <td data-title="Releaseds"><?php echo $paq;?></td>
        <td data-title="Releaseda"><?php echo $uni;?></td>
        <td class="text"><a href="../Consultas/modificarInsumo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Modificar</a>
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
