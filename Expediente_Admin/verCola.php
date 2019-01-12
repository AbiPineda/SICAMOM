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

<div class="col-lg-20">
  <!--GUANTES-->
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
          <input type="button" class="btn btn-success" name="" id="su"  value="Guantes:<?php echo $guantes_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Guantes: <?php echo $guantes_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
<!--BAJA LENGUA-->
   <?php
   $validarpaletas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Baja Lengua'");
   if (mysqli_num_rows($validarpaletas)>0) {
      $sacar2 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Baja Lengua'");
                while ($fila2 = mysqli_fetch_array($sacar2)) {
                      $paletas_dec=$fila2['decremento'];
                    } 

 ?>   
 <?php
 if($paletas_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Baja Lengua:<?php echo $paletas_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Baja Lengua: <?php echo $paletas_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

<!--ALGODON-->
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
          <input type="button" class="btn btn-success" name="" id="su"  value="Algodón:<?php echo $algodon_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Algodón: <?php echo $algodon_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
<!--PAPEL-->
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
          <input type="button" class="btn btn-success" name="" id="su"  value="Papel de Cama:<?php echo $papel_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Papel de Cama: <?php echo $papel_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
<!--HISOPOS-->
  <?php
   $validarisopo = mysqli_query($conexion,"SELECT t_categoria_insumo.nombreCategoria, inventario_unidades.decremento FROM inventario_unidades INNER JOIN t_categoria_insumo ON inventario_unidades.categoria = t_categoria_insumo.idcategoria WHERE t_categoria_insumo.idcategoria=3");
   if (mysqli_num_rows($validarisopo)>0) {
      $sacar5 = mysqli_query($conexion,"SELECT t_categoria_insumo.nombreCategoria, inventario_unidades.decremento FROM inventario_unidades INNER JOIN t_categoria_insumo ON inventario_unidades.categoria = t_categoria_insumo.idcategoria WHERE t_categoria_insumo.idcategoria=3");
                while ($fila5 = mysqli_fetch_array($sacar5)) {
                      $isopo_dec=$fila5['decremento'];
                    } 

 ?>   
 <?php
 if($isopo_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Isopos:<?php echo $isopo_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Isopos: <?php echo $isopo_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
<!--JERINGAS-->
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
          <input type="button" class="btn btn-success" name="" id="su"  value="Jeringas:<?php echo $jeringa_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Jeringas: <?php echo $jeringa_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>
<!--CURITAS-->
  <?php
   $validarcuritas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Curitas'");
   if (mysqli_num_rows($validarcuritas)>0) {
      $sacar7 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Curitas'");
                while ($fila7 = mysqli_fetch_array($sacar7)) {
                      $curitas_dec=$fila7['decremento'];
                    } 

 ?>   
 <?php
 if($curitas_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Curitas:<?php echo $curitas_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Curitas: <?php echo $curitas_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

<!--GASAS-->
  <?php
   $validargasas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Gasa'");
   if (mysqli_num_rows($validargasas)>0) {
      $sacar8 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Gasa'");
                while ($fila8 = mysqli_fetch_array($sacar8)) {
                      $gasas_dec=$fila8['decremento'];
                    } 

 ?>   
 <?php
 if($gasas_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Gasas:<?php echo $gasas_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Gasas: <?php echo $gasas_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

<!--ESPECULO-->
  <?php
   $validarespeculo = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Especulo'");
   if (mysqli_num_rows($validarespeculo)>0) {
      $sacar9 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Especulo'");
                while ($fila9 = mysqli_fetch_array($sacar9)) {
                      $especulo_dec=$fila9['decremento'];
                    } 

 ?>   
 <?php
 if($especulo_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Especulos:<?php echo $especulo_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Especulos: <?php echo $especulo_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

<!--MASCARILLAS-->
  <?php
   $validarmascarilla = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Mascarilla'");
   if (mysqli_num_rows($validarmascarilla)>0) {
      $sacar10 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Mascarilla'");
                while ($fila10 = mysqli_fetch_array($sacar10)) {
                      $mascarilla_dec=$fila10['decremento'];
                    } 

 ?>   
 <?php
 if($mascarilla_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Mascarillas:<?php echo $mascarilla_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Mascarillas: <?php echo $mascarilla_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

<!--AGUJAS-->
  <?php
   $validaraguja = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Aguja'");
   if (mysqli_num_rows($validaraguja)>0) {
      $sacar11 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Aguja'");
                while ($fila11 = mysqli_fetch_array($sacar11)) {
                      $aguja_dec=$fila11['decremento'];
                    } 

 ?>   
 <?php
 if($aguja_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Agujas:<?php echo $aguja_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Agujas: <?php echo $aguja_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
  <?php }
}?>

<!--FOTOGRAFICO-->
  <?php
   $validarFOTOGRAFICO = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel Fotografico'");
   if (mysqli_num_rows($validarFOTOGRAFICO)>0) {
      $sacar12 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel Fotografico'");
                while ($fila12 = mysqli_fetch_array($sacar12)) {
                      $FOTOGRAFICO_dec=$fila12['decremento'];
                    } 

 ?>   
 <?php
 if($FOTOGRAFICO_dec>10){
 ?>       <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-success" name="" id="su"  value="Papel:<?php echo $FOTOGRAFICO_dec;?>"  ></div>
  <?php }else{?>
    <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
          <input type="button" class="btn btn-warning" name="" id="su"  value="Papel: <?php echo $FOTOGRAFICO_dec;?>" onclick="location.href='../Registros/Existencias.php'" ></div>
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
          <a href="../Expediente_Admin/controlEmbarazo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Control Prenatal</a>
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
