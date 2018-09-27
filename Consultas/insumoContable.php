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
  <link href="../dist/css/styleTabla2.css" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">

      <div class="col-lg-4">
            <label style="padding-top: 5px;" >Tipo de Insumo<small class="text-muted"></small></label>
          
            <select class="custom-select" name="tipo" onchange="location = this.value">
                
                <option>Seleccionar</option>
                <option value="insumoContable.php">Contable por unidades</option>
                <option value="insumoNoContable.php">No contable</option>
               
            </select>
         
        </div>
      
     <!-- Búsqueda UTILIZO EL JQUERY buscaresc.js que es el que hace el proceso interno de buscar
    funciona junto con jquery de lo contrario nada colocas el id="filtar" que con ese nombre lo reconoce
    el buscaresc.js para hacer el proceso que keres buscar ya sea por letras,numeros,dui, nit, loq sea
    solo eso necesitas para que busque-->
     
            <div class="wrap">
              <script src="../html/js/jquery.min.js" ></script>
            <script src="../html/js/buscaresc.js"></script>
           </br>
                </br>
                 </br>
                    </br>
                        </br>
                            </br>
         <div class="search">
           <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
                
      </div>
            <!--Fin Búsqueda-->

       </br>
    
    <div class="card" >
      <h3 class="card-title">  Inventario de insumos</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
  
    <th><div>Código</div></th>
    <th><div>Nombre</div></th>
    <th><div>Marca</div></th>
    <th><div>Disponibles</div></th>
    <th><div>Acción</div></th>
      
      
      
    </thead>
    <tbody  class="buscar"> <!--Se manda a llamar la clase del jquey para que haga la búsqueda automaticamente-->
    <!-- Donde va el contenido de la tabla-->
      <?php
        $sacar = mysqli_query($conexion, "SELECT*FROM t_insumo, detalle_insumo WHERE ins_codigo=id_detalle ");
            while ($fila = mysqli_fetch_array($sacar)) {
                  $modificar=$fila['ins_codigo']; 
                   
                 $nom=$fila['ins_cnombre_comercial'];  
                 $marc=$fila['ins_cmarca'];
                 $uni=$fila['unidad'];
                 $pac=$fila['paquete'];
                  $cod=$fila['codigo']; 
                $total=$uni*$pac;
               
            
        ?>
          <tr>
         <?php
         if($uni!=0) {?>

         <td data-title="Worldwide Gross" data-type="currency"><?php echo $cod;?></td>
        <th scope="row"><?php echo $nom;?></th>
         <th scope="row"><?php echo $marc;?></th>
          <th scope="row"><?php echo $total;?></th>
       <td class="text"><a href="../Consultas/ProcesoDarBajaInsumo.php?ir=<?php echo $modificar; ?>" class="btn btn-success far fa-clock">    Historial</a></td>
        
       <?php }?>
       
 <?php  
            }?>
      
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
