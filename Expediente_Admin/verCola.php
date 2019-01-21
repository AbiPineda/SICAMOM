<?php
session_start();
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
include_once '../Login/funcs/conexion.php';
$idUsuario = $_SESSION['id_usuario'];
  
  $sql = "SELECT id, nombre FROM usuarios WHERE id = '$idUsuario'";
  $result = $mysqli->query($sql);
  
  $row = $result->fetch_assoc();
?>

  <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">
<div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Lista de Espera</h3>
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
     <th><div>Edad</div></th>
     <th><div>Estado</div></th>
     <th><div>Accion</div></th> 
    </thead>
    <tbody  class="buscar"> 
<?php
date_default_timezone_set('America/El_Salvador');
$d = date("d");
$m = date("m");
$y = date("Y");                
          $sacar = mysqli_query($conexion, "SELECT
t_expediente.codigo,
t_expediente.id_expediente,
t_paciente.pac_cnombre,
t_paciente.pac_ffecha_nac,
t_paciente.pac_capellidos,
t_llegada.id_llegada,
t_llegada.estado,
usuarios.id
FROM
t_expediente
INNER JOIN t_medico ON t_expediente.fk_medico = t_medico.idMedico
INNER JOIN t_paciente ON t_expediente.fk_paciente = t_paciente.id_paciente
INNER JOIN t_llegada ON t_llegada.fk_expediente = t_expediente.id_expediente
INNER JOIN usuarios ON t_medico.fk_usuario = usuarios.id
WHERE t_llegada.estado=1 and usuarios.id=$idUsuario ");
            while ($fila = mysqli_fetch_array($sacar)) {
                   $modificar=$fila['id_expediente'];
                   $codigo=$fila['codigo'];
                   $nom=$fila['pac_cnombre']; 
                   $ape=$fila['pac_capellidos'];  
                   $modi_llegada=$fila['id_llegada'];
                   $fe=$fila['estado']; 

                   $fe_nac = $fila['pac_ffecha_nac'];
                   $partes = explode('-', $fe_nac);
                   $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 

//fecha actual
    date_default_timezone_set('America/El_Salvador');
    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");

//fecha de nacimiento

//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

if (($partes[1] == $mes) && ($partes[2] > $dia)) {
$ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

if ($partes[1] > $mes) {
$ano=($ano-1);}

//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

$edad=($ano-$partes[0]);
                 
                 if ($fe==0) {
                     $estado="Desactivado";
                 } else {
                     $estado="Esperando...";
                 }
        ?>

      <tr>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $codigo;?></td>
        <th scope="row"><?php echo $nom . " " . $ape;?></th>
        <th scope="row"><?php echo $edad." años";?></th>
        <td data-title="Domestic Gross" data-type="currency"><?php echo $estado;?></td>


     <?php 
     if ($edad>=8) { 
      
    
        if($fe==0){ ?>
        <td class="text">
           <a href="../Expediente_Admin/ProcesoDarBajaAltaColaAdmin.php?ir=<?php echo $modi_llegada; ?>"  class="btn btn-success fas fa-arrow-circle-up" style="margin-right:10px">Dar Alta</a>
          <a href="../Expediente_Admin/realizarConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta Ginecológica</a>
          <a href="../Expediente_Admin/controlEmbarazo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Control Prenatal</a>
         </td>
        <?php
        }else{
        ?>
        <td class="text">
          <a href="../Expediente_Admin/ProcesoDarBajaAltaColaAdmin.php?ir=<?php echo $modi_llegada; ?>" class="btn btn-warning fas fa-arrow-circle-down" style="margin-right:10px">Dar Baja</a>
          <a href="../Expediente_Admin/realizarConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta Ginecológica</a>
          <a href="../Expediente_Admin/controlEmbarazo.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Control Prenatal</a>
          </td>
      <?php  }
    } else {



       if($fe==0){ ?>
        <td class="text">
          <a href="../Expediente_Admin/ProcesoDarBajaAltaColaAdmin.php?ir=<?php echo $modi_llegada; ?>"  class="btn btn-success fas fa-arrow-circle-up" style="margin-right:10px">Dar Alta</a>
          <a href="../Expediente_Admin/realizarConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta Ginecológica</a>
          </td>
        <?php
        }else{
        ?>
        <td class="text">
           <a href="../Expediente_Admin/ProcesoDarBajaAltaColaAdmin.php?ir=<?php echo $modi_llegada; ?>" class="btn btn-warning fas fa-arrow-circle-down" style="margin-right:10px">Dar Baja</a>
          <a href="../Expediente_Admin/realizarConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta Ginecológica</a>
         </td>
      <?php  }
            }

          }?>
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

<?php

    include_once '../plantilla/pie.php';

?>
