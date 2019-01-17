<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


//sacar usuarios para bitacora

include_once '../Conexion/conexion.php';
$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora
    ?>

    <link rel="stylesheet" href="../js/toastr.min.css">
    <div class="page-wrapper" style="height: 671px;">

        <div class="container-fluid">
            <div class="col-md-3 col-md-pull-9">
                      <a href='#'  data-toggle="modal" data-target='#myModal'><button type='button' class='btn btn-success'>Ayuda</button></a>
                    </div>
                    <br>

                    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ayuda | Registro de Medico.</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
<iframe src="https://issuu.com/abitho/docs/manualregistropaciente/1?ff" 
style="width:700px; height:500px;" frameborder="0"></iframe>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button>  --> 
      </div>
    </div>
  </div>
</div>
            <div class="card" style="background: rgba(0, 101, 191,0.6)">


                <div class="card-body wizard-content">
                    <h3 class="card-title" style="color: white">Registro de Usuario | Datos generales</h3>
                    <form id="FORMULARIO" action="" class="m-t-40" method="POST">
                        <div>

                            <section>

                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label style="color: white">Nombre<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" name="nombre" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre"  value="" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas"  value=""  >

                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>  
                                           </div>
                                         

                                    </div>

                                    <div class="col-lg-4">
                                        <label style="color: white">Apellido<small class="text-muted"></small></label>
                                       <div class="input-group">
                                            <input type="text" name="apellido" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese apellido" value="" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas"  value="" > 

                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                                    
                                           </div>                         
                                    </div>

                                    <div class="col-lg-4">
                                        <label style="color: white">Dirección<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Dirección" id="direccion" name="direccion" value=""  >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-map"></i></span>
                                            </div>
                                            </div>
                                                                    
                                    </div>


                                    <div class="col-lg-4">
                                        <label style="padding-top: 12px; color: white">Telefono<small class="text-muted"> </small></label>
                                         <div class="input-group">
                                             <input type="tel" name="telefono" class="form-control" autocomplete="off" id="phone-maske" placeholder="Telefono"  value=""  > 
                                            
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-phone "></i></span>
                                            </div>
                                            </div>
                                       
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <label style="padding-top: 12px; color: white">Especialidad<small class="text-muted"></small></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Especialidad" id="especialidad" name="especialidad" value=""  >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-stethoscope"></i></span>
                                            </div>
                                            </div>
                                                                    
                                    </div>

                                <div>
                                    <label style="color: white">*Observación: El botón "Guardar" se habilitará hasta que todos los campos sean completados</label>
                                    
                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                            <button type="submit" class="btn btn-info" name="btnGuardar" id="boton" >Guardar </button>
                                        </div>
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                            <button type="reset" class="btn btn-info" name="Cancelar" id="Cancelar">Cancelar </button>
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
    if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombre'];
    echo $nombre;
    $apellido = $_REQUEST['apellido'];
    $direccion = $_REQUEST['direccion'];
    $tele = $_REQUEST['telefono'];
    $especialidad= $_REQUEST['especialidad'];
    
        mysqli_query($conexion, "INSERT INTO t_medico(med_cnombre,med_capellidos,med_cespecialidad,direccion,telefono) VALUES('$nombre','$apellido','$especialidad','$direccion','$tele')");

        echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroMedico.php";
            });</script>';
        
        //bitacora
        ini_set('date.timezone', 'America/El_Salvador');
        $hora = date("H:i:s");
        mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
                . " VALUES('$id','$NombreUsuario','Registro de Usuario',now(),'$hora')");
        //bitacora
    

    //$sql = "INSERT INTO t_usuario(usu_cnombre,usu_capellido,usu_ccorreo,usu_cusuario,usu_ccontrasena,usu_ctipo_usuario) VALUES('$nombre','$apellido','$email','$nusuario','$contrasena','$tusuario')"; 


   
 } 
    
    include_once '../plantilla/pie.php';

?>
 <script>
        function Habilitar() {
            var camp1 = document.getElementById("campo1");
            var camp2 = document.getElementById("campo2");
            var boton = document.getElementById("boton")
            if (camp1.value != camp2.value) {
                boton.disabled = true;
            } else {
                boton.disabled = false;
            }
        }
    </script>

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
        function SoloNumeros(evt) {
            if (window.event) {//asignamos el valor de la tecla a keynum
                keynum = evt.keyCode; //IE
            }
            else {
                keynum = evt.which; //FF
            }
            //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
            if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>
    <script
        src="../js/toastr.min.js">
    </script>
    <script
        src="../js/jquery.min.js">
    </script>
<!--<script>
function campos(){
  var validado = true;
  elementos = document.getElementsByClassName("form-control");
  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
    validado = false
    }
  }
  if(validado){
  document.getElementById("boton").disabled = false;
  
  }else{
     document.getElementById("boton").disabled = true;  
  }
}
</script>-->