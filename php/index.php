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


            

    <div class="card" style="background: rgba(0, 101, 191,0.6)" >
      <h3 class="card-title" style="color: white" >Backup / Restore</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  
  <body>
  <a href="./Backup.php" style="color: white" >Realizar copia de seguridad</a>
  <form action="./Restore.php" method="POST">
    <br></br>
    <label>Selecciona un punto de restauración</label><br>
    <select name="restorePoint">
      <option value="" disabled="" selected="">Selecciona un punto de restauración</option>
      <?php
        include_once './Connet.php';
        $ruta=BACKUP_PATH;
        if(is_dir($ruta)){
            if($aux=opendir($ruta)){
                while(($archivo = readdir($aux)) !== false){
                    if($archivo!="."&&$archivo!=".."){
                        $nombrearchivo=str_replace(".sql", "", $archivo);
                        $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                        $ruta_completa=$ruta.$archivo;
                        if(is_dir($ruta_completa)){
                        }else{
                            echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                        }
                    }
                }
                closedir($aux);
            }
        }else{
            echo $ruta." No es ruta válida";
        }
      ?>
    </select>
    <button type="submit" >Restaurar</button>
  </form>
</body>

      
      
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
