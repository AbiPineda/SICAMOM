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
                    <h3 class="card-title" style="color: white">Busqueda de Expediente </h3> 
                    <div class="col-lg-12">
                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                            <input type="button" class="btn btn-info" name="" id="su"  value="Nuevo Expediente" onclick="location.href = '../Expediente_Admin/expedienteAdmin.php'" ></div>
                    </div> 
                </div>
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
                </div>
                <div class="card" >
                    <div class="row">
                        <div class="col-md-12">
                            <div id="bodywrap">
                                <div class="scroll-window-wrapper">
                                    <div class="scroll-window">
                                        <table class="table table-striped table-hover user-list fixed-header">
                                            <thead>
                                            <th><div>N° de Expediente</div></th> 
                                            <th><div>Paciente</div></th>
                                            <th><div>Accion</div></th>
                                            </thead>
                                            <tbody  class="buscar"> 
                                                <?php
                                                $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente WHERE fk_medico=idMedico AND fk_paciente=id_paciente");
                                                while ($fila = mysqli_fetch_array($sacar)) {
                                                    $modificar1 = $fila['id_expediente'];
                                                    $codigo = $fila['codigo'];
                                                    $ape = $fila['pac_capellidos'];
                                                    $nom = $fila['pac_cnombre'];
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $codigo; ?></th>
                                                        <th scope="row"><?php echo $nom . " " . $ape; ?></th>
                                                        <td class="text"><a href="../Expediente_Admin/controlConsultaDiariaAdmin.php?ir2=<?php echo $modificar1; ?>" class="btn btn-success fas fa-edit">Lista de Espera</a>
                                                        </td>

                                                    <?php } ?>

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
        </div>
    </div>
</div>
<?php
include_once '../plantilla/pie.php';
?>
   