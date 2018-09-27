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

         <div class="col-lg-4">
            <label style="padding-top: 5px;" >Organizar por Edad<small class="text-muted"></small></label>
            <select class="custom-select" name="tipo" onchange="location = this.value">
                <option>Menor de Edad</option>
               <!-- <option value="consultaMenoresdeEdad.php">Menor de Edad</option> -->
                <option value="modificarMayoresdeEdad.php">Mayor de Edad</option>
                
               
            </select>
            
        </div>
      <br/>

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
      <h3 class="card-title">Modificar Paciente Menor de Edad | Datos generales</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window" >
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
      <th ><div>Nombre</div></th>
      <th ><div>Apellido</div></th>
      <th ><div>Fecha nacimiento</div></th>
      <th ><div>Responsable</div></th>
      <th ><div>DUI Responsable</div></th>
      <th ><div>Tel. Responsable</div></th>   
      <th ><div>Acción</div></th>      
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
                 $modificar=$fila['id_paciente']; 
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
        <td class="text"><a href="../Consultas/modificarPacienteMenor.php?ir1=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Modificar</a>
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
