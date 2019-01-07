      <?php
      include_once '../plantilla/cabecera.php';
      include_once '../plantilla/menu.php';
      include_once '../plantilla/menu_lateral.php';
         $modi = $_GET['ir'];
          ?>
          <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <link href="../css/check.css" rel="stylesheet">
                    <div class="page-wrapper" style="height: 1071px;">
                      <div class="container-fluid" >
                               <div class="card" style="background: rgba(0,101,191,0.6)">
                  <div class="card-body wizard-content">
                                                <form id="regForm" name="regForm" action="" method="post">

 <!-- <h3 class="card-title" style="color: white">Register:</h3> -->
                  <input type="hidden" name="tirar" value="<?php echo $modi; ?>" id="pase"/>
   <div class="row">                              
                                    <div class="col-md-7">       
                                    <?php
                                      include_once '../Conexion/conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente, t_expediente, t_consulta WHERE idconsulta='$modi' AND id_expediente=fk_expediente AND fk_paciente=id_paciente");
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
                                       
                                        <label style="color: white; font-size: 16px" >Paciente: <small class="text-muted"></small></label> 
                                        <input style="background: rgba(0, 101, 191,0); border: 0; color:white; font-size: 16px" type="text" name="nombre" id="fnamep" placeholder="Ingrese nombre" autocomplete="off" value="<?php echo $nom . " " . $ape; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="30">  
                                    </div> 
                                     <div class="col-md-1">
                                     </div> 
                                    <div class="col-md-4">
                                    <label style="color: white;font-size: 16px" >Edad: <small class="text-muted"></small></label>
                                            <input style="background: rgba(0, 101, 191,0); border: 0; color:white; font-size: 16px" type="text" name="edad" id="fnamep" autocomplete="off" value="<?php echo $edad." Años"; ?>" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" readonly="readonly" size="6">  
                                        
                                    </div> 
                                </div>
                                 <?php
                                 }
                                    ?>
                                    
                                    <hr>
                                    <h3 class="card-title" style="color: white" align="center">LISTADO DE EXAMENES</h3>
                                    <hr>
                                    
                                  
    <div class="row"> 
    <div class="col-md-3">                 
<h5 class="card-title" style="color:white">HEMATOLOGIA</h5>
  <label class="container1" >Hemograma
  <input type="checkbox" name="hemograma" value="Hemograma">
   <span class="checkmark"></span>
</label>
<label class="container1">Htc. y Hb.
  <input type="checkbox" name="htc" value="Htc">
  <span class="checkmark"></span>
</label>
<label class="container1">Leucograma
  <input type="checkbox" name="leuco" value="Leucograma">
  <span class="checkmark"></span>
</label>
<label class="container1">Plaquetas
  <input type="checkbox" name="plaquetas" value="Plaquetas">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Reticulocitos
  <input type="checkbox" name="reti" value="Reticulocitos">
   <span class="checkmark"></span>
</label>
<label class="container1">Frotis Sangre Periférica
  <input type="checkbox" name="frotis" value="Frotis Sangre Periferica">
  <span class="checkmark"></span>
</label>
<label class="container1">Eritrosedimentación 
  <input type="checkbox" name="eritro" value="Eritrosedimentacion">
  <span class="checkmark"></span>
</label>
<label class="container1">Celulas L.E.
  <input type="checkbox" name="cel_le" value="Celulas L.E.">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Celulas Falciformes
  <input type="checkbox" name="cel_falci" value="Celulas Falciformes">
   <span class="checkmark"></span>
</label>
<label class="container1">Recuento Eosinofilos en Sangre
  <input type="checkbox" name="recu_sangre" value="Recuento Eosinofilos en Sangre ">
  <span class="checkmark"></span>
</label>
<label class="container1">Recuento Eosinofilos Nasal
  <input type="checkbox" name="recu_nasal" value="Recuento Eosinofilos Nasal ">
  <span class="checkmark"></span>
</label>

<label class="container1">Tiempo Sangramiento
  <input type="checkbox" name="sangramiento" value="Tiempo Sangramiento ">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Retracción de Coágulo
  <input type="checkbox" name="coagulo" value="Retracción de Coágulo ">
   <span class="checkmark"></span>
</label>
<label class="container1">Tiempo de Protrombina
  <input type="checkbox" name="protrombina" value="Tiempo de Protrombina ">
  <span class="checkmark"></span>
</label>
<label class="container1">Tiempo de Trombina
  <input type="checkbox" name="trombina" value="Tiempo de Trombina ">
  <span class="checkmark"></span>
</label>
<label class="container1">Tiempo Parcial de Tromboplastina
  <input type="checkbox" name="tromboplastina" value="Tiempo Parcial de Tromboplastina ">
  <span class="checkmark"></span>
</label>
<label class="container1">Tiempo de Coagulación 
  <input type="checkbox" name="coagulacion" value="Tiempo de Coagulacion ">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Fibrinógeno
  <input type="checkbox" name="fibrinogeno" value="Fibrinogeno ">
   <span class="checkmark"></span>
</label>
<label class="container1">Grupo y RH.
  <input type="checkbox" name="rh" value="Grupo y RH. ">
  <span class="checkmark"></span>
</label>
<label class="container1">Prueba Cruzada 
  <input type="checkbox" name="p_cruzada" value="Prueba Cruzada  ">
  <span class="checkmark"></span>
</label>
<label class="container1">Prueba de Coombs Directo e Indirecto
  <input type="checkbox" name="coombs" value="Prueba de Coombs Directo e Indirecto">
  <span class="checkmark"></span>
</label>
</br>
<h5 class="card-title" style="color:white">ORINA</h5>
  <label class="container1" >Examen General
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Proteínas en Orina
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Proteínas en Orina 24 Hrs. 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
</div>
    <div class="col-md-3">                 
<h5 class="card-title" style="color:white">HECES</h5>
  <label class="container1" >Examen General
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Sangre Oculta
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Grasa en Heces 24Hrs. Cuantitativa
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Azul de Metileno en Heces
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Sustancias Reducoras
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">INMUNOLOGIA</h5>
  <label class="container1" >Antigenos Febriles
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Antiestreptolisima
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Proteína C Reactiva 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Latex R.A.
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Latex L.E. 
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">V.D.R.L.
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">FTA-ABS
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">H.I.V.
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Gravindex
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Prueba de Embarazo en Sangre
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Anti RH
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Anti Hepatitis C
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Anti c. Antinucleares
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Anti DNA
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Lupus Anticuagulante 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Antic. Anticardiolipinas
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Antitoxoplasmosis lgM
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Antitoxoplasmosis lgG
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">PSA
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Helicobacter Pylori en Sangre 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Helicobacter Pylori en Heces 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">VARIOS</h5>
  <label class="container1" >Espermograma
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
</div>
    <div class="col-md-3">                 
<h5 class="card-title" style="color:white">ENDOCRINOLOGIA</h5>
  <label class="container1" >T3
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">T4
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">T.S.H.
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Hormona de Crecimiento
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Hormona Paratiroidea  
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">C-Terminal
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Progesterona
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Estradiol
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Testosterona
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">LH
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">FSH
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Prolactina
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">PERFIL PRENATAL</h5>
  <label class="container1" >Hemograma
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Tipeo Sanguineo
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Glucosa
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">V.D.R.L.
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">V.I.H.
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Toxoplasmosis lgM
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Toxoplasmosis lgG
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Urocultivo
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">BACTERIOLOGIA</h5>
  <label class="container1" >Gram
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Frotis Faringeo
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Cultivo
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Hemocultivo
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Urocultivo 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Coprocultivo 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Directo de Hongos (OH)
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Cultivo de Hongos
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Cultivo Secreción Vaginal
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-3">                 
<h5 class="card-title" style="color:white">QUIMICA</h5>
  <label class="container1" >Glucosa
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Tol. Glucosa 4 Horas (Hipoglicemia)
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Glucosa Post Pandrial
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Albumina
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Tolerancia Post-Ingesta 75grs. de Glucosa 2 hrs.   
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Hb. Glicosilada AIC%
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Test O'Sullivan
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Nitrógeno Ureico 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Creatinina 
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Depuración de Creatinina
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Acido Urico 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Urea
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Cloro
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Sodio
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Potasio 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Calcio
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Fosforo 
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Magnesio
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Colesterol
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Trigliceridos
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Lipidos Totales
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">Lipoproteinas Alta-Baja
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Densidad HDL-LDL
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Proteínas Totales 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
  <label class="container1" >TGO
  <input type="checkbox">
   <span class="checkmark"></span>
</label>
<label class="container1">TGP
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Bilirrubina  
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Fosfatasa Alcalina 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Amilasa
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">Lipasa
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">LDH
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
<label class="container1">CPK 
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
</div>
                                </div>
                                  <div class="row"> 
    <div class="col-md-12">                 
<h5 class="card-title" style="color:white">OTROS EXAMENES:</h5>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="familiares"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
</div>
<div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                            <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Lista de Espera" onclick="location.href='../Expediente_Admin/verCola.php'" ></div>
                                    </div>   
</div>
  </form>
                      </div>
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

 $sacar = mysqli_query($conexion, "SELECT*FROM t_consulta WHERE idconsulta='$modi' ");
                                         while ($fila = mysqli_fetch_array($sacar)) {
                                            $consulta = $fila['idconsulta'];
                                          
//$hematologia = implode(',', $_POST['hematologia']);
$hemo = $_POST['hemograma'];
$htc= $_POST['htc'];
$leuco = $_POST['leuco'];
$plaquetas = $_POST['plaquetas'];
$reti = $_POST['reti'];
$frotis = $_POST['frotis'];
$eritro = $_POST['eritro'];
$cel_le = $_POST['cel_le'];
$cel_falci = $_POST['cel_falci'];
$recu_nasal = $_POST['recu_nasal'];
$recu_sangre = $_POST['recu_sangre'];
$sangramiento = $_POST['sangramiento'];
$coagulo = $_POST['coagulo'];
$protrombina = $_POST['protrombina'];
$trombina = $_POST['trombina'];
$tromboplastina = $_POST['tromboplastina'];
$coagulacion = $_POST['coagulacion'];
$fibrinogeno = $_POST['fibrinogeno'];
$rh = $_POST['rh'];
$p_cruzada = $_POST['p_cruzada'];
$coombs = $_POST['coombs'];

$hematologia = $hemo.','.$htc.','.$leuco.','.$plaquetas.','.$reti.','.$frotis.','.$eritro.','.$cel_le.','.$cel_falci.','.$recu_sangre.','.$recu_nasal.','.$sangramiento.','.$coagulo.','.$protrombina.','.$trombina.','.$tromboplastina.','.$coagulacion.','.$fibrinogeno.','.$rh.','.$p_cruzada.','.$coombs; 


    mysqli_query($conexion,"INSERT INTO t_examenes(fk_consulta,hematologia) VALUES ('$consulta','$hematologia')");     
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
}
           include_once '../plantilla/pie.php';

      ?>
         