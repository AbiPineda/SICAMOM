    <?php

    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
        $modi = $_GET['ir'];
        ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="../dist/css/styleconsulta.css" rel="stylesheet">
    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
           <div class="card" style="background: rgba(0, 101, 191,0.6)">        
               <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Consulta General</h3>
                    
                      <form action="registroConsultaDiaria.php" method="post">
                    <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
    <div class="row">
                                <div class="col-md-12">
                                                                    <?php
                                        include_once '../Conexion/conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente WHERE id_paciente='$modi'");
                                        while ($fila = mysqli_fetch_array($sacar)) {
                                            $modificar = $fila['id_paciente'];
                                            $ape = $fila['pac_capellidos'];
                                            $nom = $fila['pac_cnombre'];
                                            $dui = $fila['pac_cdui'];
                                            $tel = $fila['pac_ctelefono'];
                                            $fe = $fila['pac_ffecha_nac'];
                                            ?>
                                <h5 class="card-title" style="color:white">Datos Generales del Paciente</h5>
                                    <div class="col-md-7">

                                       
                                        <div>
                                        <label style="color: white" >Paciente: <small class="text-muted"></small></label>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" placeholder="Ingrese nombre" autocomplete="off" value="<?php echo $nom . " " . $ape; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="35">  
                                        </div> 
                                    </div>  
                                    <div class="col-md-5">
                                    <div>
                                        <label style="color: white" >DUI: <small class="text-muted"></small></label>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $dui; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="10">  
                                        </div> 
                                    </div>                    
                                </div>
    </div>
    <br/>
    <br/>
    <div class="row">
                            <h5 class="card-title" style="color: white">Registro de Signos Vitales</h5>
                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Peso:  <small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="Kg" autocomplete="off" maxlength="6">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Talla:<small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="Cm" autocomplete="off" maxlength="6">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-child"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                         
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Temp:<small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="°C" autocomplete="off" maxlength="4">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <label style="color: white">Pulso:<small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="Lat/min" autocomplete="off" maxlength="3">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                            
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <label style="color: white">Presión:<small class="text-muted"></small></label>
                                            <input type="text" name="nombre"  class="form-control" id="fnamep" placeholder="mm de Hg" autocomplete="off" maxlength="3">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
    </div>
    <br/>
    <br/>
    <div class="row">
                                <div class="col-md-12">
                                <h5 class="card-title" style="color: white">Enfermedades y Afecciones</h5>
                                    <div class="col-md-12">
                                        <label style="color: white">Síntomas y Diagnóstico: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="5" id="comment"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div>                      
                                </div>
    </div>
    <br/>
    <br/>
    <div class="row">
                                    <div class="col-md-12">
                                            <div class="row mb-7" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                            <div class="row mb-7" style="float: right;margin-right: 20px; margin-top: 15px;">
                                              <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button></div>
                                    </div>
    </div>
         <?php
                                    }
                                    ?>

                </form>
    </div>
    </div>
    </div>
    </div>

     <?php
    include_once '../plantilla/pie.php';
    ?>
