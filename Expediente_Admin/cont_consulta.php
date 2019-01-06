<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
?>

  <div class="page-wrapper" style="height: 671px;">
  <div class="container-fluid">
<div class="card" style="background: rgba(0, 101, 191,0.6)">        

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
     <th><div>Accion</div></th>
    </thead>
    <tbody  class="buscar"> 
<?php
date_default_timezone_set('America/El_Salvador');
$d = date("d");
$m = date("m");
$y = date("Y");                
         $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente, t_llegada WHERE t_expediente.fk_medico=idMedico AND fk_paciente=id_paciente AND t_llegada.fk_expediente=id_expediente AND (lleg_ffecha_atiende='$y-$m-$d') AND t_llegada.estado=2 ORDER BY id_llegada");
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
}
               //  $tipo=$fila['con_ctipo_consulta'];  
                 // $fe=$fila['pac_ffecha_nac']; 
               // $partes = explode('-', $fe);
              //  $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
              $sacar2 = mysqli_query($conexion, "SELECT*FROM t_expediente, t_consulta WHERE t_consulta.fk_expediente=t_expediente.id_expediente AND (con_fecha_atiende='$y-$m-$d')");
            while ($fila2 = mysqli_fetch_array($sacar2)) {
                   $modi_consulta=$fila2['idconsulta'];
                 }
        ?>
      <tr>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $codigo;?></td>
        <th scope="row"><?php echo $nom . " " . $ape;?></th>
        <td class="text"><a href="../Expediente_Admin/recetas.php?ir=<?php echo $modi_consulta; ?>" class="btn btn-success fas fa-edit">Recetas</a>
        <a href="../Expediente_Admin/examenes.php?ir=<?php echo $modi_consulta; ?>" class="btn btn-success fas fa-edit">Examenes</a>
        <a href="../Expediente_Admin/realizarConsultaDiaria.php?ir=<?php echo $modi_consulta; ?>" class="btn btn-success fas fa-edit">Referencias Medicas</a>
        <a href="../Expediente_Admin/verCola.php?ir=<?php echo $modi_consulta; ?>" class="btn btn-success fas fa-edit">Finalizar</a>
        </td>
      
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
