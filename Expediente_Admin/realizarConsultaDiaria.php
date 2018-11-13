      <?php
      include_once '../plantilla/cabecera.php';
      include_once '../plantilla/menu.php';
      include_once '../plantilla/menu_lateral.php';
         $modi = $_GET['ir'];
          ?>
   <link href="../css/multiform.css" rel="stylesheet">
                    <div class="page-wrapper" style="height: 671px;">
                  <div class="container-fluid">
                  <div class="card" style="background: rgba(0, 101, 191,0.3)">
                  <div class="card-body wizard-content">
                           <h3 class="card-title" style="color: white" align="center">Consulta General</h3>
                           </br>
</br>
                          <form id="regForm" action="" method="post">

 <!-- <h3 class="card-title" style="color: white">Register:</h3> -->
                  <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
  <h5 class="card-title" style="color:white" >Datos Generales del Paciente</h5> 
   <div class="row">                              
                                    <div class="col-md-4">       
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
                                       
                                        <label style="color: white" >Paciente: <small class="text-muted"></small></label> <div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:black" type="text" name="nombre" id="fnamep" placeholder="Ingrese nombre" autocomplete="off" value="<?php echo $nom . " " . $ape; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
                                        </div> 
                                    </div>  
                                    <div class="col-md-2">
                                    
                                        <label style="color: white" >Edad: <small class="text-muted"></small></label><div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:black" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $edad." años"; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="6">  
                                        </div> 
                                    </div> 
                                    <div class="col-md-6">
                                    
                                        <label style="color: white" >Alergias: <small class="text-muted"></small></label><div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:black" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $alergias; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
                                        </div> 
                                    </div> 
                                </div>
                                 <?php
                                    }
                                    ?>
                                    </br>
</br>
  <!-- One "tab" for each step in the form: -->
   <div class="tab">
    <div class="row">
          <div class="col-md-5">
      
      <label style="color: white">Tipo de Consulta:<small class="text-muted"></small></label>
      <div class="input-group"><select class="custom-select" name="tipocon" style="width: 100%; height:36px;" " oninput="this.className = ''">
                                        <option>Seleccionar</option>
                                        <option value="Consulta General">Consulta general</option>
                                        <option value="Control de Embarazo">Control de embarazo</option>
                                    </select>
                                         </div> 
                                        </div>
                                              <div class="col-md-5">
      
      <label style="color: white">Fecha de Amenorrea:<small class="text-muted"></small></label><div class="input-group"><input type="date" oninput="this.className = ''" class="form-control" id="fnamep" placeholder="Kg" autocomplete="off" maxlength="6" name="fecha_ame" >       
                                                 <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                            </div> 
                                        </div>
                                      </div>

  </div>
    <div class="tab">
      <h5 class="card-title" style="color: white">Registro de Signos Vitales</h5>
      <div class="row">
      <div class="col-md-2">
      
      <label style="color: white">Peso:<small class="text-muted"></small></label><div class="input-group"><input type="text" oninput="this.className = ''" class="form-control" id="fnamep" placeholder="Kg" autocomplete="off" maxlength="6" name="peso" >       <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                </div>

                                            </div> 
                                        </div>                                
       <div class="col-md-2">
                                          
        <label style="color: white">Talla:  <small class="text-muted"></small></label><div class="input-group"><input oninput="this.className = ''" class="form-control" id="fnamep" placeholder="Cm" autocomplete="off" maxlength="6" name="talla">
        <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                                      <div class="col-md-2">
                                          
         <label style="color: white">Temperatura:  <small class="text-muted"></small></label><div class="input-group"><input oninput="this.className = ''" class="form-control" id="fnamep" placeholder="°C" autocomplete="off" maxlength="4" name="temp">
          <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                                       <div class="col-md-2">
                                          
          <label style="color: white">Pulso:  <small class="text-muted"></small></label><div class="input-group"><input oninput="this.className = ''" class="form-control" id="fnamep" placeholder="Lat/min" autocomplete="off" maxlength="3" name="pulso">
            <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                              
                                      <div class="col-md-3">
                                          
     <label style="color: white">Presión:  <small class="text-muted"></small></label><div class="input-group"><input oninput="this.className = ''" class="form-control" id="fnamep" placeholder="mm de Hg" autocomplete="off" maxlength="3" name="presion">
       <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                  </div>
    </div>

  <div class="tab"> <h5 class="card-title" style="color: white">Registro de Insumos</h5>

    <div class="row">
                                          <div class="col-md-2">
                                          <label style="color: white">Guantes:  <small class="text-muted"></small></label>
                                          <div class="input-group">
                                                <input type="number" min="1" class="form-control" id="lname" name="guantes" placeholder="1" value="" size="10" oninput="this.className = ''">
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                                </div> 
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <label style="color: white">Paletas:<small class="text-muted"></small></label>                          
                                        <div class="input-group">   
                                         <input type="number" min="1" class="form-control" id="lname" name="paletas" placeholder="1" value="" oninput="this.className = ''">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                       </div> 
                                    </div>
                         
                                    <div class="col-md-2">
                                         <label style="color: white">Torundas:<small class="text-muted"></small></label>
                                        <div class="input-group">      
                                         <input type="number" min="1" class="form-control" id="lname" name="torundas" placeholder="1" value="" oninput="this.className = ''">
                                               <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Papel:<small class="text-muted"></small></label>
                                        <div class="input-group">       
                                          <input type="number" min="1" class="form-control" id="lname" name="papel" placeholder="1" value="" oninput="this.className = ''">
                                               <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                            
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Isopo:<small class="text-muted"></small></label>
                                        <div class="input-group">      
                                          <input type="number" min="0" class="form-control" id="lname" name="isopo" placeholder="0" value="" oninput="this.className = ''">
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                                </div> 
                                    </div>
                                                                        <div class="col-md-2">
                                        
                                        <label style="color: white">Jeringas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="jeringas" placeholder="0" value="" oninput="this.className = ''">
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                               </div> 
                                    </div>
    </div>
  </div>

  <div class="tab"><h5 class="card-title" style="color: white">Enfermedades y Afecciones</h5>

                                        <div class="col-md-12">
                                        <label style="color: white">Síntomas y Diagnóstico: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="diagnostico" oninput="this.className = ''"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div> 
  </div>

  <div class="tab">
        <div class="row" align="center">
                                    <div class="col-md-12">
                                                 <div class="row mb-7" style="float: right; margin-right: 300px; margin-top: 15px;">
                                                  <button type="button" id="su" name="recetas" >Recetas</button>
                                                  </div>
                                            <div class="row mb-7" style="float: right;margin-right: 20px; margin-top: 15px;">
                                              <button type="button" id="su" name="examenes" >Examenes</button>
                                              </div>
                                               <div class="row mb-7" style="float: right;margin-right: 20px; margin-top: 15px;">
                                              <button type="button" id="su" name="referencias" >Referencias</button>
                                              </div>
                                    </div>
                                       </div>
  </div>
</br>
</br>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)" >Anterior</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
      <input type="submit" id="enviar" name="btnEnviar" onclick="nextPrev(1)" value="Guardar">
    </div>
  </div>

  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
     <span class="step"></span>
  </div>

  </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the crurrent tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("enviar").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";

    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").style.display = "none";
      document.getElementById("enviar").style.display = "inline";
    } 
    else {
      document.getElementById("nextBtn").style.display = "inline";
      document.getElementById("nextBtn").innerHTML = "Siguiente";
      document.getElementById("enviar").style.display = "none";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = true;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>
      <?php
        date_default_timezone_set('America/El_Salvador');
    $d1 = date("d");
    $m1 = date("m");
    $y1 = date("Y");

        if (isset($_REQUEST['btnEnviar'])) {
        include_once '../Conexion/conexion.php';
         $diagnostico = $_REQUEST['diagnostico'];
         $tipoconsul = $_REQUEST['tipocon'];
         $amenorrea = $_REQUEST['fecha_ame'];
     
            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_inventario,con_fecha_atiende,con_diagnostico,con_fecha_amenorrea,con_ctipo_consulta) VALUES('$modi',1,'$y1-$m1-$d1','$diagnostico','$amenorrea','$tipoconsul')");
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
     