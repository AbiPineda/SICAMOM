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
            <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que est· buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
      <div class="col-md-3 col-md-pull-9">
                      <a href='#'  data-toggle="modal" data-target='#myModal'><button type='button' class='btn btn-success'>Ayuda</button></a>
                    </div>
                    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ayuda | Detalle devolución.</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
<iframe src="https://issuu.com/abitho/docs/manualregistropaciente/1?ff" 
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
            <!--Fin B˙squeda-->

    <div class="card" >
      <h3 class="card-title">Detalle devoluciones</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
     
      <thead>  
  <th><div>N factura</div></th>
  <th><div>Insumo</div></th>
  <th><div>Cantidad devuelta</div></th>
  <th><div>Razon de la devoluciÛn</div></th>
     
  
  
     
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
    <?php
        $sacar = mysqli_query($conexion, "SELECT
            t_insumo.ins_cnombre_comercial,
            t_compra.factura,
            t_devolucion.devolver,
            t_devolucion.razon
            FROM t_compra INNER JOIN t_insumo ON t_compra.fk_insumo = t_insumo.ins_codigo
                INNER JOIN t_devolucion ON t_devolucion.fk_compra = t_compra.id_compra ");
            while ($fila = mysqli_fetch_array($sacar)) {
               
                 $numF=$fila['factura'];
                $nomInsumo=$fila['ins_cnombre_comercial'];
                 $devolucion=$fila['devolver'];  
                 $razon=$fila['razon']; 
                
                  
                 
              
        ?>
        <tr>
                
                 <td data-title="Released"><?php echo $numF;?></td>
                 <td data-title="Releaseda"><?php echo $nomInsumo;?></td>
                 <td data-title="Releaseda"><?php echo $devolucion;?></td>
                 <td data-title="Releaseda"><?php echo $razon;?></td>
                

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
