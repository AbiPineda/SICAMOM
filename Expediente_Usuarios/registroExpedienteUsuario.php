    <?php

    include_once '../plantilla/cabecera.php';
    include_once '../plantilla/menu.php';
    include_once '../plantilla/menu_lateral.php';
     $modi1 = $_GET['ir2'];
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
            <div class="card" style="background: rgba(0, 101, 191,0.6)">        
                <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Registro de Expediente | Datos generales</h3>
                    <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                    <form action="" id="f1" name="f1" method="post" class="form-register" >
                          <input type="hidden" name="tirar" value="<?php echo $modi1; ?>" id="pase"/>
                        <input type="hidden" name="tirar" id="pase"/>
                        <div>
                                <br/>
                            <section>
                                                                    <?php
                                    include_once '../Conexion/conexion.php';
                                    $sacar = mysqli_query($conexion, "SELECT*FROM t_paciente WHERE id_paciente='$modi1'");
                                    while ($fila = mysqli_fetch_array($sacar)) {
                                        $modificar = $fila['id_paciente'];
                                        $ape = $fila['pac_capellidos'];
                                        $nom = $fila['pac_cnombre'];
                                        $dui=$fila['pac_cdui'];                      
                                        ?>

                                                                                                    
                                <div class="row mb-12">
                                            <div class="col-lg-2">
                                            <label style="color: white">Código<small class="text-muted" ></small></label>  
                                             <div class="input-group">
                                            <input type="text" class="form-control" id="fname"  name="codigo" placeholder="Código"  readonly="readonly">
                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                        </div>

                                        </div>
                                    <div class="col-lg-4">
                                        <label style="color: white">Nombres <small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombreExpe"  class="form-control" id="nombreCom" placeholder="Ingrese nombres" autocomplete="off" value="<?php echo $nom; ?>" required onkeypress="return soloLetras(event);" class="mayusculas" maxlength="30"  readonly="readonly">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="color: white">Apellidos<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="apellidoExpe"  class="form-control" id="apellido" placeholder="Ingrese apellidos" autocomplete="off" value="<?php echo $ape; ?>" required onkeypress="return soloLetras(event);" class="mayusculas" maxlength="30" autofocus  readonly="readonly">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>                                    
                                    </div>
                                  <div class="col-lg-4">
                                    <?php
                                        include_once '../Conexion/conexion.php';
                                        $sacar = mysqli_query($conexion, "SELECT*FROM t_medico");
                                    ?>
                                    <label style="color: white">Doctor que atiende<small class="text-muted"></small></label>
                                    <select class="custom-select" name="doctorExpe" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <?php 
                                        while($row = mysqli_fetch_array($sacar)) 
                                        { 
                                        ?>
                                        <option value="<?php echo $row['med_cnombre'];?>"><?php echo $row['med_cnombre'];?></option>
                                       <?php 
                                        } 
                                        ?> 
                                    </select>
                                 </div>
                                    <br/>
                                                                  <div class="col-lg-3">
                                        <label style="color: white">Alergias<small class="text-muted"></small></label>
         <div class="input-group">
                                            <input type="text" name="alergias"  class="form-control" id="fnamep" placeholder="" autocomplete="off" value="" onkeypress="return soloLetras(event);" class="mayusculas" maxlength="30">  
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br/><br>
                                    <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar" ></div>
                                    </div>
                                    <div class="col-lg-12">
                                            <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                                <input type="button" class="btn btn-info" name="" id="su"  value="cola" onclick="location.href='../Expediente_Usuarios/verColaUsuario.php'" ></div>
                                    </div>   
                                  </div>
                                    <?php
                                }
                                ?>
                        </section>

                </div>

                </form>

            </div>
  <div class="row mb-12">   
             <div class="wrap">
                <div class="col-lg-12">
              <script src="../html/js/jquery.min.js" ></script>
            <script src="../html/js/buscaresc.js"></script>
       
         <div class="search">
           <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>

         </div>
                
      </div>
       </div>
    </div>
            <!--Fin Búsqueda-->

    <div class="card" >
      <h3 class="card-title">Buscar Paciente | Datos generales</h3>
      <div class="col-md-12">

          <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
     <th><div>N° de Expediente</div></th> 
     <th><div>Paciente</div></th>
     <th><div>Doctor que atiende</div></th>
     <th><div>Accion</div></th>
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
<?php
date_default_timezone_set('America/El_Salvador');
$d = date("d");
$m = date("m");
$y = date("Y");

        $sacar = mysqli_query($conexion, "SELECT*FROM t_medico, t_paciente, t_expediente WHERE fk_medico=idMedico AND fk_paciente=id_paciente");
            while ($fila = mysqli_fetch_array($sacar)) {
                   $modificar1=$fila['id_expediente'];
                 $codigo=$fila['codigo'];
                 $ape=$fila['pac_capellidos'];  
                 $nom=$fila['pac_cnombre'];  
                 $apedoc=$fila['med_capellidos'];  
                 $nomdoc=$fila['med_cnombre'];
                   
                 // $fe=$fila['pac_ffecha_nac']; 
               // $partes = explode('-', $fe);
              //  $_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}"; 
             
        ?>
      <tr>
        <th scope="row"><?php echo $codigo;?></th>
        <th scope="row"><?php echo $nom . " " . $ape;?></th>
        <td data-title="Worldwide Gross" data-type="currency"><?php echo $nomdoc . " " . $apedoc;?></td>
        <td class="text"><a href="../Expediente_Usuarios/controlConsultaDiariaUsuario.php?ir2=<?php echo $modificar1; ?>" class="btn btn-success fas fa-edit">Cola</a>
        </td>

       <?php  }?>
      
      </tr>

    </tbody>
  </table>

  </div> <!-- Div scroll-window -->
</div> <!-- Div scroll-window-wrapper-->


</div> <!-- Div bodywrap -->

  </div> <!-- Div col-md-12 -->
  </div> <!-- Div card -->


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
         $codigo = $_REQUEST['codigo'];
        $nombre_pac = $_REQUEST['nombreExpe'];
        $apellido = $_REQUEST['apellidoExpe'];
        $dui = $_REQUEST['duiExpe'];
        $doctor= $_REQUEST['doctorExpe'];
        $alergias = $_REQUEST['alergias'];
                     

    $verificar_insert = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_cnombre='$nombre_pac'");
    $verificar_insert1 = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_capellidos='$apellido'");
    $verificar_insert2 = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_cdui='$dui'");

     
    if (mysqli_num_rows($verificar_insert) > 0 && mysqli_num_rows($verificar_insert1) > 0 && mysqli_num_rows($verificar_insert2) > 0 ) {
       $sacar = mysqli_query($conexion,"SELECT id_paciente FROM t_paciente WHERE pac_cnombre='$nombre_pac'");
                while ($fila = mysqli_fetch_array($sacar)) {
                      $paciente=$fila['id_paciente']; 
      $sacar1 = mysqli_query($conexion,"SELECT idMedico FROM t_medico WHERE med_cnombre='$doctor'");
                while ($fila1 = mysqli_fetch_array($sacar1)) {
                      $medico=$fila1['idMedico']; 
      mysqli_query($conexion, "INSERT INTO t_expediente(fk_medico,fk_paciente,codigo,fecha_registro,alergias) VALUES('$medico','$paciente','$codigo','$y1-$m1-$d1','$alergias')");
           echo '<script>swal({
                        title: "Registro",
                        text: "Guardado!",
                        type: "success",
                        confirmButtonText: "Aceptar ok",
                        closeOnConfirm: false
                    },
                    function () {
                        location.href="../Expediente_Usuarios/verExpediente.php";
                        
                    });</script>';
                }}}
    else
    {
             echo '<script>swal({
                        title: "Alerta",
                        text: "El paciente no se encuentra Registrado",
                        type: "warning",
                        confirmButtonText: "Aceptar",
                        closeOnConfirm: false
                    },
                    function () {
                        location.href="../Expediente_Usuarios/expedienteUsuario.php";
                        
                    });</script>';
    }
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
                  //  value = document.getElementsById("nombreCom");
                   $("#apellido").focusout(function () {
                       var value = $(this).val();

                  //      $cod = value.substr(0, 3).toUpperCase();
                   $cod = value.substr(0, 4).toUpperCase();
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