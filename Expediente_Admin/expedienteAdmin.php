<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

?>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
            <div class="card"  style="background: rgba(0, 101, 191,0.6)">        
                <div class="card-body wizard-content">
                  <div class="row">
                   <h3 class="card-title" style="color: white">Buscar Paciente </h3> 
 <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Paciente" onclick="location.href='../Registros/registroPaciente.php'" ></div>
                                      
                                              <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Ver Expediente" onclick="location.href='../Expediente_Admin/verExpedienteAdmin.php'" ></div>
                                    </div>
                                  </div>
                   
                    <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
         <div class="row">                                             
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
</div>
</br>
</br>
<div class="card" >
<div class="row">
  
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
         <td class="text"><a href="../Expediente_Admin/registroExpedienteAdmin.php?ir2=<?php echo $modificar1; ?>" class="btn btn-success fas fa-edit">Crear Expediente</a>
        </td>

       <?php  }?>
      
      </tr>

    </tbody>
  </table>
 
  </div> <!-- Div scroll-window -->

</div> <!-- Div scroll-window-wrapper-->

</div>
</div> <!-- Div bodywrap -->
</div>
</div>

  </div> <!-- Div col-md-12 -->
  </div> <!-- Div card -->


        </div>
    </div>

<?php
             
    include_once '../plantilla/pie.php';

?>
