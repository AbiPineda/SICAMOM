<?php
include_once '../plantillaSecretaria/cabeceraSecretaria.php';
include_once '../plantillaSecretaria/menuSecretaria.php';
include_once '../plantillaSecretaria/menuLateralSecretaria.php';
include_once '../../Conexion/conexion.php';
?>

<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <!-- Estilo de la tabla-->
        <link href="../../dist/css/styleTabla.css" rel="stylesheet">
    </head>

    <body>
        <div class="page-wrapper" style="height: 671px;">

            <div class="container-fluid">
                <div class="card"  style="background: rgba(0, 101, 191,0.6)">        
                    <div class="card-body wizard-content">
                        <div class="row">
                            <h3 class="card-title" style="color: white">Lista de Espera </h3> 
                            <div class="col-lg-12">
                                <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                    <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Expediente" onclick="location.href = '../Expediente_Usuarios/verExpediente.php'" ></div>
                            </div> 
                        </div>

                        <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                        <div class="row">                                             
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
                                                        $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente, t_llegada WHERE fk_medico=idMedico AND fk_paciente=id_paciente AND fk_expediente=id_expediente AND (lleg_ffecha_atiende='$y-$m-$d') ORDER BY id_llegada=1");
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

                                    </div>
                                </div> <!-- Div bodywrap -->
                            </div>
                        </div>

                    </div> <!-- Div col-md-12 -->
                </div> <!-- Div card -->
            </div>
        </div>

<?php
include_once '../plantillaSecretaria/pieSecretaria.php';
?>
