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

     <!-- Búsqueda UTILIZO EL JQUERY buscaresc.js que es el que hace el proceso interno de buscar
    funciona junto con jquery de lo contrario nada colocas el id="filtar" que con ese nombre lo reconoce
    el buscaresc.js para hacer el proceso que keres buscar ya sea por letras,numeros,dui, nit, loq sea
    solo eso necesitas para que busque-->

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
      <h3 class="card-title">Dar alta/baja | Insumos</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
     <th><div>Nombre comercial</div></th>
      <th><div>Marca</div></th>
      <th><div>Descripción</div></th>
      <th><div>Presentación</div></th>
      <th><div>Precio</div></th>
      <th><div>Fecha caducidad</div></th>
      <th><div>Código</div></th>
       <th><div>Estado</div></th>
      <th><div>Acción</div></th>
      
      
      
    </thead>
    <tbody  class="buscar"> <!--Se manda a llamar la clase del jquey para que haga la búsqueda automaticamente-->
    <!-- Donde va el contenido de la tabla-->
      <?php
        $sacar = mysqli_query($conexion, "SELECT*FROM t_insumo");
            while ($fila = mysqli_fetch_array($sacar)) {
                  $modificar=$fila['ins_codigo']; 
                 $nom=$fila['ins_cnombre_comercial'];  
                 $marc=$fila['ins_cmarca'];  
                 $desc=$fila['ins_cdescripcion'];  
                 $pre=$fila['ins_cpresentacion'];  
                 $prec=$fila['ins_dprecio'];
                 $ffe=$fila['ins_ffecha_caducidad'];
                  $cod=$fila['codigo']; 
                 $fe=$fila['estado']; 
                 
                 if ($fe==0) {
                     $estado="Desactivado";
                 } else {
                     $estado="Activado";
                 }
            
        ?>

      <tr>
        <th scope="row"><?php echo $nom;?></th>
        <td data-title="Released"><?php echo $marc;?></td>
        
        <td data-title="Studio"><?php echo $desc;?></td>
         <td data-title="Studio"><?php echo $pre;?></td>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $prec;?></td>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $ffe;?></td>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $cod;?></td>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $estado;?></td>

        <?php

        if($fe==0){ ?>
        <td class="text"><a class="btn btn-warning ">DE BAJA</a></td>
        <?php
        }else{
        ?>
        <td class="text"><a href="../Consultas/ProcesoDarBajaInsumo.php?ir=<?php echo $modificar; ?>" class="btn btn-warning fas fa-arrow-circle-down" >Dar Baja</a></td>
      
 <?php  }
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
