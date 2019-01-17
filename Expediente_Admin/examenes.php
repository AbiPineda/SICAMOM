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
  <label class="container1" >Examen General de Orina
  <input type="checkbox" name="gene_orina" value="Examen General de Orina">
   <span class="checkmark"></span>
</label>
<label class="container1">Proteínas en Orina
  <input type="checkbox" name="prot_orina" value="Proteinas en Orina">
  <span class="checkmark"></span>
</label>
<label class="container1">Proteínas en Orina 24 Hrs. 
  <input type="checkbox" name="prot_orina_24h" value="Proteinas en Orina 24 Hrs.">
  <span class="checkmark"></span>
</label>
</div>
    <div class="col-md-3">                 
<h5 class="card-title" style="color:white">HECES</h5>
  <label class="container1" >Examen General de Heces
  <input type="checkbox" name="gene_heces" value="Examen General de Heces">
   <span class="checkmark"></span>
</label>
<label class="container1">Sangre Oculta
  <input type="checkbox" name="sangre_oculta" value="Sangre Oculta">
  <span class="checkmark"></span>
</label>
<label class="container1">Grasa en Heces 24Hrs. Cuantitativa
  <input type="checkbox" name="grasa_heces" value="Grasa en Heces 24Hrs. Cuantitativa">
  <span class="checkmark"></span>
</label>
<label class="container1">Azul de Metileno en Heces
  <input type="checkbox" name="azul_metileno_heces" value="Azul de Metileno en Heces">
  <span class="checkmark"></span>
</label>
<label class="container1">Sustancias Reducoras
  <input type="checkbox" name="sust_reducoras" value="Sustancias Reducoras">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">INMUNOLOGIA</h5>
  <label class="container1" >Antigenos Febriles
  <input type="checkbox" name="ant_febriles" value="Antigenos Febriles">
   <span class="checkmark"></span>
</label>
<label class="container1">Antiestreptolisima
  <input type="checkbox" name="antiestreptolisima" value="Antiestreptolisima">
  <span class="checkmark"></span>
</label>
<label class="container1">Proteína C Reactiva 
  <input type="checkbox" name="prot_c_reactiva" value="Proteína C Reactiva ">
  <span class="checkmark"></span>
</label>
<label class="container1">Latex R.A.
  <input type="checkbox" name="latex_ra" value="Latex R.A.">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Latex L.E. 
  <input type="checkbox" name="latex_le" value="Latex L.E.">
   <span class="checkmark"></span>
</label>
<label class="container1">V.D.R.L.
  <input type="checkbox" name="vdrl" value="V.D.R.L.">
  <span class="checkmark"></span>
</label>
<label class="container1">FTA-ABS
  <input type="checkbox" name="fta_abs" value="FTA-ABS">
  <span class="checkmark"></span>
</label>
<label class="container1">H.I.V.
  <input type="checkbox" name="hiv" value="H.I.V.">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Gravindex
  <input type="checkbox" name="gravindex" value="Gravindex">
   <span class="checkmark"></span>
</label>
<label class="container1">Prueba de Embarazo en Sangre
  <input type="checkbox" name="embarazo_sangre" value="Prueba de Embarazo en Sangre">
  <span class="checkmark"></span>
</label>
<label class="container1">Anti RH
  <input type="checkbox" name="anti_rh" value="Anti RH">
  <span class="checkmark"></span>
</label>
<label class="container1">Anti Hepatitis C
  <input type="checkbox" name="hepatitis_c" value="Anti Hepatitis C">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Anti c. Antinucleares
  <input type="checkbox" name="antinucleares" value="Anti c. Antinucleares">
   <span class="checkmark"></span>
</label>
<label class="container1">Anti DNA
  <input type="checkbox" name="anti_dna" value="Anti DNA">
  <span class="checkmark"></span>
</label>
<label class="container1">Lupus Anticuagulante 
  <input type="checkbox" name="lupus" value="Lupus Anticuagulante ">
  <span class="checkmark"></span>
</label>
<label class="container1">Antic. Anticardiolipinas
  <input type="checkbox" name="anticardiolipinas" value="Antic. Anticardiolipinas">
  <span class="checkmark"></span>
</label>
<label class="container1">Antitoxoplasmosis lgM
  <input type="checkbox" name="toxo_lgm" value="Antitoxoplasmosis lgM">
  <span class="checkmark"></span>
</label>
<label class="container1">Antitoxoplasmosis lgG
  <input type="checkbox" name="toxo_lgg" value="Antitoxoplasmosis lgG">
  <span class="checkmark"></span>
</label>
<label class="container1">PSA
  <input type="checkbox" name="psa" value="PSA">
  <span class="checkmark"></span>
</label>
<label class="container1">Helicobacter Pylori en Sangre 
  <input type="checkbox" name="helico_sangre" value="Helicobacter Pylori en Sangre">
  <span class="checkmark"></span>
</label>
<label class="container1">Helicobacter Pylori en Heces 
  <input type="checkbox" name="helico_heces" value="Helicobacter Pylori en Heces">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">VARIOS</h5>
  <label class="container1" >Espermograma
  <input type="checkbox" name="espermograma" value="Espermograma">
   <span class="checkmark"></span>
</label>
</div>
    <div class="col-md-3">                 
<h5 class="card-title" style="color:white">ENDOCRINOLOGIA</h5>
  <label class="container1" >T3
  <input type="checkbox" name="t3" value="T3">
   <span class="checkmark"></span>
</label>
<label class="container1">T4
  <input type="checkbox" name="t4" value="T4">
  <span class="checkmark"></span>
</label>
<label class="container1">T.S.H.
  <input type="checkbox" name="tsh" value="T.S.H.">
  <span class="checkmark"></span>
</label>
<label class="container1">Hormona de Crecimiento
  <input type="checkbox" name="hormona_crecimiento" value="Hormona de Crecimiento">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Hormona Paratiroidea  
  <input type="checkbox" name="hormona_paratiroidea" value="Hormona Paratiroidea">
   <span class="checkmark"></span>
</label>
<label class="container1">C-Terminal
  <input type="checkbox" name="c_terminal" value="C-Terminal">
  <span class="checkmark"></span>
</label>
<label class="container1">Progesterona
  <input type="checkbox" name="progesterona" value="Progesterona">
  <span class="checkmark"></span>
</label>
<label class="container1">Estradiol
  <input type="checkbox" name="estradiol" value="Estradiol">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Testosterona
  <input type="checkbox" name="testosterona" value="Testosterona">
   <span class="checkmark"></span>
</label>
<label class="container1">LH
  <input type="checkbox" name="lh" value="LH">
  <span class="checkmark"></span>
</label>
<label class="container1">FSH
  <input type="checkbox" name="fsh" value="FSH">
  <span class="checkmark"></span>
</label>
<label class="container1">Prolactina
  <input type="checkbox" name="prolactina" value="Prolactina">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">PERFIL PRENATAL</h5>
  <label class="container1" >Hemograma
  <input type="checkbox" name="hemograma_pre" value="Hemograma">
   <span class="checkmark"></span>
</label>
<label class="container1">Tipeo Sanguineo
  <input type="checkbox" name="tipeo_sanguineo" value="Tipeo Sanguineo">
  <span class="checkmark"></span>
</label>
<label class="container1">Glucosa
  <input type="checkbox" name="glucosa" value="Glucosa">
  <span class="checkmark"></span>
</label>
<label class="container1">V.D.R.L.
  <input type="checkbox" name="vdrl_pre" value="V.D.R.L.">
  <span class="checkmark"></span>
</label>
<label class="container1">V.I.H.
  <input type="checkbox" name="vih" value="V.I.H.">
  <span class="checkmark"></span>
</label>
<label class="container1">Toxoplasmosis lgM
  <input type="checkbox" name="toxo_lgm_pre" value="Toxoplasmosis lgM">
  <span class="checkmark"></span>
</label>
<label class="container1">Toxoplasmosis lgG
  <input type="checkbox" name="toxo_lgg_pre" value="Toxoplasmosis lgG">
  <span class="checkmark"></span>
</label>
<label class="container1">Urocultivo
  <input type="checkbox" name="urocultivo" value="Urocultivo">
  <span class="checkmark"></span>
</label>
<br/>
<h5 class="card-title" style="color:white">BACTERIOLOGIA</h5>
  <label class="container1" >Gram
  <input type="checkbox" name="gram" value="Gram">
   <span class="checkmark"></span>
</label>
<label class="container1">Frotis Faringeo
  <input type="checkbox" name="frotis_faringeo" value="Frotis Faringeo">
  <span class="checkmark"></span>
</label>
<label class="container1">Cultivo
  <input type="checkbox" name="cultivo" value="Cultivo">
  <span class="checkmark"></span>
</label>
<label class="container1">Hemocultivo
  <input type="checkbox" name="hemocultivo" value="Hemocultivo">
  <span class="checkmark"></span>
</label>
<label class="container1">Urocultivo 
  <input type="checkbox" name="urocultivo_bac" value="Urocultivo">
  <span class="checkmark"></span>
</label>
<label class="container1">Coprocultivo 
  <input type="checkbox" name="coprocultivo" value="Coprocultivo">
  <span class="checkmark"></span>
</label>
<label class="container1">Directo de Hongos (OH)
  <input type="checkbox" name="hongos_oh" value="Directo de Hongos (OH)">
  <span class="checkmark"></span>
</label>
<label class="container1">Cultivo de Hongos
  <input type="checkbox" name="cultivo_hongos" value="Cultivo de Hongos">
  <span class="checkmark"></span>
</label>
<label class="container1">Cultivo Secreción Vaginal
  <input type="checkbox" name="sec_vaginal" value="Cultivo Secreción Vaginal">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-3">                 
<h5 class="card-title" style="color:white">QUIMICA</h5>
  <label class="container1" >Glucosa
  <input type="checkbox" name="glucosa_qui" value="Glucosa">
   <span class="checkmark"></span>
</label>
<label class="container1">Tol. Glucosa 4 Horas (Hipoglicemia)
  <input type="checkbox" name="glucosa_4h" value="Tol. Glucosa 4 Horas (Hipoglicemia)">
  <span class="checkmark"></span>
</label>
<label class="container1">Glucosa Post Pandrial
  <input type="checkbox" name="glucosa_pandrial" value="Glucosa Post Pandrial">
  <span class="checkmark"></span>
</label>
<label class="container1">Albumina
  <input type="checkbox" name="albumina" value="Albumina">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Tolerancia Post-Ingesta 75grs. de Glucosa 2 hrs.   
  <input type="checkbox" name="glucosa_2h" value="Tolerancia Post-Ingesta 75grs. de Glucosa 2 hrs.  ">
   <span class="checkmark"></span>
</label>
<label class="container1">Hb. Glicosilada AIC%
  <input type="checkbox" name="glicosilada" value="Hb. Glicosilada AIC%">
  <span class="checkmark"></span>
</label>
<label class="container1">Test O'Sullivan
  <input type="checkbox" name="sullivan" value="Test O'Sullivan">
  <span class="checkmark"></span>
</label>
<label class="container1">Nitrógeno Ureico 
  <input type="checkbox" name="nitrogeno_ureico" value="Nitrógeno Ureico ">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Creatinina 
  <input type="checkbox" name="creatinina" value="Creatinina ">
   <span class="checkmark"></span>
</label>
<label class="container1">Depuración de Creatinina
  <input type="checkbox" name="dep_creatinina" value="Depuración de Creatinina">
  <span class="checkmark"></span>
</label>
<label class="container1">Acido Urico 
  <input type="checkbox" name="acido_urico" value="Acido Urico ">
  <span class="checkmark"></span>
</label>
<label class="container1">Urea
  <input type="checkbox" name="urea" value="Urea">
  <span class="checkmark"></span>
</label>
  <label class="container1" >Cloro
  <input type="checkbox" name="cloro" value="Cloro">
   <span class="checkmark"></span>
</label>
<label class="container1">Sodio
  <input type="checkbox" name="sodio" value="Sodio">
  <span class="checkmark"></span>
</label>
<label class="container1">Potasio 
  <input type="checkbox" name="potasio" value="Potasio ">
  <span class="checkmark"></span>
</label>
<label class="container1">Calcio
  <input type="checkbox" name="calcio" value="alcio">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Fosforo 
  <input type="checkbox" name="fosforo" value="Fosforo ">
   <span class="checkmark"></span>
</label>
<label class="container1">Magnesio
  <input type="checkbox" name="magnesio" value="Magnesio">
  <span class="checkmark"></span>
</label>
<label class="container1">Colesterol
  <input type="checkbox" name="colesterol" value="Colesterol">
  <span class="checkmark"></span>
</label>
<label class="container1">Trigliceridos
  <input type="checkbox" name="trigliceridos" value="Trigliceridos">
  <span class="checkmark"></span>
</label>
 <label class="container1" >Lipidos Totales
  <input type="checkbox" name="lipidos" value="Lipidos Totales">
   <span class="checkmark"></span>
</label>
<label class="container1">Lipoproteinas Alta-Baja
  <input type="checkbox" name="liporpoteinas" value="Lipoproteinas Alta-Baja">
  <span class="checkmark"></span>
</label>
<label class="container1">Densidad HDL-LDL
  <input type="checkbox" name="densidad_hdl_ldl" value="Densidad HDL-LDL">
  <span class="checkmark"></span>
</label>
<label class="container1">Proteínas Totales 
  <input type="checkbox" name="proteinas_tot" value="Proteínas Totales ">
  <span class="checkmark"></span>
</label>
  <label class="container1" >TGO
  <input type="checkbox" name="tgo" value="TGO">
   <span class="checkmark"></span>
</label>
<label class="container1">TGP
  <input type="checkbox" name="tgp" value="TGP">
  <span class="checkmark"></span>
</label>
<label class="container1">Bilirrubina  
  <input type="checkbox" name="bilirrubina" value="Bilirrubina">
  <span class="checkmark"></span>
</label>
<label class="container1">Fosfatasa Alcalina 
  <input type="checkbox" name="fosfatasa_alcalina" value="Fosfatasa Alcalina ">
  <span class="checkmark"></span>
</label>
<label class="container1">Amilasa
  <input type="checkbox" name="amilasa" value="Amilasa">
  <span class="checkmark"></span>
</label>
<label class="container1">Lipasa
  <input type="checkbox" name="lipasa" value="Lipasa">
  <span class="checkmark"></span>
</label>
<label class="container1">LDH
  <input type="checkbox" name="ldh" value="LDH">
  <span class="checkmark"></span>
</label>
<label class="container1">CPK 
  <input type="checkbox" name="cpk" value="CPK">
  <span class="checkmark"></span>
</label>
</div>
                                </div>
                                  <div class="row"> 
    <div class="col-md-12">                 
<h5 class="card-title" style="color:white">OTROS EXAMENES:</h5>
                                        <div class="input-group">
                                             <textarea class="form-control" rows="3" name="otros_examenes"></textarea> 
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-file-medical-alt"></i></span>
                                            </div>
                                        </div> 
</div>
<div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                            <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Imprimir Examenes" onclick="location.href='../pdf/examenes.php'" ></div>
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
///QUIMICA
$glucosa_qui = $_POST['glucosa_qui']; 
$glucosa_4h = $_POST['glucosa_4h'];
$glucosa_pandrial = $_POST['glucosa_pandrial']; 
$albumina = $_POST['albumina'];
$glucosa_2h = $_POST['glucosa_2h'];
$glicosilada = $_POST['glicosilada'];
$sullivan = $_POST['sullivan'];
$nitrogeno_ureico = $_POST['nitrogeno_ureico'];
$creatinina = $_POST['creatinina'];
$dep_creatinina = $_POST['dep_creatinina'];
$acido_urico = $_POST['acido_urico'];
$urea = $_POST['urea'];
$cloro = $_POST['cloro'];
$sodio = $_POST['sodio'];
$potasio = $_POST['potasio'];
$calcio = $_POST['calcio'];
$fosforo = $_POST['fosforo'];
$magnesio = $_POST['magnesio'];
$colesterol = $_POST['colesterol'];
$trigliceridos = $_POST['trigliceridos'];
$lipidos = $_POST['lipidos'];
$liporpoteinas = $_POST['liporpoteinas'];
$densidad_hdl_ldl = $_POST['densidad_hdl_ldl'];
$proteinas_tot = $_POST['proteinas_tot'];
$tgo = $_POST['tgo'];
$tgp = $_POST['tgp'];
$bilirrubina = $_POST['bilirrubina'];
$fosfatasa_alcalina = $_POST['fosfatasa_alcalina'];
$amilasa = $_POST['amilasa'];
$lipasa = $_POST['lipasa'];
$ldh = $_POST['ldh'];
$cpk = $_POST['cpk'];

$quimica = $glucosa_qui.','.$glucosa_4h.','.$glucosa_pandrial.','.$albumina.','.$glucosa_2h.','.$glicosilada.','.$sullivan.','.$nitrogeno_ureico.','.$creatinina.','.$dep_creatinina.','.$acido_urico.','.$urea.','.$cloro.','.$sodio.','.$potasio.','.$calcio.','.$fosforo.','.$magnesio.','.$colesterol.','.$trigliceridos.','.$lipidos.','.$liporpoteinas.','.$densidad_hdl_ldl.','.$proteinas_tot.','.$tgo.','.$tgp.','.$bilirrubina.','.$fosfatasa_alcalina.','.$amilasa.','.$lipasa.','.$ldh.','.$cpk;
///ENDOCRINOLOGIA
$t3 = $_POST['t3'];
$t4 = $_POST['t4'];
$tsh = $_POST['tsh'];
$hormona_crecimiento = $_POST['hormona_crecimiento'];
$hormona_paratiroidea = $_POST['hormona_paratiroidea'];
$c_terminal = $_POST['c_terminal'];
$progesterona  = $_POST['progesterona'];
$estradiol = $_POST['estradiol'];
$testosterona = $_POST['testosterona'];
$lh = $_POST['lh'];
$fsh = $_POST['fsh'];
$prolactina = $_POST['prolactina'];

$endocrinologia = $t3.','.$t4.','.$tsh.','.$hormona_crecimiento.','.$hormona_paratiroidea.','.$c_terminal.','.$progesterona.','.$estradiol.','.$testosterona.','.$lh.','.$fsh.','.$prolactina;  

///INMUNOLOGIA
$ant_febriles = $_POST['ant_febriles'];              
$antiestreptolisima = $_POST['antiestreptolisima'];                  
$prot_c_reactiva = $_POST['rot_c_reactiva'];              
$latex_ra = $_POST['latex_ra'];              
$latex_le = $_POST['latex_le'];              
$vdrl = $_POST['vdrl'];              
$fta_abs = $_POST['fta_abs'];              
$hiv = $_POST['hiv'];              
$gravindex = $_POST['gravindex'];              
$embarazo_sangre = $_POST['embarazo_sangre'];                  
$anti_rh = $_POST['anti_rh'];              
$hepatitis_c = $_POST['hepatitis_c'];              
$antinucleares = $_POST['antinucleares'];              
$anti_dna = $_POST['anti_dna'];              
$lupus = $_POST['lupus'];              
$anticardiolipinas  = $_POST['anticardiolipinas'];                  
$toxo_lgm = $_POST['toxo_lgm'];              
$toxo_lgg = $_POST['toxo_lgg'];              
$psa = $_POST['psa'];              
$helico_sangre = $_POST['helico_sangre'];              
$helico_heces = $_POST['elico_heces'];               

$inmunologia = $ant_febriles.','.$antiestreptolisima.','.$prot_c_reactiva.','.$latex_ra.','.$latex_le.','.$vdrl.','.$fta_abs.','.$hiv.','.$gravindex.','.$embarazo_sangre.','.$anti_rh.','.$hepatitis_c.','.$antinucleares.','.$anti_dna.','.$lupus.','.$anticardiolipinas.','.$toxo_lgm.','.$toxo_lgg.','.$psa.','.$helico_sangre.','.$helico_heces; 
///HECES
$gene_heces = $_POST['gene_heces'];                    
$sangre_oculta = $_POST['sangre_oculta'];                 
$grasa_heces = $_POST['grasa_heces'];                   
$azul_metileno_heces = $_POST['azul_metileno_heces'];           
$sust_reducoras = $_POST['sust_reducoras'];                

$heces = $gene_heces.','.$sangre_oculta.','.$grasa_heces.','.$azul_metileno_heces.','.$sust_reducoras;
///ORINA
$gene_orina = $_POST['gene_orina'];
$prot_orina = $_POST['prot_orina'];
$prot_orina_24h = $_POST['prot_orina_24h'];

$orina = $gene_orina.','.$prot_orina.','.$prot_orina_24h;
///PERFIL PRENATAL

  $hemograma_pre = $_POST['hemograma_pre'];                
  $tipeo_sanguineo = $_POST['tipeo_sanguineo'];              
  $glucosa = $_POST['glucosa'];                      
  $vdrl_pre = $_POST['vdrl_pre'];                     
  $vih = $_POST['vih'];                          
  $toxo_lgm_pre = $_POST['toxo_lgm_pre'];                 
  $toxo_lgg_pre = $_POST['toxo_lgg_pre'];                 
  $urocultivo = $_POST['urocultivo'];                   

$perfil_prenatal = $hemograma_pre.','.$tipeo_sanguineo.','.$glucosa.','.$vdrl_pre.','.$vih.','.$toxo_lgm_pre.','.$toxo_lgg_pre.','.$urocultivo;

///BACTERIOLOGIA
$gram = $_POST['gram'];                        
$frotis_faringeo = $_POST['frotis_faringeo'];             
$cultivo = $_POST['cultivo'];                     
$hemocultivo = $_POST['hemocultivo'];                 
$urocultivo_bac = $_POST['urocultivo_bac'];              
$coprocultivo = $_POST['coprocultivo'];                
$hongos_oh = $_POST['hongos_oh'];                   
$cultivo_hongos = $_POST['cultivo_hongos'];              
$sec_vaginal = $_POST['sec_vaginal'];                 

$bacteriologia = $gram.','.$frotis_faringeo.','.$cultivo.','.$hemocultivo.','.$urocultivo_bac.','.$coprocultivo.','.$hongos_oh.','.$cultivo_hongos.','.$sec_vaginal;

///VARIOS Y OTROS
$espermograma = $_POST['espermograma'];   
$otros_examenes = $_POST['otros_examenes'];

    mysqli_query($conexion,"INSERT INTO t_examenes(fk_consulta,hematologia,quimica,endocrinologia,inmunologia,heces,orina,perfil_prenatal,bacteriologia,varios,otros) VALUES ('$consulta','$hematologia','$quimica','$endocrinologia','$inmunologia','$heces','$orina','$perfil_prenatal','$bacteriologia','$espermograma','$otros_examenes')");     
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
         