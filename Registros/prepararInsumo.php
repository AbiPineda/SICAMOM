<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

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
      <h3 class="card-title">Inventario de insumo</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
     
      <th><div>Nombre</div></th>
      <th><div>Marca</div></th>
      <th><div>Existencia</div></th>
      <th><div>Unidades</div></th>
      <th><div>Stock </div></th>
      <th><div>Sub Total</div></th>
  
  
     
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
    <?php
        $sacar1 = mysqli_query($conexion, "SELECT * FROM t_insumo, t_compra WHERE ins_codigo=id_compra ");
            while ($fila = mysqli_fetch_array($sacar1)) {
                $cod=$fila['codigo'];
                $nom=$fila['ins_cnombre_comercial'];  
                $marca=$fila['ins_cmarca'];  
                $desc=$fila['ins_cdescripcion']; 
                $compra=$fila['fecha_caducidad']; 
                $presen=$fila['presentacion'];
                $paquete=$fila['cantidad']; 
                $unidades=$fila['unidad'];
                $cant=$fila['cantidad']; 
                $stock=$fila['minimo'];
                 $TotalUnidades=$fila['cantidad'] * $fila['unidad'];
                

        ?> 
        <tr>
                
                <th scope="row"><?php echo $nom; ?></th>
                <td data-title="Released"><?php echo $marca; ?></td>
                
                <td data-title="Studio1"><?php echo $cant.$presen; ?></td>
                <td data-title="Studio1"><?php echo $unidades; ?></td>
                <td data-title="Studio1"><?php echo $stock; ?></td>
                <td data-title="Studio1"><?php echo $TotalUnidades; ?></td>

                </td>
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
