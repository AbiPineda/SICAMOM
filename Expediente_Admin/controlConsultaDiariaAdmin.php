<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
 $modi1 = $_GET['ir2'];
?>
<?php
date_default_timezone_set('America/El_Salvador');
$d1 = date("d");
$m1 = date("m");
$y1 = date("Y");
 $esta=1;
    include_once '../Conexion/conexion.php';

 $verificar_insert  = mysqli_query($conexion, "SELECT * FROM t_llegada WHERE fk_expediente='$modi1' AND lleg_ffecha_atiende='$y1-$m1-$d1' AND estado=1");
       if (mysqli_num_rows($verificar_insert) > 0) {
                  echo '<script>swal({
                    title: "Error",
                    text: "¡Paciente ingresado a lista de espera de este dia!",
                    type: "warning",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="verExpedienteAdmin.php";
               });</script>';
               }
               else 
               {
       mysqli_query($conexion, "INSERT INTO t_llegada(fk_expediente,lleg_ffecha_atiende,estado) VALUES('$modi1','$y1-$m1-$d1','$esta')");
           echo '<script>swal({
                    title: "Exito",
                    text: "¡Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="verCola.php";
                    
                });</script>';
       }
 ?>
   <link href="../dist/css/styleTabla.css" rel="stylesheet">
    <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">
<div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Registrar Consulta</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                  <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Registro" onclick="location.href='../Expediente_Admin/verExpedienteAdmin.php'" ></div>
                                    </div>   
                       </div>



    </div>


    <div class="card" >
      <h3 class="card-title" style="color: black">Consulta</h3>
      <div class="col-md-12">
   <!-- <input type="hidden" name="tirar" value="<?php //echo $modi1; ?>" id="pase"/>-->
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
          $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente, t_llegada WHERE fk_expediente=id_expediente AND fk_medico=idMedico AND fk_paciente=id_paciente AND (lleg_ffecha_atiende='$y-$m-$d') AND t_llegada.estado=1 ORDER BY id_llegada");
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

//print $edad;



//echo floor($sem).'  Semanas';
                 
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
        <th scope="row"><?php echo $edad;?></th>
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
