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
        <h4 class="modal-title" id="myModalLabel">Ayuda | Facturas registradas.</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
<iframe src="https://issuu.com/abitho/docs/factura_registrada/1?ff" 
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
      <h3 class="card-title">Facturas Registradas</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
      <th><div># de Factura</div></th>  
      <th><div>Fecha de Compra</div></th>
     <th><div>Codigo</div></th>
     <th><div>Insumo</div></th>   
  <th><div>Marca</div></th>
     <th><div>Descripción</div></th>
     <th><div>Cantidad</div></th>
  <th><div>Precio</div></th>
  <th><div>Total</div></th>
      <th><div>Acción</div></th>
  
      
    </thead>
    <tbody  class="buscar"> 
        <?php
        $sacar1 = mysqli_query($conexion, "SELECT
t_compra.factura,
t_compra.fecha_actual,
t_insumo.ins_cnombre_comercial,
t_insumo.ins_cmarca,
t_compra.cantidad,
t_compra.precio_unitario,
t_compra.cantidad * t_compra.precio_unitario AS total,
t_compra.id_compra,
t_insumo.ins_cdescripcion,
t_insumo.codigo,
t_compra.fecha_caducidad
FROM
t_compra
INNER JOIN t_insumo ON t_compra.fk_insumo = t_insumo.ins_codigo");
        while ($fila = mysqli_fetch_array($sacar1)) {

            $factura = $fila['factura'];
            $fechCompra = $fila['fecha_actual'];
            $partes = explode('-', $fechCompra);
            $fecha = "{$partes[2]} - {$partes[1]} - {$partes[0]}";
            
             $codigo= $fila['codigo'];
             $insumo = $fila['ins_cnombre_comercial'];
             $marca= $fila['ins_cmarca'];
             $descripcion= $fila['ins_cdescripcion'];
             $cantidad= $fila['cantidad'];
             $precio= $fila['precio_unitario'];
             $total= $fila['total'];
            ?> 
        <tr>
                
                <th scope="row"><?php echo $factura; ?></th>
                <td nowrap data-title="Released"><?php echo $fecha; ?></td>
                 <td data-title="Released"><?php echo $codigo; ?></td>
                  <td data-title="Released"><?php echo $insumo; ?></td>
                   <td data-title="Released"><?php echo $marca; ?></td>
                    <td data-title="Released"><?php echo $descripcion; ?></td>
                     <td data-title="Released"><?php echo $cantidad; ?></td>
                     <td data-title="Released"><?php echo $precio; ?></td>
                     <td data-title="Released"><?php echo $total; ?></td>
                <td class="text"><a href="../pdf/detalleCompra.php" class="btn btn-success fas fa-eye"> Detalle</a>

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

