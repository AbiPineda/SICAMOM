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

  <div>
        <div class="row" align="center">
                                    <div class="col-md-12">
                                                 <div class="row mb-7" style="float: right; margin-right: 300px; margin-top: 15px;">
                                                  <button type="button" id="su" name="recetas" onclick="location.href='../Expediente_Admin/expedienteAdmin.php'" >Recetas</button>
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
 <div class="col-lg-12">
                                                <div class="row mb-12" style="float: right; margin-right: 20px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="Finalizar" onclick="location.href='../Expediente_Admin/controlConsultaDiariaAdmin.php'" ></div>
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
     