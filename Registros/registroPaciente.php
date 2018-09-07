<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
?>

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

            // cogemos los valores actuales
            var fecha_hoy = new Date();
            var ahora_ano = fecha_hoy.getYear();
            var ahora_mes = fecha_hoy.getMonth() + 1;
            var ahora_dia = fecha_hoy.getDate();

            // realizamos el calculo
            var edad = (ahora_ano + 1900) - ano;
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
            //document.f1.inp.disabled=true;
            document.f1.inp.value = edad;

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<div class="page-wrapper" style="height: 671px;">

    <div class="container-fluid">
        <div class="card" style="background: rgba(0, 101, 191,0.3)">        
            <div class="card-body wizard-content">
                <h3 class="card-title">Registro Paciente | Datos generales</h3>
                <!--<form id="example-form" action="registroPaciente.php" class="m-t-40" method="POST">-->
                <form action="" id="f1" name="f1" method="post" class="form-register" >
                    <input type="hidden" name="tirar" id="pase"/>
                    <div>

                        <section>
                            <div class="row mb-12">

                                <div class="col-lg-4">
                                    <label>Nombre<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="nombre" class="form-control" id="fnamep" placeholder="Ingrese nombre" autocomplete="off" value="" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div> 

                                </div>

                                <div class="col-lg-3">
                                    <label>Apellido<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <input type="text" name="apellido" class="form-control" id="fnamep" placeholder="Ingrese apellido" autocomplete="off" value="" required onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30">  
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="col-lg-3">
                                    <label>Fecha de nacimiento<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <!--<input type="date" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">-->
                                        <input type="date" name="user_date" class="form-control" id="user_date" max="2015-06-01" min="1947-01-02" onChange="javascript:calcularEdad();"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                    </div> 
                                </div>

                                <div class="col-lg-2">
                                    <label>Edad<small class="text-muted"></small></label>
                                    <div class="input-group">
                                        <!--<input type="date" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">-->
                                        <input name="inp" id="inp" class="form-control" onChange="javascript:desabilitar();"> 
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>


                                    </div> 
                                </div>


                                <div class="col-lg-3">
                                    <label style="padding-top: 12px;">DUI<small class="text-muted"> 99999999-9</small></label>
                                    <div class="input-group">
                                        <input type="text" name="dui" class="form-control phone-inputmask" id="dui" placeholder="Ingrese DUI" autocomplete="off" value="" required> 
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                    </div> 
                                     
                                </div>

                                <div class="col-lg-3">
                                    <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                    <div class="input-group">
                                        <input type="text" name="telefono" class="form-control phone-inputmask2" id="tel" placeholder="Ingrese número telefónico" autocomplete="off" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div> 
                                    
                                </div>

                                <div class="col-lg-3">
                                    <label style="padding-top: 12px;" >Tipo de consulta<small class="text-muted"></small></label>
                                    <select class="custom-select" name="tipo" style="width: 100%; height:36px;">
                                        <option>Seleccionar</option>
                                        <option value="Consulta General">Consulta general</option>
                                        <option value="Control de Embarazo">Control de embarazo</option>
                                    </select>
                                    <div class="row mb-12" style="float: left; margin-left: 400px; margin-top: -30px;">
                                        <input type="submit" class="btn btn-info" name="btnEnviar" id="su"  value="Guardar">
                                    </div>

                                    <div class="row mb-12" style="float: left;margin-left: 300px; margin-top: -35px;">
                                        <button type="reset" class="btn btn-info" name="nameCancelar">Cancelar </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </section>

            </div>

            </form>

        </div>



    </div>
</div>
</div>


<?php

if (isset($_REQUEST['tirar'])) {
    include_once '../Conexion/conexion.php';

    $nombre_pac = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $dui = $_REQUEST['dui'];
    $telefono = $_REQUEST['telefono'];
    $fecha = $_REQUEST['user_date'];
    $tipo = $_REQUEST['tipo'];
    $edad = $_REQUEST['inp'];
    $esta=1;

    if ($edad <= 17) { //si es menor de edad entonce que levante el modal con JavaScript
        mysqli_query($conexion, "INSERT INTO t_paciente(pac_cnombre,pac_capellidos,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta,estado) VALUES('$nombre_pac','$apellido','$dui','$telefono','$fecha','$tipo','$esta')");
        echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="modal.php";
                    
                });</script>';
        //sigue la sentencia php para validar sino es menor de edad    
    } else { // como no es menor de edad solo recarcargara la pagina
        $verificar_insert = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_cdui='$dui'");
         $verificar_insert2 = mysqli_query($conexion, "SELECT * FROM t_paciente WHERE pac_ctelefono='$telefono'");
        if (mysqli_num_rows($verificar_insert) > 0 || mysqli_num_rows($verificar_insert2) > 0 ) {
            echo '<script>swal("Dui o Telefono ya existen")
             .then((value) => {
              swal(`Verifique los datos`);
                });</script>';
        }else {
            mysqli_query($conexion, "INSERT INTO t_paciente(pac_cnombre,pac_capellidos,pac_cdui,pac_ctelefono,pac_ffecha_nac,pac_ctipo_consulta,estado) VALUES('$nombre_pac','$apellido','$dui','$telefono','$fecha','$tipo','$esta')");

            echo '<script>swal({
                    title: "Exito",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroPaciente.php";
                    
                });</script>';



            //fin
        }
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