      <?php
      include_once '../plantilla/cabecera.php';
      include_once '../plantilla/menu.php';
      include_once '../plantilla/menu_lateral.php';
         $modi = $_GET['ir'];
          ?>
          <script src="http://momentjs.com/downloads/moment.min.js"></script>
 <script type="text/javascript">
    /**
     * Funcion que devuelve true o false dependiendo de si la fecha es correcta.
     * Tiene que recibir el dia, mes y año
     */
    function isValidDate(day, month, year)
    {
        var dteDate;
        month = month - 1;
        dteDate = new Date(year, month, day);


        return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
    }


    function validate_fecha(fecha)
    {
        var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");

        if (fecha.search(patron) == 0)
        {
            var values = fecha.split("-");
            if (isValidDate(values[2], values[1], values[0]))
            {
                return true;
            }
        }
        return false;
    }


    function calcularEdad()
    {
        var fecha = document.getElementById("user_date").value;
        if (validate_fecha(fecha) == true)
        {
            // Si la fecha es correcta, calculamos la edad
            var values = fecha.split("-");
            var dia = values[2];
            var mes = values[1];
            var ano = values[0];
            var fecha_anterior = ano.concat("-"+mes).concat("-"+dia);

            // cogemos los valores actuales
            var fecha_hoy = new Date();
            var ahora_ano = fecha_hoy.getFullYear();
            var ahora_mes = fecha_hoy.getMonth() + 1;
            var ahora_dia = fecha_hoy.getDate();
            var fecha_ahora = ahora_ano+"-"+ahora_mes+"-"+ahora_dia;
            // realizamos el calculo
          /*  var edad = (ahora_ano + 1900) - ano;
            if (ahora_mes < mes)
            {
                edad--;
            }
            if ((mes == ahora_mes) && (ahora_dia < dia))
            {
                edad--;
            }
            if (edad > 1900)
            {
                edad -= 1900;
            }

            // calculamos los meses
            var meses = 0;
            if (ahora_mes > mes)
                meses = ahora_mes - mes;
            if (ahora_mes < mes)
                meses = 12 - (mes - ahora_mes);
            if (ahora_mes == mes && dia > ahora_dia)
                meses = 11;

            // calculamos los dias
            var dias = 0;
            if (ahora_dia > dia)
                dias = ahora_dia - dia;
            if (ahora_dia < dia)
            {
                ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
                dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
            }
            //document.f1.inp.disabled=true;*/
                        var fecha1 = moment(fecha_anterior);
var fecha2 = moment(fecha_ahora);



var fechas=(fecha2.diff(fecha1, 'week'));

            document.regForm.fech_ame.value = fechas;

            if (edad <= 17) {
                document.f1.dui.disabled = true;
                document.f1.tel.disabled = true;
            } else {
                document.f1.dui.disabled = false;
                document.f1.tel.disabled = false;
            }

            document.getElementById("result").innerHTML = "Tienes " + edad + " años, " + meses + " meses y " + dias + " días";
        } else {

            document.getElementById("result").innerHTML = "La fecha " + fecha + " es incorrecta";
        }
    }
</script>
   <link href="../css/multiform.css" rel="stylesheet">
                    <div class="page-wrapper" style="height: 971px;">
                        <div class="container-fluid" >
                  <div class="card" style="background: rgba(0,101,191,0.6)">
                  <div class="card-body wizard-content">
                           <h3 class="card-title" style="color: white" align="center">Control Prenatal</h3>
                           </br>
</br>
                          <form id="regForm" name="regForm" action="" method="post">

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



//echo floor($sem).'  Semanas';
                                            ?>                             
                                       
                                        <label style="color: white" >Paciente: <small class="text-muted"></small></label> <div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" placeholder="Ingrese nombre" autocomplete="off" value="<?php echo $nom . " " . $ape; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
                                        </div> 
                                    </div>  
                                    <div class="col-md-2">
                                    
                                        <label style="color: white" >Edad: <small class="text-muted"></small></label><div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $edad." Años"; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="6">  
                                        </div> 
                                    </div> 
                                    <div class="col-md-6">
                                    
                                        <label style="color: white" >Alergias: <small class="text-muted"></small></label><div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="nombre" id="fnamep" autocomplete="off" value="<?php echo $alergias; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
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
          <div class="col-md-5" style="align: center">
      
 
      <label style="color: white">Fecha de Amenorrea:<small class="text-muted"></small></label><div class="input-group">
      	 <input type="date" name="user_date" class="form-control" id="user_date" max="2018-12-22" min="1947-01-02" onChange="javascript:calcularEdad();">    
                                                 <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                            </div> 
                                        </div>

                                          <div class="col-md-6">
                                    
                                        <label style="color: white" >Edad Gestacional: <small class="text-muted"></small></label><div>
                                          <input name="fech_ame" id="fech_ame" class="form-control" onChange="javascript:desabilitar();">      
                                        </div> 
                                    </div>
                                      </div>

  </div>
   <div class="tab"><h5 class="card-title" style="color: white">Antecedentes</h5>
  	<div class="row">                  
                      <div class="col-md-12">
                                        <label style="color: white">Familiares: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="diagnostico"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row">                  
                      <div class="col-md-12">
                                        <label style="color: white">Personales: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="diagnostico"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                  	<div class="row">                  
                      <div class="col-md-12">
                                        <label style="color: white">Obstétricos: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="diagnostico"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
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
                                          
     <label style="color: white">Presión Arterial:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Mm de Hg" autocomplete="off" maxlength="7" name="presion">
       <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                                      <div class="col-md-2">
                                          
          <label style="color: white">Pulso:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Lat/Min" autocomplete="off" maxlength="3" name="pulso">
            <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                  </div>
                  <div class="row">
       <div class="col-md-2">
                                          
        <label style="color: white">Altura Uterina:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Cm" autocomplete="off" maxlength="6" name="talla">
        <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                                              </div>
                                          </div> 
                                      </div>      
                                      <div class="col-md-2">
      
      <label style="color: white">Frec. Cardiaca Fetal:<small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="LPM" autocomplete="off" maxlength="6" name="peso" >       <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                </div>

                                            </div> 
                                        </div>                                

                                      <div class="col-md-2">
                                          
         <label style="color: white">Movimientos Fetales:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="" autocomplete="off" maxlength="5" name="temp">
          <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-thermometer-half"></i></span>
                                              </div>
                                          </div> 
                                      </div>
                                  </div>
    </div>

 
   <div class="tab"><h5 class="card-title" style="color: white">Enfermedades y Afecciones</h5>
                       <div class="row">                  
                      <div class="col-md-12">
                                        <label style="color: white">Resultado de Exámenes: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="diagnostico"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                                 <div class="row">                  
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
  </div>

  <div class="tab"> <h5 class="card-title" style="color: white">Registro de Insumos</h5>

    <div class="row">
                                          <div class="col-md-2">
                                          <label style="color: white">Guantes:  <small class="text-muted"></small></label>
                                          <div class="input-group">
                                                <input type="number" min="0" class="form-control" id="lname" name="guantes" placeholder="0" value="" size="10" >
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                                </div> 
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <label style="color: white">Paletas:<small class="text-muted"></small></label>                          
                                        <div class="input-group">   
                                         <input type="number" min="0" class="form-control" id="lname" name="paletas" placeholder="0" value="" >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                       </div> 
                                    </div>
                         
                                    <div class="col-md-2">
                                         <label style="color: white">Algodón:<small class="text-muted"></small></label>
                                        <div class="input-group">      
                                         <input type="number" min="0" class="form-control" id="lname" name="algodon" placeholder="0" value="" >
                                               <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Papel:<small class="text-muted"></small></label>
                                        <div class="input-group">       
                                          <input type="number" min="0" class="form-control" id="lname" name="papel" placeholder="0" value="" >
                                               <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                            
                                    <div class="col-md-2">
                                        
                                        <label style="color: white">Isopo:<small class="text-muted"></small></label>
                                        <div class="input-group">      
                                          <input type="number" min="0" class="form-control" id="lname" name="isopo" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
                                                                                </div> 
                                    </div>
                                                                        <div class="col-md-2">
                                        
                                        <label style="color: white">Jeringas:<small class="text-muted"></small></label>
                                         <div class="input-group">     
                                          <input type="number" min="0" class="form-control" id="lname" name="jeringas" placeholder="0" value="" >
                                              <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                            </div>
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

         $guantes = $_REQUEST['guantes'];
         $paletas = $_REQUEST['paletas'];
         $algodon = $_REQUEST['algodon'];
         $papel = $_REQUEST['papel'];
         $isopo = $_REQUEST['isopo'];
         $jeringa = $_REQUEST['jeringas'];
         
         

          mysqli_query($conexion, "INSERT INTO t_enfermeria(enf_destatura,enf_dpeso,enf_dtempetarura,enf_cpresion,enf_cpulso) VALUES('$talla','$peso','$temp','$presion','$pulso')");
          $sacar = mysqli_query($conexion,"SELECT id_enfermeria FROM t_enfermeria ORDER by id_enfermeria DESC LIMIT 1");
                while ($fila = mysqli_fetch_array($sacar)) {
                      $enfermeria=$fila['id_enfermeria']; 
                    }
            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_enfermeria,con_fecha_atiende,con_diagnostico,con_fecha_amenorrea,con_ctipo_consulta) VALUES('$modi','$enfermeria','$y1-$m1-$d1','$diagnostico','$amenorrea','$tipoconsul')");

            

                Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();

$validarguantes = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Guantes'");
   if (mysqli_num_rows($validarguantes)>0) {
     $sacar1 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Guantes'");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $guantes_dec=$fila1['decremento'];
                    }
                      $desc_guantes=$guantes_dec-$guantes; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_guantes' WHERE tipo='Guantes'");
  }
//////////////////
   $validarpaletas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Paletas'");
   if (mysqli_num_rows($validarpaletas)>0) {
     $sacar2 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Paletas'");
                while ($fila2 = mysqli_fetch_array($sacar2)) {
                      $paletas_dec=$fila2['decremento'];
                    }
                      $desc_paletas=$paletas_dec-$paletas; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_paletas' WHERE tipo='Paletas'");
  }
///////////////*/
  $validaralgodon = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Algodon'");
   if (mysqli_num_rows($validaralgodon)>0) {
 $sacar3 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Algodon'");
                while ($fila3 = mysqli_fetch_array($sacar3)) {
                      $algodon_dec=$fila3['decremento'];
                    }
                      $desc_algodon=$algodon_dec-$algodon; 
   mysqli_query($conexion, "UPDATE inventario_unidades SET decremento='$desc_algodon' WHERE tipo='Algodon'");
  
}
/////////////
   $validarpapel = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel'");
   if (mysqli_num_rows($validarpapel)>0) {
     $sacar4 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel'");
                while ($fila4 = mysqli_fetch_array($sacar4)) {
                      $papel_dec=$fila4['decremento'];
                    }
                      $desc_papel=$papel_dec-$papel; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_papel' WHERE tipo='Papel'");
  }

   $validarisopo = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Isopos'");
   if (mysqli_num_rows($validarisopo)>0) {
    $sacar5 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Isopos'");
                while ($fila5 = mysqli_fetch_array($sacar5)) {
                      $isopo_dec=$fila5['decremento'];
                    }
                      $desc_isopo=$isopo_dec-$isopo; 
   mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_isopo' WHERE tipo='Isopos'");
  }

  $validarjeringas = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Jeringa'");
   if (mysqli_num_rows($validarjeringas)>0) {
    $sacar6 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Jeringa'");
                while ($fila6 = mysqli_fetch_array($sacar6)) {
                      $jeringa_dec=$fila6['decremento'];
                    }
                      $desc_jeringa=$jeringa_dec-$jeringa; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_jeringa' WHERE tipo='Jeringa'");
}
  
  
mysqli_query($conexion,"UPDATE t_llegada SET estado=2 WHERE fk_expediente='$modi'");

                       echo '<script>swal({
                        title: "Registro",
                        text: "Guardado!",
                        type: "success",
                        confirmButtonText: "Aceptar",
                        closeOnConfirm: false
                    },
                    function () {
                        location.href="../Expediente_Admin/cont_consulta.php";
                        
                    });</script>';
            

            } 
           include_once '../plantilla/pie.php';

      ?>
         