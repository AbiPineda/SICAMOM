<?php
include_once '../plantillaSecretaria/cabeceraSecretaria.php';
include_once '../plantillaSecretaria/menuSecretaria.php';
include_once '../plantillaSecretaria/menuLateralSecretaria.php';
include_once '../../Conexion/conexion.php';
$modi1 = $_GET['ir2'];
?>

<link href="../../dist/css/styleTabla.css" rel="stylesheet">
<div class="page-wrapper" style="height: 671px;">
    <div class="container-fluid">
        <div class="card" style="background: rgba(0, 101, 191,0.6)">        
            <div class="card-body wizard-content">
                <h3 class="card-title" style="color: white">Registrar Consulta</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                <div class="col-lg-12">
                    <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                        <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Registro" onclick="location.href = '../Expediente_Usuarios/verExpediente.php'" ></div>
                </div>   
            </div>



        </div>
        <div class="row mb-12">   

            <div class="wrap">
                <div class="col-lg-12">
                    <script src="../../html/js/jquery.min.js" ></script>
                    <script src="../../html/js/buscaresc.js"></script>

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
                <input type="hidden" name="tirar" value="<?php echo $modi1; ?>" id="pase"/>
                <div id="bodywrap">

                    <?php
                    date_default_timezone_set('America/El_Salvador');
                    $d1 = date("d");
                    $m1 = date("m");
                    $y1 = date("Y");
                    $esta = 1;
                    include_once '../../Conexion/conexion.php';
                    // $estado='Espera';

                    /* $sacar = mysqli_query($conexion,"SELECT * FROM t_expediente");
                      while ($fila = mysqli_fetch_array($sacar)) {
                      $expediente=$fila['id_expediente']; */
                    mysqli_query($conexion, "INSERT INTO t_llegada(fk_expediente,lleg_ffecha_atiende,estado) VALUES('$modi1','$y1-$m1-$d1','$esta')");
                    ?>
                    <div class="scroll-window-wrapper">
                        <div class="scroll-window">
                            <table class="table table-striped table-hover user-list fixed-header">
                                <thead>

                                <th><div>Paciente</div></th>
                                <th><div>Doctor que atiende</div></th>
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
    $modificar = $fila['id_paciente'];
    $ape = $fila['pac_capellidos'];
    $nom = $fila['pac_cnombre'];
    $apedoc = $fila['med_capellidos'];
    $nomdoc = $fila['med_cnombre'];
    $modi_llegada = $fila['id_llegada'];
    $fe = $fila['estado'];

    if ($fe == 0) {
        $estado = "Desactivado";
    } else {
        $estado = "Esperando";
    }
    //  $tipo=$fila['con_ctipo_consulta'];  
    // $fe=$fila['pac_ffecha_nac']; 
    // $partes = explode('-', $fe);
    //  $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
    ?>
                                        <tr>
                                            <th scope="row"><?php echo $nom . " " . $ape; ?></th>
                                            <td data-title="Worldwide Gross" data-type="currency"><?php echo $nomdoc . " " . $apedoc; ?></td>
                                            <td data-title="Domestic Gross" data-type="currency"><?php echo $estado; ?></td>
                                        <?php if ($fe == 0) { ?>
                                                <td class="text"><a href="ProcesoDarBajaAltaCola.php?ir=<?php echo $modi_llegada; ?>"  class="btn btn-success fas fa-arrow-circle-up">Dar Alta</a></td>
        <?php
    } else {
        ?>
                                                <td class="text"><a href="ProcesoDarBajaAltaCola.php?ir=<?php echo $modi_llegada; ?>" class="btn btn-warning fas fa-arrow-circle-down" >Dar Baja</a></td>

                                            <?php }
                                        }
                                        ?>

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
include_once '../plantillaSecretaria/pieSecretaria.php';
?>
