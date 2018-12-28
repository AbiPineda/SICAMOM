<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
?>

  <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">
<div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Lista de Espera</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                  <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Registro" onclick="location.href='../Expediente_Admin/verExpedienteAdmin.php'" ></div>
                                    </div>   
                       </div>

<div class="col-lg-12">
   <?php
   $validarguantes = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Guantes'");
   if (mysqli_num_rows($validarguantes)>0) {
      $sacar1 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Guantes'");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $guantes_dec=$fila1['decremento'];
                    } 

 ?>   
 <?php
 if($guantes_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Guantes existencia:<?php echo $guantes_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Guantes existencia: <?php echo $guantes_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

   <?php
   $validarpaletas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Paletas'");
   if (mysqli_num_rows($validarpaletas)>0) {
      $sacar2 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Paletas'");
                while ($fila2 = mysqli_fetch_array($sacar2)) {
                      $paletas_dec=$fila2['decremento'];
                    } 

 ?>   
 <?php
 if($paletas_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Paletas existencia:<?php echo $paletas_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Paletas existencia: <?php echo $paletas_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
  <?php
  $validaralgodon = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Algodon'");
   if (mysqli_num_rows($validaralgodon)>0) {
   $sacar3 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Algodon'");
                while ($fila3 = mysqli_fetch_array($sacar3)) {
                      $algodon_dec=$fila3['decremento'];
                    }
 ?>   
 <?php
 if($algodon_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Algodón existencia:<?php echo $algodon_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Algodón existencia: <?php echo $algodon_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

  <?php
   $validarpapel = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel'");
   if (mysqli_num_rows($validarpapel)>0) {
      $sacar4 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel'");
                while ($fila4 = mysqli_fetch_array($sacar4)) {
                      $papel_dec=$fila4['decremento'];
                    } 

 ?>   
 <?php
 if($papel_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Papel de Cama existencia:<?php echo $papel_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Papel de Cama existencia: <?php echo $papel_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

  <?php
   $validarisopo = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Isopos'");
   if (mysqli_num_rows($validarisopo)>0) {
      $sacar5 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Isopos'");
                while ($fila5 = mysqli_fetch_array($sacar5)) {
                      $isopo_dec=$fila5['decremento'];
                    } 

 ?>   
 <?php
 if($isopo_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Isopos existencia:<?php echo $isopo_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Isopos existencia: <?php echo $isopo_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
  <?php
   $validarjeringas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Jeringa'");
   if (mysqli_num_rows($validarjeringas)>0) {
      $sacar6 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Jeringa'");
                while ($fila6 = mysqli_fetch_array($sacar6)) {
                      $jeringa_dec=$fila6['decremento'];
                    } 

 ?>   
 <?php
 if($jeringa_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Jeringas existencia:<?php echo $jeringa_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Jeringas existencia: <?php echo $jeringa_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

                                    </div>   

    </div>
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
    </br>
      <div class="col-md-12">
          <div id="bodywrap">
  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
     <thead>
     <th><div>N° Expediente</div></th> 
     <th><div>Paciente</div></th>
     <th><div>Estado</div></th>
     <th><div>Accion</div></th>
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
<?php
date_default_timezone_set('America/El_Salvador');
$d = date("d");
$m = date("m");
$y = date("Y");                
          $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente, t_llegada WHERE fk_medico=idMedico AND fk_paciente=id_paciente AND fk_expediente=id_expediente AND (lleg_ffecha_atiende='$y-$m-$d') AND t_llegada.estado=1 ORDER BY id_llegada");
            while ($fila = mysqli_fetch_array($sacar)) {
                   $modificar=$fila['id_expediente'];
                   $codigo=$fila['codigo'];
                   $nom=$fila['pac_cnombre']; 
                   $ape=$fila['pac_capellidos'];  
                   $modi_llegada=$fila['id_llegada'];
                   $fe=$fila['estado']; 
                 
                 if ($fe==0) {
                     $estado="Desactivado";
                 } else {
                     $estado="Esperando...";
                 }
               //  $tipo=$fila['con_ctipo_consulta'];  
                 // $fe=$fila['pac_ffecha_nac']; 
               // $partes = explode('-', $fe);
              //  $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
             
        ?>
      <tr>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $codigo;?></td>
        <th scope="row"><?php echo $nom . " " . $ape;?></th>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $estado;?></td>
        <td class="text"><a href="../Expediente_Admin/realizarConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta Ginecológica</a>
          <a href="../Expediente_Admin/controlEmbarazo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Control Embarazo</a>
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

<?php

    include_once '../plantilla/pie.php';

?>
