<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
$insumoExi=$_GET['ir'];
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
         <?php
        $sacar1 = mysqli_query($conexion, "SELECT *FROM t_inventario i INNER JOIN t_insumo m ON i.insumo=m.ins_codigo  WHERE m.ins_codigo='$insumoExi'");
            while ($fila = mysqli_fetch_array($sacar1)) {
                
                $insumo=$fila['ins_cnombre_comercial'];
            }
        ?> 
        <h3 class="card-title">Existencias de <?php echo $insumo;?></h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
      
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
       
      <th><div>Cantidad Comprada</div></th>
      <th><div>Fecha de Caducidad</div></th>
      <th><div>Disponible para uso</div></th>
      <th><div>Acción</div></th>
  
      
    </thead>
    <tbody  class="buscar"> 
         <?php
    $sacar1 = mysqli_query($conexion, "SELECT *FROM t_compra WHERE fk_insumo='$insumoExi' AND reduccion >0");
            while ($fila = mysqli_fetch_array($sacar1)) { 
                $cantidad=$fila['cantidad'];
                $reducir=$fila['reduccion'];
                $caducidad=$fila['fecha_caducidad'];
                $factori=$fila['factura'];
                
        ?> 
  
        <tr>
                <td data-title="Released"><?php echo $cantidad; ?></td>
                <td data-title="Released"><?php echo $caducidad; ?></td>
                <td data-title="Released"><?php echo $reducir;?></td>
                <td class="text"><a href="../Registros/Exitencias-Proceso.php?in=<?php echo $insumoExi;?>&voy=<?php echo $factori;?>"class="btn btn-success fas fa-eye"> Reducir</a>

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
