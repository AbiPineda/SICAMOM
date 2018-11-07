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
    </div>
            <!--Fin Búsqueda-->

    <div class="card" >
      <h3 class="card-title">Buscar Paciente | Datos generales</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
     <th><div>Nombre</div></th>
      <th><div>Apellido</div></th>
      <th><div>DUI</div></th>
      <th><div>Teléfono</div></th>
      <th><div>Fecha de nacimiento</div></th>
      <th><div>Acción</div></th>
      
      
      
    </thead>
    <tbody  class="buscar"> 
    <?php
   

            $sacar = mysqli_query($conexion, "SELECT  * FROM t_paciente WHERE id_paciente NOT IN (SELECT fk_paciente FROM t_expediente) ");
            while ($fila = mysqli_fetch_array($sacar)) {
                 $modificar1=$fila['id_paciente'];
                 $ape=$fila['pac_capellidos'];  
                 $nom=$fila['pac_cnombre'];  
                 $dui=$fila['pac_cdui'];  
                 $tel=$fila['pac_ctelefono'];  
                  $fe=$fila['pac_ffecha_nac']; 
                $partes = explode('-', $fe);
                $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
            
        ?>
      <tr>
        <th scope="row"><?php echo $nom;?></th>
        <td data-title="Released"><?php echo $ape;?></td>
        <td data-title="Studio"><?php echo $dui;?></td>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $tel;?></td>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $_fecha;?></td>
         <td class="text"><a href="../Expediente_Usuarios/registroExpedienteUsuario.php?ir2=<?php echo $modificar1; ?>" class="btn btn-success fas fa-edit">Crear Expediente</a>
        </td>

       <?php  }?>
      
      </tr>

    </tbody>
  </table>   
  <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Paciente" onclick="location.href='../Registros/registroPaciente.php'" ></div>
                                      
                                              <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Ver Expedientes" onclick="location.href='../Expediente_Usuarios/verExpediente.php'" ></div>
                                    </div>   
                                  
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
