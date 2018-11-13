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
<br/>
    <div class="card" >
      <h3 class="card-title">Devolución</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
  
  <thead>  
  <th><div>Selec</div></th>
  <th><div>Insumo</div></th>
  <th><div>Comprado</div></th>
  <th><div>Devolver</div></th>
  <th><div>Razón</div></th>
  <th><div>Tipo de devolicion</div></th>
    </thead>
    <tbody  class="buscar"> 
    <?php
        $sacar = mysqli_query($conexion, "SELECT *FROM t_insumo,t_compra WHERE ins_codigo = id_compra  ");
            while ($fila = mysqli_fetch_array($sacar)) {
                 $modificar=$fila['factura']; 
                 $insumo=$fila['fk_insumo'];
                 $cant=$fila['cantidad'];  
                  
                 
              
        ?>
      <tr>
       <td><input type="checkbox" name="checkbox[]"></td>
        <td data-title="Released"><?php echo $insumo;?></td>
        <td data-title="Releaseda"><?php echo $cant;?></td>
        <td>  <input type="text" name="marca"""> </td>
        <td> <select>
            <option value="volvo">Dañado</option>
            <option value="saab">Incompleto</option>
            <option value="mercedes">No me gusta</option>
            <option value="audi">Entre</option>
          </select></td>
        <td><select>
            <option value="volvo">Por otro insumo</option>
            <option value="saab">Por el mismo</option>
          
          </select></td>
        <td class="text"><a href="../Consultas/modificarInsumo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Efec</a>
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
