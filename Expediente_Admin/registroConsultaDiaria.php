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
                    
                      <form action="" method="post">
                    <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
   <h5 class="card-title" style="color:white">Datos Generales del Paciente</h5> 
   <div class="row">
        
                                <div class="row">                               
                                    <div class="col-md-7">       
                                    <?php
                                        include_once '../Conexion/conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente,t_expediente WHERE id_expediente='$modi' AND fk_paciente=id_paciente");
                                         while ($fila = mysqli_fetch_array($sacar)) {
                                            $modificar = $fila['id_expediente'];
                                            $ape = $fila['pac_capellidos'];
                                            $nom = $fila['pac_cnombre'];
                                            $alergias = $fila['alergias'];
                                            $tel = $fila['pac_ctelefono'];
                                            $fe = $fila['pac_ffecha_nac'];
                                             $partes = explode('-', $fe);
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
                                            ?>                             
                                        <div lass="input-group">
                                        <label style="color: white" >Paciente: <small class="text-muted"></small></label>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" placeholder="Ingrese nombre" autocomplete="off" value="<?php echo $nom . " " . $ape; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
                                        </div> 
                                    </div>  
                                    <div class="col-md-5">
                                    <div>
                                        <label style="color: white" >Edad: <small class="text-muted"></small></label>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $edad." años"; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="10">  
                                        </div> 
                                    </div> 
                                    <div class="col-md-5">
                                    <div>
                                        <label style="color: white" >Alergias: <small class="text-muted"></small></label>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $alergias; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="10">  
                                        </div> 
                                    </div> 
                                </div>
    </div>
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
    <div class="row">
        <h5 class="card-title" style="color: white">Enfermedades y Afecciones</h5>
                                <div class="col-md-12">
                                
                                    <div class="col-md-12">
                                        <label style="color: white">Síntomas y Diagnóstico: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" id="comment" name="diagnostico"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div>                      
                                </div>
    </div>
    <br/>
    <div class="row">
                            <h5 class="card-title" style="color: white">Registro de Insumos</h5>
                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Guantes:  <small class="text-muted"></small></label>
                                                <input type="number" min="1" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="1" onkeypress="return sinCaracterEspecial(event)" value="" size="10">
                                                                                </div> 
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Paletas:<small class="text-muted"></small></label>                           
                                            <input type="number" min="1" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="1" onkeypress="return sinCaracterEspecial(event)" value="">
                                       </div> 
                                    </div>
                         
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Torundas:<small class="text-muted"></small></label>
                                               <input type="number" min="1" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="1" onkeypress="return sinCaracterEspecial(event)" value="">
                                        </div> 
                                    </div>

                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Guantes:<small class="text-muted"></small></label>
                                               <input type="number" min="1" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="1" onkeypress="return sinCaracterEspecial(event)" value="">
                                        </div> 
                                    </div>
                            
                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Isopo:<small class="text-muted"></small></label>
                                              <input type="number" min="0" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="0" onkeypress="return sinCaracterEspecial(event)" value="">
                                                                                </div> 
                                    </div>
                                                                        <div class="col-md-2">
                                        <div class="input-group">
                                            <label style="color: white">Jeringas:<small class="text-muted"></small></label>
                                              <input type="number" min="0" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="0" onkeypress="return sinCaracterEspecial(event)" value="">
                                                                               </div> 
                                    </div>
                                </div>
    </div>
    <br/>
    <div class="row">
                                    <div class="col-md-12">
                                            <div class="row mb-7" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                            <div class="row mb-7" style="float: right;margin-right: 20px; margin-top: 15px;">
                                              <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button></div>
                                                 <div class="row mb-7" style="float: right; margin-right: 20px; margin-top: 15px;">
                                                <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                            <div class="row mb-7" style="float: right;margin-right: 20px; margin-top: 15px;">
                                              <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button></div>
                                    </div>
    </div>
        <br/>

         <?php
                                    }
                                    ?>

                </form>
    </div>
    </div>
    </div>
    </div>

     <?php
    date_default_timezone_set('America/El_Salvador');
    $d1 = date("d");
    $m1 = date("m");
    $y1 = date("Y");

        if (isset($_REQUEST['btnEnviar'])) {
        include_once '../Conexion/conexion.php';
         $diagnostico = $_REQUEST['diagnostico'];
     
            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_inventario,con_fecha_atiende,con_diagnostico) VALUES('$modi',1,'$y1-$m1-$d1','$diagnostico')");
           echo '<script>swal({
                        title: "Registro",
                        text: "Guardado!",
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
    <script>
    function soloLetras(e) {
        textoArea = document.getElementById("fnamep").value;
        var total = textoArea.length;
        if (total == 0) {
          key = e.keyCode || e.which;
          tecla = String.fromCharCode(key).toString();
          letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
          especiales = [8, 9, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

          tecla_especial = false
          for (var i in especiales) {
            if (key == especiales[i]) {
              tecla_especial = true;
              break;
            }
          }

          if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
            alert('No puedes comenzar escribiendo numeros');
          }
        }
      }
    </script>
    <script>
    function campos(){
      var validado = true;
      elementos = document.getElementsByClassName("form-control");
      for(i=0;i<elementos.length;i++){
        if(elementos[i].value == "" || elementos[i].value == null){
        validado = false
        }
      }
      if(validado){
      document.getElementById("su").disabled = false;
      
      }else{
         document.getElementById("su").disabled = true;  
      }
    }
    </script>
            <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
            <script>
                $(document).ready(function () {
                    $("#nombreCom").keyup(function () {

                        var value = $(this).val();
                        $cod = value.substr(0, 3).toUpperCase();
                        if (value != "") {
                            var numero = Math.floor(Math.random() * (999 - 100)) + 100;
                            $codigo = $cod + numero;
                            $("#fname").val($codigo);
                        } else {
                            $("#fname").val("");
                        }

                    });
                });
            </script>