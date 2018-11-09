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

    <form action="nuevaCompra.php" method="POST" >

                            <div class="row mb-12" > 

                                <div class="col-lg-3" >
                                    <label style="color: black">Insumo<small class="text-muted" ></small></label>
                                      <select class="custom-select" name="insumo" id="insumo">
                                        <?php
                                        include_once '../Conexion/conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT  * from t_insumo");
                                        ?>
                                        <option>Marca</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               echo '<option value=' . "$row[2]" . '>' . $row[1] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    
                                 
                                </div>  

                                <div class="col-lg-3" >
                                    <label style="color: black">Marca<small class="text-muted" ></small></label>
                                      <select class="custom-select" name="insumo" id="insumo">
                                        <?php
                                        include_once '../Conexion/conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from t_insumo");
                                        ?>
                                        <option>Insumo</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               echo '<option value=' . "$row[0]" . '>' . $row[2] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    
                                 
                                </div>            

                                <div class="col-lg-3">
                                    <label style="color: black">Existencia<small class="text-muted" ></small></label>
                                    <div class="input-group">                         
                                        <input type="text" class="form-control" id="cantidad" name="cantidad" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div> 
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <label style="color: black">Preparar<small class="text-muted" ></small></label>
                                    <div class="input-group">                         
                                        <input type="text" class="form-control" id="cantidad" name="cantidad" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div> 
                                    </div>
                                </div>

                                

                                <div class="col-lg-2">
                                    <div class="input-group">                         
                                        <input type="hidden" class="form-control" id="codInsumo" name="codInsumo" >
                                        <div class="input-group-append">
                                        </div> 
                                    </div>
                                </div>

                                  <br>

                                <div class="col-lg-12">

                                    <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                        <button type="submit" class="btn btn-info" value="OK" id="btnGuardar" name="btnGuardar" >Agregar</button>
                                    </div>
                                    <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                        <button type="submit" class="btn btn-info" name="Cancelar" id="Cancelar" onClick="location.href='http://www.google.com">Finalizar</button>
                                    </div>
                                </div>


                            </div>
                        </form>
            <!--Fin Búsqueda-->

    <div class="card" >
      <h3 class="card-title">Decremento insumo</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper" >
  <div class="scroll-window" style="height: 95px;">
  <table class="table table-striped table-hover user-list fixed-header" >
    <thead>
      
      <th><div>Código</div></th>
      <th><div>Nombre</div></th>
      <th><div>Marca</div></th>
      <th><div>Existencia</div></th>
      <th><div>Unidades</div></th>
      <th><div>Stock </div></th>
      <th><div>Sub Total</div></th>
  
  
     
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
    <?php
        $sacar1 = mysqli_query($conexion, "SELECT * FROM t_insumo, t_compra WHERE ins_codigo=id_compra AND estado=1");
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
                <td data-title="Releaseda"><?php echo $cod; ?></td>
                <th scope="row"><?php echo $nom; ?></th>
                <td data-title="Released"><?php echo $marca; ?></td>
                
                <td data-title="Studio1"><?php echo $cant.$presen; ?></td>
                <td data-title="Studio1"><?php echo $unidades; ?></td>
                <td data-title="Studio1"><?php echo $stock; ?></td>
                 <td data-title="Studio1"><?php echo $TotalUnidades; ?></td>
                <!--<td class="text"><a href="../Consultas/proveedorBajaAlta.php?ir=<?php echo $modificar; ?>"  class="btn btn-success fas fa-notes-medical">  Preparar</a></td>
                </td>
                </td>-->

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
