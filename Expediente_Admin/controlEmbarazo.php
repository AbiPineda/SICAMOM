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
var fecha_probable = new Date($('#fecha_amenorrea').val());
var dias = 281; // Número de días a agregar
fecha_probable.setDate(fecha_probable.getDate() + dias);
            
            var $fecha_probable3 = fecha_probable.getFullYear()+ '-' +(fecha_probable.getMonth() + 1)+ '-' + fecha_probable.getDate();
            var $fecha_probable2 = fecha_probable.getDate()+ '/' +(fecha_probable.getMonth() + 1)+ '/' +fecha_probable.getFullYear() ;
//document.regForm.fech_parto.value = fecha_probable2;
 $("#fech_parto1").val($fecha_probable2);
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

<script type="text/javascript">
function mostrar(id) {
   if (id == "ninguna") {
        $("#embarazo_ectopico").hide();
        $("#aborto").hide();
        $("#parto").hide();
            }
    if (id == "embarazo_ectopico") {
        $("#embarazo_ectopico").show();
            }
    if (id == "aborto") {
               $("#aborto").show();
            }
    if (id == "parto") {
               $("#parto").show();
               $("#vivos").show();
               $("#muertos").show();
               $("#fecha_parto_anterior").show();
               $("#vaginales").show();
               $("#cesareas").show();
            }
              if (id == "Si") {
               $("#si_planeado").show();
            }
            if (id == "no_planeado") {
               $("#si_planeado").hide();
            }
             if (id == "si_cirugia") {
               $("#cirugia").show();
            }
             if (id == "recetas") {
               $("#recetas").show();
            }
               if (id == "referencias") {
               $("#referencias").show();
            }
               if (id == "constancias") {
               $("#constancias").show();
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
          <div class="col-md-3" style="align: center">
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
          
//$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+40 week' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'j/m/Y' , $nuevafecha );
          ?>

           <input type="date" name="fecha_amenorrea" value="<?php echo $fecha; ?>" class="form-control" id="fecha_amenorrea" min="1947-01-02" onChange="javascript:calcularEdad();" disabled max="<?php $actual; ?>">                                  <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                            </div> 
                                        </div>
<div class="col-md-1"> 
</div>
                                          <div class="col-md-3">                             
                                        <label style="color: white" >Edad Gestacional (Semanas): <small class="text-muted"></small></label>
                                        <div class="input-group">
                                          <input name="fech_ame" value="<?php   echo $semanasVal; ?>" id="fech_ameno" class="form-control" disabled >    
                                           <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        </div> 
                                    </div>
<div class="col-md-1"> 
</div>
                                          <div class="col-md-3">                             
                                        <label style="color: white" >Fecha Probable del Parto:<small class="text-muted"></small></label>
                                        <div class="input-group">
                                          <input name="fech_parto" id="fech_parto" value="<?php   echo $nuevafecha; ?>" class="form-control" disabled >    
                                           <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        </div> 
                                    </div>



       <?php }else{
        date_default_timezone_set('America/El_Salvador');
    $d1 = date("d");
    $m1 = date("m");
    $y1 = date("Y");
$f_actual=date('Y-m-d');
$fecha_min = strtotime ( '-38 weeks' , strtotime ( $f_actual ) ) ;
$fecha_min = date ( 'Y-m-j' , $fecha_min );
        ?>
      <input type="date" name="fecha_amenorrea" class="form-control" id="fecha_amenorrea" onChange="javascript:calcularEdad();" max="<?php echo $f_actual; ?>" min="<?php echo $fecha_min; ?>">                                  <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                            </div> 
                                        </div>
<div class="col-md-1"> 
</div>
                                          <div class="col-md-3">                             
                                        <label style="color: white" >Edad Gestacional (Semanas): <small class="text-muted"></small></label>
                                        <div class="input-group">
                                          <input name="fech_ame" id="fech_ame"  class="form-control" onChange="javascript:desabilitar();">    
                                           <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        </div> 
                                    </div>
<div class="col-md-1"> 
</div>

                                          <div class="col-md-3">                             
                                        <label style="color: white" >Fecha Probable del Parto:<small class="text-muted"></small></label>
                                        <div class="input-group">
                                          <input type="text" name="fech_parto"  id="fech_parto1" class="form-control" onChange="javascript:desabilitar();">    
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
 
$sacar_con=mysqli_query($conexion,"SELECT*FROM t_consulta WHERE fk_expediente='$modi' AND estado='embarazo'");
 while ($fila3 = mysqli_fetch_array($sacar_con)) {
                      $consul_id = $fila3['idconsulta'];
                        $sacar_pre=mysqli_query($conexion,"SELECT*FROM t_prenatal, t_familiar WHERE fk_consulta='$consul_id'");
 while ($fila4 = mysqli_fetch_array($sacar_pre)) {
                      $pre_id = $fila4['idprenatal'];
                      $cirugias = $fila4['pre_ccirugias_previas'];

   $sacar_fam = mysqli_query($conexion,"SELECT * FROM t_familiar WHERE fk_idprenatal='$pre_id' ORDER by idfamiliar DESC LIMIT 1");
                while ($fila2 = mysqli_fetch_array($sacar_fam)) {
                      $familiar_id = $fila2['idfamiliar']; 
                      $familiar = $fila2['familiar'];
                      $con_fam = $fila2['condGrave'];
                    }
                    $sacar_per= mysqli_query($conexion,"SELECT * FROM t_personales WHERE fk_idprenatal='$pre_id' ORDER by idpersonal DESC LIMIT 1");
                while ($fila5 = mysqli_fetch_array($sacar_per)) {
                      $personal_id = $fila5['idpersonal']; 
                      $personal = $fila5['personal'];
                      $con_per = $fila5['condGrave'];
                    }

                  }
                }
          ?>
    <div class="row">      
    <div class="col-md-6">                 
<h5 class="card-title" style="color:white">FAMILIARES:</h5>
<div class="row">
   <div class="col-md-12">
                                           <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="edades" id="fnamep" autocomplete="off" value="<?php echo $familiar; ?>" readonly="readonly" size="60">  
                                        </div> 
                                        </div> 
                                        <br/><br/>
                                        <div class="row">
   <div class="col-md-12">
     <div class="row">
                                            <label style="color: white" >Otra condición medica: </label>
                                          </div>
                                            <div class="row">
                                           <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="edad_fam" id="fnamep" autocomplete="off" value="<?php echo $con_fam; ?>" readonly="readonly" size="60">  
                                        </div>
                                        </div> 
                                        </div> 
</div> 
    <div class="col-md-6">                 
<h5 class="card-title" style="color:white">FAMILIARES:</h5>
<div class="row">
   <div class="col-md-12">
                                           <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="edad_per" id="fnamep" autocomplete="off" value="<?php echo $personal; ?>" readonly="readonly" size="60">  
                                        </div> 
                                        </div> 
                                        <br/><br/>
                                        <div class="row">
   <div class="col-md-12">
     <div class="row">
                                            <label style="color: white" >Otra condición medica: </label>
                                          </div>
                                            <div class="row">
                                           <input style="background: rgba(0, 101, 191,0); border: 0; color:white" type="text" name="edad_per" id="fnamep" autocomplete="off" value="<?php echo $con_per; ?>" readonly="readonly" size="60">  
                                        </div>
                                        </div> 
                                        </div> 
</div>
</div>         
          <?php }else{?>
  
    <div class="row">      
    <div class="col-md-4">                 
<h5 class="card-title" style="color:white">FAMILIARES</h5>
  <label class="container1" style="color: white;font-size: 12px;" >TBC
  <input type="checkbox" name="familiares[]" value="TBC">
   <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;">Diabetes
  <input type="checkbox" name="familiares[]" value="Diabetes">
  <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;">Hipertensión 
  <input type="checkbox" name="familiares[]" value="Hipertension">
  <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;">Preeclampsia 
  <input type="checkbox" name="familiares[]" value="Preeclampsia">
  <span class="checkmark"></span>
</label>
  <label class="container1" style="color: white;font-size: 12px;" >Eclampsia
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
  <label class="container1" style="color: white;font-size: 12px;"  >TBC
  <input type="checkbox" name="personales[]" value="TBC">
   <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;" >Diabetes
  <input type="checkbox" name="personales[]" value="Diabetes">
  <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;" >Hipertensión 
  <input type="checkbox" name="personales[]" value="Hipertension">
  <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;" >Preeclampsia 
  <input type="checkbox" name="personales[]" value="Preeclampsia">
  <span class="checkmark"></span>
</label>
  <label class="container1" style="color: white;font-size: 12px;"  >Eclampsia
  <input type="checkbox" name="personales[]" value="Eclampsia">
   <span class="checkmark"></span>
</label>
</div>
<div class="col-md-6">                 
  <label class="container1" style="color: white;font-size: 12px;"  >Cirugia Genito-Urinaria 
  <input type="checkbox" name="personales[]" value="Cirugia Genito-Uninaria">
   <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;" >Infertibilidad 
  <input type="checkbox" name="personales[]" value="Infertibilidad">
  <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;" >Cardiopatia 
  <input type="checkbox" name="personales[]" value="Cardiopatia">
  <span class="checkmark"></span>
</label>
<label class="container1" style="color: white;font-size: 12px;" >Nefropatía 
  <input type="checkbox" name="personales[]" value="Nefropatia">
  <span class="checkmark"></span>
</label>
  <label class="container1" style="color: white;font-size: 12px;"  >Violencia 
  <input type="checkbox" name="personales[]" value="Violencia">
   <span class="checkmark"></span>
</label>
 <label class="container1"  style="color: white;font-size: 12px;" >VIH+ 
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
<br/><br/>
<div class="row">
<div class="col-md-12">
  <h7 class="card-title" style="color: white">CIRUGIAS PREVIAS</h7> 
  <br/>
  <div class="row">
  <div class="col-md-6"> 
<label class="container1" style="color: white;font-size: 12px;">NO
  <input type="radio" value="no_cirugia"  id="status" name="cirugia" onChange="mostrar(this.value);" checked="checked">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-6">
 <label class="container1" style="color: white;font-size: 12px;">SI
  <input type="radio" value="si_cirugia"  id="status" name="cirugia" onChange="mostrar(this.value);">
 <span class="checkmark"></span>
</label >
</div>
</div>
<div class="row">
  <div class="col-md-12">
    <br/>
         <div id="cirugia" style="display: none;">
     <div class="input-group">
    <textarea class="form-control" rows="3" name="cirugia"></textarea>
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
     </div>
     </div> 
    </div>
  </div>
</div>
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
                                        <br/><br/> 
                                        <div class="row">
<div class="col-md-12">
  <h7 class="card-title" style="color: white">TIPO DE RIESGO</h7> 
  <br/>
  <div class="row">
  <div class="col-md-4"> 
<label class="container1" style="color: white;font-size: 12px;">Bajo
  <input type="radio" value="Bajo"  id="status" name="riesgo" checked="checked">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-4">
 <label class="container1" style="color: white;font-size: 12px;">Medio
  <input type="radio" value="Medio"  id="status" name="riesgo" >
 <span class="checkmark"></span>
</label >
</div>
<div class="col-md-4">
 <label class="container1" style="color: white;font-size: 12px;">Alto
  <input type="radio" value="Alto"  id="status" name="riesgo" >
 <span class="checkmark"></span>
</label >
</div>
</div>
</div>
</div>
                                    </div> 
</div>

                       </div>
<div class="tab">
      <h5 class="card-title" style="color: white">ANTECEDENTES OBSTÉTRICOS</h5>

    <h7 class="card-title" style="color: white">GESTAS PREVIAS:</h7>  
    <br/>
    <br/>
    <div class="row">
      <div class="col-md-3">
  <label class="container1" style="color: white;font-size: 14px;">Ninguna
  <input type="checkbox" value="ninguna"  id="status" name="status" onChange="mostrar(this.value);">
   <span class="checkmark"></span>
</label>
</div>
<div class="col-md-3">
  <label class="container1" style="color: white;font-size: 14px;">Embarazo Ectópico
  <input type="checkbox" value="embarazo_ectopico"  id="status" name="status" onChange="mostrar(this.value);">
   <span class="checkmark"></span>
</label>
</div>
<div class="col-md-3">  
<label class="container1" style="color: white;font-size: 14px;">Abortos
  <input type="checkbox" value="aborto"  id="status" name="status" onChange="mostrar(this.value);">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-3">  
<label class="container1" style="color: white;font-size: 14px;">Partos 
  <input type="checkbox" value="parto"  id="status" name="status" onChange="mostrar(this.value);">
  <span class="checkmark"></span>
</label>
</div>
</div>

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
     <div id="embarazo_ectopico" style="display: none;">
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="embarazo_ecto" name="embarazo_ecto" placeholder="0" value="" size="5" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div> 
    </div>
  </div>
<div class="col-md-1">
  </div>

  <div class="col-md-2">
     <div id="aborto" style="display: none;">
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="abort" name="abort" placeholder="0" value="" size="3" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div> 
    </div>
  </div>
  <div class="col-md-1">
  </div>
  <div class="col-md-3">
     <div id="parto" style="display: none;">
     <div class="row">
     <div class="col-md-12">
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="part" name="part" placeholder="0" value="" size="5" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div>
     </div>
     </div>
          <br/>
     <div class="row">
     <div class="col-md-6">
      <label class="container1" style="color: white;font-size: 14px;">Vaginales
      <input type="checkbox" value="vaginales"  id="status" name="status" onChange="mostrar(this.value);">
      <span class="checkmark"></span>
      </label>
      </div>
      <div class="col-md-6">  
      <label class="container1" style="color: white;font-size: 14px;">Cesáreas
      <input type="checkbox" value="cesareas"  id="status" name="status" onChange="mostrar(this.value);">
      <span class="checkmark"></span>
      </label>
      </div>
    </div>
       <div class="row">
     <div class="col-md-6">
     <div id="vaginales" style="display: none;">
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="vag" name="vag" placeholder="0" value="" size="3" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div> 
    </div>
      </div>

      <div class="col-md-6">  
           <div id="cesareas" style="display: none;">
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="ces" name="ces" placeholder="0" value="" size="3" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div> 
    </div>
      </div>
          </div>
 <br/>
       <div class="row">
     <div class="col-md-6">
     <div id="vivos" style="display: none;">
      <label style="color: white">Vivos:  <small class="text-muted"></small></label>
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="viv" name="viv" placeholder="0" value="" size="3" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div> 
    </div>
      </div>

      <div class="col-md-6">  
           <div id="muertos" style="display: none;">
     <label style="color: white">Muertos:  <small class="text-muted"></small></label>
     <div class="input-group">
     <input type="number" min="0" class="form-control" id="muert" name="muert" placeholder="0" value="" size="3" >
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
     </div>
     </div> 
    </div>
      </div>
          </div>
          <br/>
              <div class="row">
            <div class="col-md-12">
      <div id="fecha_parto_anterior" style="display: none;">
      <label style="color: white">Fin Embarazo Anterior:<small class="text-muted"></small></label><div class="input-group"><input type="date" class="form-control" id="fecha_parto_ant" autocomplete="off" name="fecha_parto_ant" >       
                                                 <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                            </div> 
                                        </div>
                                      </div>
                                      </div>
  </div>
     </div>


   </div>
   <br/>  
          <div class="row">
      <div class="col-md-3" id="planeado">
 <h7 class="card-title" style="color: white">¿EMBARAZO PLANEADO?</h7> 
  <br/><br/>
  <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">NO
  <input type="radio" value="No"  id="status" name="planeado" onChange="mostrar(this.value);" checked="checked">
  <span class="checkmark"></span>
</label>
</div>
 <div class="row">
 <label class="container1" style="color: white;font-size: 12px;">SI
  <input type="radio" value="Si"  id="status" name="planeado" onChange="mostrar(this.value);">
 <span class="checkmark"></span>
</label >
</div>

      </div>
          <div class="col-md-3">
        <div id="si_planeado" style="display: none;">
 <h7 class="card-title" style="color: white">FRACASO MÉTODO ANTICONCEPTIVO</h7> 
  <br/> <br/>
 <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">No usaba
  <input type="radio" name="met_anti" value="No usaba">
 <span class="checkmark"></span>
</label>
</div>
 <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">Barrera
  <input type="radio" name="met_anti" value="Barrera">
 <span class="checkmark"></span>
</label>
</div>
 <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">DIU
  <input type="radio" name="met_anti" value="DIU">
 <span class="checkmark"></span>
</label>
</div>
 <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">Hormonal
  <input type="radio" name="met_anti" value="Hormonal">
 <span class="checkmark"></span>
</label>
</div>
 <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">Emergencia
  <input type="radio" name="met_anti" value="Emergencia">
 <span class="checkmark"></span>
</label>
</div>
 <div class="row"> 
<label class="container1" style="color: white;font-size: 12px;">Natural
  <input type="radio" name="met_anti" value="Natural">
 <span class="checkmark"></span>
</label>
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
                       <br/>
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
                                <br/>
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
  <div class="tab"> 
    <h7 class="card-title" style="color: white">ANEXOS:</h7>  
    <br/>
    <br/>
    <div class="row">
      <div class="col-md-12">
  <label class="container1" style="color: white;font-size: 14px;">Recetas Medicas
  <input type="checkbox" value="recetas" id="status" name="status" onChange="mostrar(this.value);">
   <span class="checkmark"></span>
</label>
<div class="row">
    <div class="col-md-12">
     <div id="recetas" style="display: none;">
     <div class="input-group">
     <textarea class="form-control" rows="3" id="recetas" name="recetas"></textarea> 
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
     </div>
     </div> 
    </div>
  </div>
</div>
</div>
</div>

 <br/>
    <br/>
    <div class="row">
      <div class="col-md-12">
  <label class="container1" style="color: white;font-size: 14px;">Referencias Medicas
  <input type="checkbox" value="referencias" id="status" name="status" onChange="mostrar(this.value);">
   <span class="checkmark"></span>
</label>
<div class="row">
    <div class="col-md-12">
     <div id="referencias" style="display: none;">
     <div class="input-group">
     <textarea class="form-control" rows="3" id="referencias" name="referencias"></textarea> 
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
     </div>
     </div> 
    </div>
  </div>
</div>
</div>
</div>

 <br/>
    <br/>
    <div class="row">
      <div class="col-md-12">
  <label class="container1" style="color: white;font-size: 14px;">Constancias Medicas
  <input type="checkbox" value="constancias" id="status" name="status" onChange="mostrar(this.value);">
   <span class="checkmark"></span>
</label>
<div class="row">
    <div class="col-md-12">
     <div id="constancias" style="display: none;">
     <div class="input-group">
     <textarea class="form-control" rows="3" id="constancias" name="constancias"></textarea> 
     <div class="input-group-append">
     <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
     </div>
     </div> 
    </div>
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
            $fech_parto = $_REQUEST['fech_parto'];
            $partes1 = explode('-', $fech_parto);
                $p_fecha = "{$partes1[0]}-{$partes1[1]}-{$partes1[2]}"; 
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
          $cirugia = $_REQUEST['cirugia'];
          $riesgo = $_REQUEST['riesgo'];
          $receta = $_REQUEST['recetas'];
          $referencias = $_REQUEST['referencias'];
          $constancias = $_REQUEST['constancias'];
         //OBSTETRICOS
         $embarazo_ecto = $_REQUEST['embarazo_ecto'];
         $abort = $_REQUEST['abort'];
         $part = $_REQUEST['part'];
         $vag = $_REQUEST['vag'];
         $ces = $_REQUEST['ces']; 
         $viv = $_REQUEST['viv'];
         $muert = $_REQUEST['muert']; 
         $fecha_parto_ant = $_REQUEST['fecha_parto_ant']; 
         $planeado = $_REQUEST['planeado'];
         $met_anti = $_REQUEST['met_anti'];
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
 mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_enfermeria,con_fecha_atiende,con_diagnostico,con_ref_medica,con_cons_medica,con_receta,con_fecha_amenorrea,con_ctipo_consulta,con_resul_examen,enfermeria_fetal,estado) VALUES('$modi','$enfermeria','$y1-$m1-$d1','$diagnostico','$referencias','$constancias','$receta','$fecha','Control Prenatal','$resul_examenes','$enfermeria_fetal','embarazo')");
         }else{         
            mysqli_query($conexion, "INSERT INTO t_consulta(fk_expediente,fk_enfermeria,con_fecha_atiende,con_diagnostico,con_ref_medica,con_cons_medica,con_receta,con_fecha_amenorrea,con_ctipo_consulta,con_resul_examen,enfermeria_fetal,estado) VALUES('$modi','$enfermeria','$y1-$m1-$d1','$diagnostico','$referencias','$constancias','$receta','$amenorrea','Control Prenatal','$resul_examenes','$enfermeria_fetal','embarazo')");
       }
       $sacar4 = mysqli_query($conexion,"SELECT idconsulta FROM t_consulta ORDER by idconsulta DESC LIMIT 1");
                while ($fila4 = mysqli_fetch_array($sacar4)) {
                      $consulta = $fila4['idconsulta']; 
                    }
  ///**************************consulta*****************
///**************prenatal*********************
mysqli_query($conexion, "INSERT INTO t_prenatal(fk_consulta,pre_ccirugias_previas,pre_ffecha_parto,pre_ctipo_riesgo)
                                          VALUES('$consulta','$cirugia','$fech_parto','$riesgo')");
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
         mysqli_query($conexion, "INSERT INTO t_obstetricos(abortos,embarazoEtopico,partos,vaginales,cesareas,vivo,muerto,planeado,anticonceptivos,fechaEmbarazoAnterior,fk_idprenatal) VALUES('$abort','$embarazo_ecto','$part','$vag','$ces','$viv','$muert','$planeado','$met_anti','$fecha_parto_ant','$prena')");
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
         $sacar4 = mysqli_query($conexion,"SELECT idobstetricos FROM t_obstetricos ORDER by idobstetricos DESC LIMIT 1");
                while ($fila4 = mysqli_fetch_array($sacar4)) {
                      $obstetricos_id = $fila4['idobstetricos']; 
                    }
  //********************sacar familiar................
  
            
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
  $validarFOTOGRAFICO = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel Fotografico'");
   if (mysqli_num_rows($validarFOTOGRAFICO)>0) {
    $sacar12 = mysqli_query($conexion,"SELECT * FROM inventario_unidades WHERE tipo='Papel Fotografico'");
                while ($fila12 = mysqli_fetch_array($sacar12)) {
                      $FOTOGRAFICO_dec=$fila12['decremento'];
                    }
                      $desc_FOTOGRAFICO=$FOTOGRAFICO_dec-$fotografico; 
 mysqli_query($conexion,"UPDATE inventario_unidades SET decremento='$desc_FOTOGRAFICO' WHERE tipo='Papel Fotografico'");
}
  
  
mysqli_query($conexion,"UPDATE t_llegada SET estado=2 WHERE fk_expediente='$modi' AND lleg_ffecha_atiende='$y1-$m1-$d1'");
                       echo '<script>swal({
                        title: "Registro",
                        text: "¡Guardado!",
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