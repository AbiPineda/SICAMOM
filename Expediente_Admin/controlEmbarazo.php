      <?php
      include_once '../plantilla/cabecera.php';
      include_once '../plantilla/menu.php';
      include_once '../plantilla/menu_lateral.php';
         $modi = $_GET['ir'];
          ?>
          <script src="http://momentjs.com/downloads/moment.min.js"></script>
          <link href="../css/check.css" rel="stylesheet">
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
        var fecha = document.getElementById("fecha_amenorrea").value;
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
                                     <div class="col-md-1">
                                     </div> 
                                    <div class="col-md-2">
                                    <label style="color: white" >Edad: <small class="text-muted"></small></label><div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="edad" id="fnamep" autocomplete="off" value="<?php echo $edad." Años"; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="6">  
                                        </div> 
                                    </div> 
                                    <div class="col-md-1">
                                     </div> 
                                    <div class="col-md-4">
                                        <label style="color: white" >Alergias: <small class="text-muted"></small></label><div>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="alergias" id="fnamep" autocomplete="off" value="<?php echo $alergias; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
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
      <label style="color: white">Fecha de Amenorrea:<small class="text-muted"></small></label>
      <div class="input-group">
        <?php 
        //      
        include_once '../Conexion/conexion.php';
        
        //**********************modificar estado a las 40 semanas ****
        $estado=mysqli_query($conexion,"SELECT*FROM t_consulta WHERE fk_expediente='$modificar' AND estado='embarazo'");
        if (mysqli_num_rows($estado)>0) { 
           $Mostrar=mysqli_query($conexion,"SELECT*FROM t_consulta WHERE fk_expediente='$modificar' AND estado='embarazo'");
           while ($x=mysqli_fetch_array($Mostrar)) {
             # code...
            $fecha=$x['con_fecha_amenorrea'];
           }

           $x=explode("-",$fecha);
           $anos=$x[0];
           $mes=$x[1];
           $dia=$x[2];

           $actual=date('Y-m-d');

           $x1=explode("-",$actual);
           $anosx=$x1[0];
           $mesx=$x1[1];
           $diax=$x1[2];

           $datetime1 = new DateTime($fecha);
            $datetime2 = new DateTime($actual);
            $interval = $datetime1->diff($datetime2);
//            echo floor(($interval->format('%a') / 7)) . ' semanas con '
//                 . ($interval->format('%a') % 7) . ' días';
            $semanasVal=floor(($interval->format('%a') / 7));
            
            if ($semanasVal>=40) {
                mysqli_query($conexion,"UPDATE t_consulta SET estado = 'finalizado' WHERE fk_expediente ='$modificar'");
            }
        
        }
        
        //***********************
        $noMostrar=mysqli_query($conexion,"SELECT*FROM t_consulta WHERE fk_expediente='$modificar' AND estado='embarazo'");
        if (mysqli_num_rows($noMostrar)>0) { 
           $Mostrar=mysqli_query($conexion,"SELECT*FROM t_consulta WHERE fk_expediente='$modificar' AND estado='embarazo'");
           while ($x=mysqli_fetch_array($Mostrar)) {
             # code...
            $fecha=$x['con_fecha_amenorrea'];
           }

           $x=explode("-",$fecha);
           $anos=$x[0];
           $mes=$x[1];
           $dia=$x[2];

           $actual=date('Y-m-d');

           $x1=explode("-",$actual);
           $anosx=$x1[0];
           $mesx=$x1[1];
           $diax=$x1[2];

           $datetime1 = new DateTime($fecha);
            $datetime2 = new DateTime($actual);
            $interval = $datetime1->diff($datetime2);
          


          ?>

           <input type="date" name="fecha_amenorrea" value="<?php echo $fecha; ?>" class="form-control" id="fecha_amenorrea" max="2018-12-22" min="1947-01-02" onChange="javascript:calcularEdad();" disabled>                                  <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                            </div> 
                                        </div>
<div class="col-md-2"> 
</div>
                                          <div class="col-md-5">                             
                                        <label style="color: white" >Edad Gestacional (Semanas): <small class="text-muted"></small></label>
                                        <div class="input-group">
                                          <input name="fech_ame" value="<?php   echo $semanasVal; ?>" id="fech_ameno" class="form-control" disabled >    
                                           <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        </div> 
                                    </div>




       <?php }else{ ?>
      <input type="date" name="fecha_amenorrea" class="form-control" id="fecha_amenorrea" max="2018-12-22" min="1947-01-02" onChange="javascript:calcularEdad();">                                  <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                            </div> 
                                        </div>
<div class="col-md-2"> 
</div>
                                          <div class="col-md-5">                             
                                        <label style="color: white" >Edad Gestacional (Semanas): <small class="text-muted"></small></label>
                                        <div class="input-group">
                                          <input name="fech_ame" id="fech_ame" class="form-control" onChange="javascript:desabilitar();">    
                                           <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        </div> 
                                    </div>
<?php } ?>
                                      </div>  
          </div>
<div class="tab"><h4 class="card-title" style="color: white">ANTECEDENTES</h4>
          <?php 
       
         $val =mysqli_query($conexion,"SELECT*FROM t_consulta INNER JOIN t_prenatal ON t_consulta.idconsulta=t_prenatal.fk_consulta
INNER JOIN t_familiar ON t_prenatal.idprenatal=t_familiar.fk_idprenatal
WHERE t_consulta.fk_expediente='$modificar' AND t_consulta.estado='embarazo'");
                if (mysqli_num_rows($val)>0) {
  
          ?>
aqui ponga una imagen
          <?php }else{?>
   
  	<div class="row">      
    <div class="col-md-4">                 
<h5 class="card-title" style="color:white">FAMILIARES</h5>
  <label class="container1" >TBC
  <input type="checkbox" name="familiares[]" value="TBC">
   <span class="checkmark"></span>
</label>
<label class="container1">Diabetes
  <input type="checkbox" name="familiares[]" value="Diabetes">
  <span class="checkmark"></span>
</label>
<label class="container1">Hipertensión 
  <input type="checkbox" name="familiares[]" value="Hipertension">
  <span class="checkmark"></span>
</label>
<label class="container1">Preeclampsia 
  <input type="checkbox" name="familiares[]" value="Preeclampsia">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Eclampsia
  <input type="checkbox" name="familiares[]" value="Eclampsia">
   <span class="checkmark"></span>
</label>
</div>
<div class="col-md-1"> 
	</div>
 <div class="col-md-7">  
 <div class="row">               
<h5 class="card-title" style="color:white; align:center">PERSONALES</h5>
</div>
<div class="row">
<div class="col-md-6">  
  <label class="container1" >TBC
  <input type="checkbox" name="personales[]" value="TBC">
   <span class="checkmark"></span>
</label>
<label class="container1">Diabetes
  <input type="checkbox" name="personales[]" value="Diabetes">
  <span class="checkmark"></span>
</label>
<label class="container1">Hipertensión 
  <input type="checkbox" name="personales[]" value="Hipertension">
  <span class="checkmark"></span>
</label>
<label class="container1">Preeclampsia 
  <input type="checkbox" name="personales[]" value="Preeclampsia">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Eclampsia
  <input type="checkbox" name="personales[]" value="Eclampsia">
   <span class="checkmark"></span>
</label>
</div>
<div class="col-md-6">                 
  <label class="container1" >Cirugia Genito-Urinaria 
  <input type="checkbox" name="personales[]" value="Cirugia Genito-Uninaria">
   <span class="checkmark"></span>
</label>
<label class="container1">Infertibilidad 
  <input type="checkbox" name="personales[]" value="Infertibilidad">
  <span class="checkmark"></span>
</label>
<label class="container1">Cardiopatia 
  <input type="checkbox" name="personales[]" value="Cardiopatia">
  <span class="checkmark"></span>
</label>
<label class="container1">Nefropatía 
  <input type="checkbox" name="personales[]" value="Nefropatia">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Violencia 
  <input type="checkbox" name="personales[]" value="Violencia">
   <span class="checkmark"></span>
</label>
 <label class="container1" >VIH+ 
  <input type="checkbox" name="personales[]" value="VIH+">
   <span class="checkmark"></span>
</label>
</div>
</div>
</div>
</div>
<div class="row"> 
                <div class="col-md-4">
                                        <label style="color: white">Otra condición médica grave: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="otra_familiares"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div> 
                                  <div class="col-md-1">
                                  </div>
                                <div class="col-md-5">
                                        <label style="color: white">Otra condición médica grave: <small class="text-muted"></small></label>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="otra_personales"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
                                    </div> 
</div>
<?php }?>
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
                                          
        <label style="color: white">Altura Uterina:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="Cm" autocomplete="off" maxlength="6" name="altura">
        <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                                              </div>
                                          </div> 
                                      </div>      
                                      <div class="col-md-2">
      
      <label style="color: white">Frec. Cardiaca Fetal:<small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="LPM" autocomplete="off" maxlength="6" name="frecuencia" >       <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                </div>

                                            </div> 
                                        </div>                                

                                      <div class="col-md-2">
                                          
         <label style="color: white">Movimientos Fetales:  <small class="text-muted"></small></label><div class="input-group"><input type="text" class="form-control" id="fnamep" placeholder="" autocomplete="off" maxlength="5" name="movimientos">
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
                                             <textarea class="form-control" rows="3" name="examenes"></textarea> 
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
        $otra_familiares = $_REQUEST['otra_familiares'];
         $otra_personales = $_REQUEST['otra_personales'];
           $obstetricos = $_REQUEST['obstetricos'];
           $resul_examenes = $_REQUEST['examenes'];
            $diagnostico = $_REQUEST['diagnostico'];
       //  $tipoconsul = $_REQUEST['tipocon'];
         $amenorrea = $_REQUEST['fecha_amenorrea'];
         $talla = $_REQUEST['talla'];
         $peso = $_REQUEST['peso'];
         $temp = $_REQUEST['temp'];
         $presion = $_REQUEST['presion'];
         $pulso = $_REQUEST['pulso'];

         $altura = $_REQUEST['altura'];
         $frecuencia = $_REQUEST['frecuencia'];
         $movimientos = $_REQUEST['movimientos'];

         $guantes = $_REQUEST['guantes'];
         $paletas = $_REQUEST['paletas'];
         $algodon = $_REQUEST['algodon'];
         $papel = $_REQUEST['papel'];
         $isopo = $_REQUEST['isopo'];
         $jeringa = $_REQUEST['jeringas'];
         
         
$familiares = implode(',', $_POST['familiares']);
$personales = implode(',', $_POST['personales']);
//'" . $hematologia . "'

          mysqli_query($conexion, "INSERT INTO t_enfermeria(enf_destatura,enf_dpeso,enf_dtempetarura,enf_cpresion,enf_cpulso) VALUES('$talla','$peso','$temp','$presion','$pulso')");
          $sacar = mysqli_query($conexion,"SELECT id_enfermeria FROM t_enfermeria ORDER by id_enfermeria DESC LIMIT 1");
                while ($fila = mysqli_fetch_array($sacar)) {
                      $enfermeria=$fila['id_enfermeria']; 
                    }

                     mysqli_query($conexion, "INSERT INTO t_enfermeria_fetal(fet_dfcf,fet_cactividad_fetal,fet_daltura_uterina) VALUES('$frecuencia','$movimientos','$altura')");
          $sacar1 = mysqli_query($conexion,"SELECT id_enfermeria_fetal FROM t_enfermeria_fetal ORDER by id_enfermeria_fetal DESC LIMIT 1");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $enfermeria_fetal = $fila1['id_enfermeria_fetal']; 
                    }
                    
///**************************consulta
        $noMostrar=mysqli_query($conexion,"SELECT*FROM t_consulta WHERE fk_expediente='$modificar' AND estado='embarazo'");
        if (mysqli_num_rows($noMostrar)>0){
 mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_enfermeria,con_fecha_atiende,con_diagnostico,con_fecha_amenorrea,con_ctipo_consulta,con_resul_examen,enfermeria_fetal,estado) VALUES('$modi','$enfermeria','$y1-$m1-$d1','$diagnostico','$fecha','Control Prenatal','$resul_examenes','$enfermeria_fetal','embarazo')");

         }else{         

            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_enfermeria,con_fecha_atiende,con_diagnostico,con_fecha_amenorrea,con_ctipo_consulta,con_resul_examen,enfermeria_fetal,estado) VALUES('$modi','$enfermeria','$y1-$m1-$d1','$diagnostico','$amenorrea','Control Prenatal','$resul_examenes','$enfermeria_fetal','embarazo')");
		   }

       $sacar4 = mysqli_query($conexion,"SELECT idconsulta FROM t_consulta ORDER by idconsulta DESC LIMIT 1");
                while ($fila4 = mysqli_fetch_array($sacar4)) {
                      $consulta = $fila4['idconsulta']; 
                    }
  ///**************************consulta*****************
///**************prenatal*********************
mysqli_query($conexion, "INSERT INTO t_prenatal(fk_consulta,pre_ccirugias_previas,pre_ffecha_parto,pre_ctipo_riesgo)
                                          VALUES('$consulta','si','2018-12-20','Control Prenatal')");
$sacarPrenatal = mysqli_query($conexion,"SELECT idprenatal FROM t_prenatal ORDER by idprenatal DESC LIMIT 1");
                while ($fila4 = mysqli_fetch_array($sacarPrenatal)) {
                      $prena = $fila4['idprenatal']; 
                    }

////***************fin prenatal
//0000000========
     $existe= mysqli_query($conexion,"SELECT*FROM t_familiar WHERE fk_idprenatal='$prena'");
     if (mysqli_num_rows($existe)>0) {

     }else{
      mysqli_query($conexion, "INSERT INTO t_familiar(familiar,condGrave,fk_idprenatal) VALUES('" . $familiares . "','$otra_familiares','$prena')");

        mysqli_query($conexion, "INSERT INTO t_personales(personal,condGrave,fk_idprenatal) VALUES('" . $personales . "','$otra_personales','$prena')");

     }
//*******************sacar familiar-*****************                     
          $sacar2 = mysqli_query($conexion,"SELECT idfamiliar FROM t_familiar ORDER by idfamiliar DESC LIMIT 1");
                while ($fila2 = mysqli_fetch_array($sacar2)) {
                      $familiar_id = $fila2['idfamiliar']; 
                    }


          $sacar3 = mysqli_query($conexion,"SELECT idpersonal FROM t_personales ORDER by idpersonal DESC LIMIT 1");
                while ($fila3 = mysqli_fetch_array($sacar3)) {
                      $personal_id = $fila3['idpersonal']; 
                    }
  //********************sacar familiar................
  

            

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
  
  
mysqli_query($conexion,"UPDATE t_llegada SET estado=2 WHERE fk_expediente='$modi' AND lleg_ffecha_atiende='$y1-$m1-$d1'");

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
         