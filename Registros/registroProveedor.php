<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';

//sacar usuarios para bitacora

include_once '../Conexion/conexion.php';
$usuario = mysqli_query($conexion, "SELECT*FROM t_usuario");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id_usuario'];
    $NombreUsuario = $row['usu_cusuario'];
}
//sacar usuarios para bitacora

?>

<link rel="stylesheet" href="../js/toastr.min.css">
    <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
              <div class="col-md-12 col-md-pull-12" align="right">
                      <a href='#'  data-toggle="modal" data-target='#myModal'><button type='button' class='btn btn-info btn-circle btn-lg'><i class="fa fa-question fa-2"></i></button></a>
                    </div>
                    <br>

                    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ayuda | Registro de Proveedor.</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
<iframe src="https://issuu.com/abitho/docs/registro_de_proveedor/1?ff" 
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
                        <h3 class="card-title" style="color: white">Registro de Proveedor | Datos generales</h3>
                        <form id="example-form" action="" class="m-t-40" method="POST">
                            <div>
                                
                                <section>

                                     <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label style="color: white">Nombre de Empresa<small class="text-muted"></small></label>
                                     <div class="input-group">
                                         <input type="text" name="nombre" onkeyup="campos()" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre"  onkeypress="return soloLetras(event)"  >  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                   <div class="col-lg-4">
                                     <label style="color: white">Nombre del vendedor<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="nombreRes" onkeyup="campos()" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre" onkeypress="return soloLetras(event)">  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div> 
                                </div>                                    
                                    </div>

                                    <div class="col-lg-4">
                                   <label style="color: white">Dirección<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" onkeyup="campos()" class="form-control" autocomplete="off" placeholder="Ingrese dirección" id="direccion" name="direccion" onkeypress="return sinCaracterEspecial(event)">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>                              
                                    </div>


                                    <div class="col-lg-4">
                                    <label style="padding-top: 12px; color: white">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                    <div class="input-group">
                                        <input type="text" name="telefono"  class="form-control phone-inputmask2" id="tel" placeholder="Ingrese número telefónico" autocomplete="off" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div> 
                                    
                                </div>
                                         <br>
                                    

                                         </div>
                                     <label style="color: white">*Observación: El botón "Guardar" se habilitará hasta que todos los campos sean completados</label>
                                    <div class="col-lg-12">

                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                            <button type="submit" class="btn btn-info" name="btnGuardar" id="boton" >Guardar </button>
                                        </div>
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                            <button type="reset" class="btn btn-info" name="Cancelar" id="Cancelar">Cancelar </button>
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
    $nombreRes = $_REQUEST['nombreRes'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    
    $esta=1;
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    
          
     $verificar_insert = mysqli_query($conexion, "SELECT * FROM t_proveedor WHERE pro_cnombre_empresa='$nombre'");
     $verificar_insert2 = mysqli_query($conexion, "SELECT * FROM t_proveedor WHERE pro_cnombre_responsable='$nombreRes'");
         $verificar_insert3 = mysqli_query($conexion, "SELECT * FROM t_proveedor WHERE pro_ctelefono='$telefono'");
        if (mysqli_num_rows($verificar_insert) > 0 || mysqli_num_rows($verificar_insert2) > 0 || mysqli_num_rows($verificar_insert3) > 0 ) {
            echo '<script>swal("Empresa, Vendedor o Teléfono ya estan Registrados")
             .then((value) => {
              swal(`Verifique los datos`);
                });</script>';       
}
else {    
 mysqli_query($conexion, "INSERT INTO t_proveedor(pro_cnombre_empresa,pro_cnombre_responsable,pro_cdireccion,pro_ctelefono,estado) VALUES('$nombre','$nombreRes','$direccion','$telefono','$esta')"); 
    
           echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroProveedor.php";
                    
                });</script>';
           
           //bitacora
        ini_set('date.timezone', 'America/El_Salvador');
        $hora = date("H:i:s");
        mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
                . " VALUES('$id','$NombreUsuario','Registro de Proveedor',now(),'$hora')");
        //bitacora
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
    function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
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
  document.getElementById("boton").disabled = false;
  
  }else{
     document.getElementById("boton").disabled = true;  
  }
}
</script>
<script>
            function soloLetras(e) {
                key = e.keyCode || e.which;
                teclado = String.fromCharCode(key).toLowerCase();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                especiales = "8-37-38-46-164";
                teclado_especial = false;
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true;
                        break;
                    }
                }
                if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                }
            }
        </script>

        <script>
            function sinCaracterEspecial(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                //Tecla de retroceso para borrar, siempre la permite
                if (tecla == 8) {
                    return true;
                }
                // Patron de entrada, en este caso solo acepta numeros, letras, espacio.
                patron = /[A-Za-z0-9 ]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>
        