      <?php
      include_once '../plantilla/cabecera.php';
      include_once '../plantilla/menu.php';
      include_once '../plantilla/menu_lateral.php';
         $modi = $_GET['ir'];
          ?>
   <link href="../css/multiform.css" rel="stylesheet">
                    <div class="page-wrapper" style="height: 671px;">
                        <div class="container-fluid" >
                  <div class="card" style="background: rgba(0,101,191,0.6)">
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
      <div class="input-group"><select class="custom-select" name="tipocon" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <option value="Consulta General">Consulta general</option>
                                        <option value="Control de Embarazo">Control de embarazo</option>
                                    </select>
                                         </div> 
                                        </div>
                                              <div class="col-md-5">
      
      <label style="color: white">Fecha de Amenorrea:<small class="text-muted"></small></label><div class="input-group"><input type="date" class="form-control" id="fnamep" placeholder="Kg" autocomplete="off" maxlength="6" name="fecha_ame" >       
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
                                          
        <label style="color: white">Talla:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Cm" autocomplete="off" maxlength="6" name="talla">
        <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                                              </div>
                                          </div> 
                                      </div>      
                                      <div class="col-md-2">
      
      <label style="color: white">Peso:<small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Lb" autocomplete="off" maxlength="6" name="peso" >       <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                </div>

                                            </div> 
                                        </div>                                

                                      <div class="col-md-2">
                                          
         <label style="color: white">Temperatura:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="°C" autocomplete="off" maxlength="5" name="temp">
          <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                                       
                              
                                      <div class="col-md-3">
                                          
     <label style="color: white">Presión:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="mm de Hg" autocomplete="off" maxlength="7" name="presion">
       <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                                      <div class="col-md-2">
                                          
          <label style="color: white">Pulso:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Lat/min" autocomplete="off" maxlength="3" name="pulso">
            <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                  </div>
    </div>

  <div class="tab"> <h5 class="card-title" style="color: white">Registro de Insumos</h5>

    <div class="row">
                                <!--Guantes-->
                                          <div class="col-md-2">
                                          <label style="color: white">Guantes:  <small class="text-muted"></small></label>
                                          <div class="input-group">
                                                <input type="number" min="0" class="form-control" id="lname" name="guantes" placeholder="0" value="" size="10" >
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                                </div> 
                                    </div>
                                   <!--BAJA LENGUA-->
                                    <div class="col-md-2">
                                        <label style="color: white">Baja Lengua:<small class="text-muted"></small></label>                          
                                        <div class="input-group">   
                                         <input type="number" min="0" class="form-control" id="lname" name="paletas" placeholder="0" value="" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                       </div> 
                                    </div>
                         <!--ALGODON-->
                                    <div class="col-md-2">
                                         <label style="color: white">Algodón:<small class="text-muted"></small></label>
                                        <div class="input-group">      
                                         <input type="number" min="0" class="form-control" id="lname" name="algodon" placeholder="0" value="" >
                                               <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <!--PAPEL-->

                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Papel de Cama:<small class="text-muted"></small></label>
                                        <div class="input-group">       
                                          <input type="number" min="0" class="form-control" id="lname" name="papel" placeholder="0" value="" >
                                               <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                            
                            <!--HISOPOS-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Hisopos:<small class="text-muted"></small></label>
                                        <div class="input-group">      
                                          <input type="number" min="0" class="form-control" id="lname" name="isopo" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                                </div> 
                                    </div>
                                      <!--JERINGAS-->
                                      <div class="col-md-2">
                                        
                                        <label style="color: white">Jeringas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="jeringas" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                               </div> 
                                    </div>

                                    <!--CURITAS-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Curitas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="curitas" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <!--Gasas-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Gasas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="gasas" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <!--Especulo-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Espéculo Vaginal:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="especulo" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <!--Mascarillas-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Mascarillas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="mascarillas" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <!--Agujas-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Agujas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="agujas" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <!--Papel Fotográfico-->
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Papel Fotográfico:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="fotografico" placeholder="0" value="" >
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
                                             <textarea class="form-control" rows="3" name="diagnostico"></textarea> 
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
         $talla = $_REQUEST['talla'];
         $peso = $_REQUEST['peso'];
         $temp = $_REQUEST['temp'];
         $presion = $_REQUEST['presion'];
         $pulso = $_REQUEST['pulso'];

         //insumos medicos a decrementar

         $guantes = $_REQUEST['guantes'];
         $paletas = $_REQUEST['paletas'];
         $algodon = $_REQUEST['algodon'];
         $papel = $_REQUEST['papel'];
         $isopo = $_REQUEST['isopo'];
         $jeringa = $_REQUEST['jeringas'];

         $curitas = $_REQUEST['curitas'];
         $gasas = $_REQUEST['gasas'];
         $especulo = $_REQUEST['especulo'];
         $mascarillas = $_REQUEST['mascarillas'];
         $agujas = $_REQUEST['agujas'];
         $fotografico = $_REQUEST['fotografico'];
         
         

          mysqli_query($conexion, "INSERT INTO t_enfermeria(enf_destatura,enf_dpeso,enf_dtempetarura,enf_cpresion,enf_cpulso) VALUES('$talla','$peso','$temp','$presion','$pulso')");
          $sacar = mysqli_query($conexion,"SELECT id_enfermeria FROM t_enfermeria ORDER by id_enfermeria DESC LIMIT 1");
                while ($fila = mysqli_fetch_array($sacar)) {
                      $enfermeria=$fila['id_enfermeria']; 
                    }
            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_enfermeria,con_fecha_atiende,con_diagnostico,con_fecha_amenorrea,con_ctipo_consulta) VALUES('$modi','$enfermeria','$y1-$m1-$d1','$diagnostico','$amenorrea','$tipoconsul')");

            

                Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();

///GUANTES
$validarguantes = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Guantes'");
   if (mysqli_num_rows($validarguantes)>0) {
     $sacar1 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Guantes'");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $guantes_dec=$fila1['decremento'];
                    }
                      $desc_guantes=$guantes_dec-$guantes; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_guantes' WHERE tipo='Guantes'");
  }
///BAJA LENGUA
   $validarpaletas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Baja Lengua'");
   if (mysqli_num_rows($validarpaletas)>0) {
     $sacar2 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Baja Lengua'");
                while ($fila2 = mysqli_fetch_array($sacar2)) {
                      $paletas_dec=$fila2['decremento'];
                    }
                      $desc_paletas=$paletas_dec-$paletas; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_paletas' WHERE tipo='Baja Lengua'");
  }
///ALGODON
  $validaralgodon = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Algodon'");
   if (mysqli_num_rows($validaralgodon)>0) {
 $sacar3 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Algodon'");
                while ($fila3 = mysqli_fetch_array($sacar3)) {
                      $algodon_dec=$fila3['decremento'];
                    }
                      $desc_algodon=$algodon_dec-$algodon; 
   mysqli_query($conexion, "UPDATE inventario_unidades SET decremento='$desc_algodon' WHERE tipo='Algodon'");
  
}
///PAPEL DE CAMA
   $validarpapel = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel'");
   if (mysqli_num_rows($validarpapel)>0) {
     $sacar4 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel'");
                while ($fila4 = mysqli_fetch_array($sacar4)) {
                      $papel_dec=$fila4['decremento'];
                    }
                      $desc_papel=$papel_dec-$papel; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_papel' WHERE tipo='Papel'");
  }
///HISOPOS
   $validarisopo = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Hisopos'");
   if (mysqli_num_rows($validarisopo)>0) {
    $sacar5 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Hisopos'");
                while ($fila5 = mysqli_fetch_array($sacar5)) {
                      $isopo_dec=$fila5['decremento'];
                    }
                      $desc_isopo=$isopo_dec-$isopo; 
   mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_isopo' WHERE tipo='Hisopos'");
  }

///JERINGAS
  $validarjeringas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Jeringa'");
   if (mysqli_num_rows($validarjeringas)>0) {
    $sacar6 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Jeringa'");
                while ($fila6 = mysqli_fetch_array($sacar6)) {
                      $jeringa_dec=$fila6['decremento'];
                    }
                      $desc_jeringa=$jeringa_dec-$jeringa; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_jeringa' WHERE tipo='Jeringa'");
}

///CURITAS
  $validarcuritas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Curitas'");
   if (mysqli_num_rows($validarcuritas)>0) {
    $sacar7 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Curitas'");
                while ($fila7 = mysqli_fetch_array($sacar7)) {
                      $curitas_dec=$fila7['decremento'];
                    }
                      $desc_curitas=$curitas_dec-$curitas; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_curitas' WHERE tipo='Curitas'");
}

///GASAS
  $validargasas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Gasa'");
   if (mysqli_num_rows($validargasas)>0) {
    $sacar8 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Gasa'");
                while ($fila8 = mysqli_fetch_array($sacar8)) {
                      $gasas_dec=$fila8['decremento'];
                    }
                      $desc_gasas=$gasas_dec-$gasas; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_gasas' WHERE tipo='Gasa'");
}

///ESPECULO
  $validarespeculo = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Especulo'");
   if (mysqli_num_rows($validarespeculo)>0) {
    $sacar9 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Especulo'");
                while ($fila9 = mysqli_fetch_array($sacar9)) {
                      $especulo_dec=$fila9['decremento'];
                    }
                      $desc_especulo=$especulo_dec-$especulo; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_especulo' WHERE tipo='Especulo'");
}

///MASCARILLAS
  $validarmascarilla = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Mascarilla'");
   if (mysqli_num_rows($validarmascarilla)>0) {
    $sacar10 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Mascarilla'");
                while ($fila10 = mysqli_fetch_array($sacar10)) {
                      $mascarilla_dec=$fila10['decremento'];
                    }
                      $desc_mascarilla=$mascarilla_dec-$mascarillas; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_mascarilla' WHERE tipo='Mascarilla'");
}

///AGUJAS
  $validaraguja = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Aguja'");
   if (mysqli_num_rows($validaraguja)>0) {
    $sacar11 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Aguja'");
                while ($fila11 = mysqli_fetch_array($sacar11)) {
                      $aguja_dec=$fila11['decremento'];
                    }
                      $desc_aguja=$aguja_dec-$agujas; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_aguja' WHERE tipo='Aguja'");
}

///PAPEL FOTOGRAFICO
  $validarfotografico = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel Fotografico'");
   if (mysqli_num_rows($validarfotografico)>0) {
    $sacar12 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel Fotografico'");
                while ($fila12 = mysqli_fetch_array($sacar12)) {
                      $fotografico_dec=$fila12['decremento'];
                    }
                      $desc_fotografico=$fotografico_dec-$fotografico; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_fotografico' WHERE tipo='Papel Fotografico'");
}
  
  
mysqli_query($conexion,"UPDATE t_llegada SET estado=0 WHERE fk_expediente='$modi'");

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
     