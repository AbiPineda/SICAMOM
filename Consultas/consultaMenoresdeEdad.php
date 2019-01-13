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

            <div class="row mb-12">   
        
            <div class="wrap">
                <div class="col-lg-12">
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
      <div class="col-lg-2">
            <select class="custom-select" name="tipo" onchange="location = this.value">
                <option>Seleccionar edad</option>
                <option value="consultaMenoresdeEdad.php">Menor de Edad</option>
                <option value="consultaMayoresdeEdad.php">Mayor de Edad</option>
               
            </select>
        </div>

        <div class="col-md-3 col-md-pull-9">
                      <a href='#'  data-toggle="modal" data-target='#myModal'><button type='button' class='btn btn-success'>Ayuda</button></a>
                    </div>
   
    

    </div>
            <!--Fin Búsqueda-->

            <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ayuda | Registro de paciente.</h4> 
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

    <div class="card" >
      <h3 class="card-title">Menores de edad | Datos generales</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
      <th><div>Nombres</div></th>
      <th><div>Apellidos</div></th>
      <th><div>Fecha de nacimiento</div></th>
      <th><div>Responsable</div></th>
      <th><div>DUI Responsable</div></th>
      <th><div>Tel. Responsable</div></th>    
      
      
      
    </thead>
    <tbody  class="buscar"> 
    <?php
$d = date("d");
$m = date("m");
$y = date("Y");
$ym=$y-18;

//echo "$d-$m-$ym";
        $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente, t_responsable WHERE (pac_ffecha_nac>='$ym-$m-$d') AND t_paciente=id_paciente AND t_paciente.estado=1");
            while ($fila = mysqli_fetch_array($sacar)) {
                 
                 $ape=$fila['pac_capellidos'];  
                 $nom=$fila['pac_cnombre'];  
                 $fe=$fila['pac_ffecha_nac']; 
                $partes = explode('-', $fe);
                $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
         
                 $resnombre=$fila['res_cnombre'];
                 $resapellidos=$fila['res_capellidos'];
                 $dui=$fila['res_cdui'];  
                 $tel=$fila['res_ctelefono']; 
            
        ?>
      <tr>
        <th scope="row"><?php echo $nom;?></th>
        <td data-title="Released"><?php echo $ape;?></td>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $_fecha;?></td>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $resnombre . " " . $resapellidos;?></td>
        <td data-title="Studio"><?php echo $dui;?></td>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $tel;?></td>
        

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
