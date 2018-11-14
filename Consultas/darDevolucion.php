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
  <th><div>Insumo</div></th>
  <th data-title="Released"><div>Comprado</div></th>
  <th><div>Marca</div></th>
  <th><div>Accion</div></th>
    </thead>
    <tbody  class="buscar"> 
    <?php
    $identificador=$_GET['ir'];
        $sacar = mysqli_query($conexion, "SELECT i.ins_cnombre_comercial, c.cantidad, i.ins_cmarca FROM t_compra c 
INNER JOIN t_insumo i on c.fk_insumo=i.ins_codigo WHERE c.factura='$identificador'");
            while ($fila = mysqli_fetch_array($sacar)) { 
                 $insumo=$fila['ins_cnombre_comercial'];
                 $cant=$fila['cantidad'];  
                  $mar=$fila['ins_cmarca'];
                  
                 
              
        ?>
      <tr>
       
        <td data-title="Released"><?php echo $insumo;?></td>
        
        <td data-title="Releaseda"><?php echo $cant;?></td>
        <td data-title="Released"><?php echo $mar;?></td>
        
        
          <td class="text"> <a href="#" data-toggle="modal" data-target="#miModal" onclick="mostrar_Modal('<?php echo $insumo; ?>','<?php echo $cant; ?>')">Efec</a>
        </td>

       <?php  }?>
      
      </tr>

    </tbody>
  </table>
      <!--******************-->
      <!--******************************Dialog**************************-->  
<!-- MODAL-->
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4>Devolucion de insumo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <!--<form id="example-form" action="" class="m-t-40" method="POST">-->
                            <!-- **********MODIFICACION******************-->
                            <!--FORMULARIO PARA GUARDAR--><form action="" id="" method="post" class="form-register" >

                                <!--CAPTURA COMO LA ACCION PARA GUARDAR--><input type="hidden" name="guardar" id="pase"/>
                                <!-- **********FIN MODIFICACION******************-->


                                <div class="col-lg-12">
                                   
                                    <label>Insumo<small class="text-muted"></small></label><br>
                                    <div class="input-group">
                                        <input type="text" name="insumo" value="" class="form-control" id="insumo">  
                                    </div> <br>

                                    <label>Compra<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="com" class="form-control" id="com">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> 

                                </div>

                                <div class="col-lg-12">
                                    <label>Cantidad a devolver<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="devolver" class="form-control" id="devolver" >  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                 <div class="col-lg-12">
                                    <label>Razón<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <select name="razon">
                                        <option value="volvo">Dañado</option>
                                        <option value="saab">Incompleto</option>
                                        <option value="mercedes">No me gusta</option>
                                        <option value="audi">Entre</option>
                                      </select>
                                    </div>                                    
                                </div>
                                 <div class="col-lg-12">
                                    <label>Tipo de devolucion<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <select name="tipo">
                                        <option value="volvo">Por otro insumo</option>
                                        <option value="saab">Por el mismo</option>

                                      </select>
                                    </div>                                    
                                </div>


                                


                                 
                                <!--ERROR COMUN Y LO DEJARE AQUI PARA QUE VEAS
                                LA ETIQUETA </form> DETRO DE ELLA SIEMPRE TEIENE QUE ESTAR LOS BOTONES-->

                                <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                    <!--yo lo utilizo tipo input porque asi me funciona--><input type="submit" class="btn btn-info" value="Guardar" name="modGuardar">

                                </div>

                                <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                    <button type="submit" class="btn btn-info" name="modCancelar">Cancelar </button>

                                </div>
                            </form>
                           
                        </div>


                    </div>
                </div>
            </div>
            <!-- Fin Div de modal-->
      <!--*********//////************-->
  </div> <!-- Div scroll-window -->
</div> <!-- Div scroll-window-wrapper-->


</div> <!-- Div bodywrap -->

  </div> <!-- Div col-md-12 -->
  </div> <!-- Div card -->
  </div> <!-- Div page-wrapper -->
  </div> <!-- Div page-wrapper -->

</body>

</html>
<script>
function mostrar_Modal(insu,com){
    $("#insumo").val(insu);
    $("#com").val(com);
}
</script>

<?php
    
    include_once '../plantilla/pie.php';

?>
