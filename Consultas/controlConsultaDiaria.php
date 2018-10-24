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
<div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Registrar Consulta</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                <form action="" id="f1" name="f1" method="post" class="form-register" >
                    <input type="hidden" name="tirar" id="pase"/>
                    <div>
                        <section>
                            <div class="row mb-12">
                                    <div class="col-lg-12">
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                          <button type="reset" class="btn btn-info" name="nameCancelar">Nuevo Paciente </button></div>
                                    </div> 
                                <div class="col-lg-4">
                                    <label style="color: white">Nombres <small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="nombrecon"  class="form-control" id="fnamep" placeholder="Ingrese nombres" autocomplete="off" value="" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-4">
                                    <label style="color: white">Apellidos<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="apellidocon"  class="form-control" id="fnamep" placeholder="Ingrese apellidos" autocomplete="off" value="" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>                                    
                                </div>
                              <div class="col-lg-3">
                                    <label style="color: white">DUI<small class="text-muted"> 99999999-9</small></label>
                                    <div class="input-group">
                                        <input type="text" name="duicon"  class="form-control phone-inputmask" id="dui" placeholder="Ingrese DUI" autocomplete="off" value=""> 
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                    </div> 
                                </div>
                                <br/><br>
                                <div class="col-lg-4">
                                    <label style="color: white">Doctor que atiende<small class="text-muted"></small></label>
                                    <select class="custom-select" name="tipocon" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <option value="Consulta General">Consulta general</option>
                                        <option value="Control de Embarazo">Control de embarazo</option>
                                    </select>
 
                                </div>
                                <br/>
                                <div class="col-lg-12">
                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                            <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                </div>   
                              </div>
                    </section>

            </div>

            </form>

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
      <h3 class="card-title" style="color: black">Consulta</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
     <th><div>Paciente</div></th>
     <th><div>Doctor que atiende</div></th>
     <th><div>Accion</div></th>
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
<?php
date_default_timezone_set('America/El_Salvador');
$d = date("d");
$m = date("m");
$y = date("Y");

        $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente, t_llegada WHERE fk_medico=idMedico AND fk_paciente=id_paciente AND fk_expediente=id_expediente AND (lleg_ffecha_atiende='$y-$m-$d') ORDER BY id_llegada");
            while ($fila = mysqli_fetch_array($sacar)) {
                   $modificar=$fila['id_paciente'];
                 $ape=$fila['pac_capellidos'];  
                 $nom=$fila['pac_cnombre'];  
                 $apedoc=$fila['med_capellidos'];  
                 $nomdoc=$fila['med_cnombre'];
               //  $tipo=$fila['con_ctipo_consulta'];  
                 // $fe=$fila['pac_ffecha_nac']; 
               // $partes = explode('-', $fe);
              //  $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
             
        ?>
      <tr>
        <th scope="row"><?php echo $nom . " " . $ape;?></th>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $nomdoc . " " . $apedoc;?></td>
        <td class="text"><a href="../Consultas/registroConsultaDiaria.php?ir=<?php echo $modificar; ?>" class="btn btn-success fas fa-edit">Consulta</a>
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
date_default_timezone_set('America/El_Salvador');
$d1 = date("d");
$m1 = date("m");
$y1 = date("Y");

    if (isset($_REQUEST['btnEnviar'])) {
    include_once '../Conexion/conexion.php';
    $nombre_pac = $_REQUEST['nombrecon'];
    $apellido = $_REQUEST['apellidocon'];
    $dui = $_REQUEST['duicon'];
    $doctor= $_REQUEST['doctorcon'];
                 $id_pac=$fila['id_paciente'];

$verificar_insert = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_cnombre='$nombre_pac'");
$verificar_insert1 = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_capellidos='$apellido'");
$verificar_insert2= mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_cdui='$dui'");

 
if (mysqli_num_rows($verificar_insert) > 0 || mysqli_num_rows($verificar_insert1) > 0 ||mysqli_num_rows($verificar_insert2) > 0 ) {
   $sacar = mysqli_query($conexion,"SELECT id_paciente FROM t_paciente WHERE pac_cnombre='$nombre_pac'");
            while ($fila = mysqli_fetch_array($sacar)) {
                  $paciente=$fila['id_paciente']; 
  $sacar1 = mysqli_query($conexion,"SELECT id_expediente FROM t_expediente WHERE fk_paciente='$paciente'");
            while ($fila1 = mysqli_fetch_array($sacar1)) {
                  $expediente=$fila1['id_expediente']; 
  mysqli_query($conexion, "INSERT INTO t_llegada(fk_expediente,lleg_ffecha_atiende) VALUES('$expediente','$y1-$m1-$d1')");
       echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="controlConsultaDiaria.php";
                    
                });</script>';
            }}}
else
{
         echo '<script>swal({
                    title: "Alerta",
                    text: "El paciente no se encuentra Registrado",
                    type: "warning",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="controlConsultaDiaria.php";
                    
                });</script>';
}
          }
    include_once '../plantilla/pie.php';

?>
