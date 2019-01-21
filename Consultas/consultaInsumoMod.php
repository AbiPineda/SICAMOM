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
            <div class="col-md-12 col-md-pull-12" align="right">
                <a href='#'  data-toggle="modal" data-target='#myModal'><button type='button' class='btn btn-info btn-circle btn-lg'><i class="fa fa-question fa-2"></i></button></a>
            </div>
            <div class="container-fluid">
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
                <!--Fin Búsqueda-->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Ayuda | Modificar insumo.</h4> 
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
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
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
                                        <th><div>Marca</div></th>
                                        <th><div>Descripción</div></th>
                                        <th><div>Acción</div></th>
                                        </thead>
                                        <tbody  class="buscar"> 
<?php
$sacar = mysqli_query($conexion, "SELECT *FROM t_insumo WHERE ins_codigo AND estado=1 ");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['ins_codigo'];
    $cod = $fila['codigo'];
    $nom = $fila['ins_cnombre_comercial'];
    $descrip = $fila['ins_cdescripcion'];
    $marca = $fila['ins_cmarca'];
    ?>
                                                <tr>
                                                    <th scope="row"><?php echo $cod; ?></th>
                                                    <td data-title="Released"><?php echo $nom; ?></td>
                                                    <td data-title="Releaseda"><?php echo $marca; ?></td>
                                                    <td data-title="Studio"><?php echo $descrip; ?></td>

                                                    <td class="text"><a href="../Consultas/modificarInsumo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Modificar</a>
                                                    </td>

<?php } ?>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </body>
</html>
<?php
include_once '../plantilla/pie.php';
?>
