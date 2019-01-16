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

        <td class="text">


      <a href="../pdf/receta.php?ir=<?php echo $modificar;?>" class="btn btn-success fas fa-edit">Receta</a>  

        <a href="../Expediente_Admin/examenes.php?ir=<?php echo $modi_consulta; ?>" class="btn btn-success fas fa-edit">Examenes</a>

        <a href="../pdf/referencia.php?ir=<?php echo $modificar;?>" class="btn btn-success fas fa-edit">Referencia médica</a> 

        </td>
      
      </tr>

    </tbody>
  </table>

<form action="" id="f1" name="f1" method="post" class="form-register" >
  <br/><br>
                                    <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
<input type="submit" class="btn btn-success fas fa-edit" name="btnEnviar" id="btnEnviar"  value="Guardar" >
</div>
</div>
</form>

  </div> <!-- Div scroll-window -->
</div> <!-- Div scroll-window-wrapper-->


</div> <!-- Div bodywrap -->

  </div> <!-- Div col-md-12 -->
  </div> <!-- Div card -->
  </div> <!-- Div page-wrapper -->
  </div> <!-- Div page-wrapper -->

<?php
    date_default_timezone_set('America/El_Salvador');
    $d1 = date("d");
    $m1 = date("m");
    $y1 = date("Y");

        if (isset($_REQUEST['btnEnviar'])) {
        include_once '../Conexion/conexion.php';

         Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
             
         $sacar1 = mysqli_query($conexion, "SELECT * FROM t_llegada WHERE (lleg_ffecha_atiende='$y1-$m1-$d1') AND estado=2 ORDER BY id_llegada");
            while ($fila1 = mysqli_fetch_array($sacar1)) {
                   $modificar=$fila1['fk_expediente'];
                 }
mysqli_query($conexion,"UPDATE t_llegada SET estado = 0 WHERE fk_expediente='$modificar' AND (lleg_ffecha_atiende='$y1-$m1-$d1')");

                     echo '<script>swal({
                        title: "Exito",
                        text: "¡Consulta Finalizada!",
                        type: "success",
                        confirmButtonText: "Aceptar",
                        closeOnConfirm: false
                    },
                    function () {
                        location.href="../Expediente_Admin/verCola.php";
                        
                    });</script>';
              }
    include_once '../plantilla/pie.php';

?>
