<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $nombre = $_REQUEST['nombre'];
    $nombreRes = $_REQUEST['nombreRes'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];
    
    $esta=1;
    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    
           mysqli_query($conexion, "INSERT INTO t_proveedor(pro_cnombre_empresa,pro_cnombre_responsable,pro_cdireccion,pro_ctelefono,estado) VALUES('$nombre','$nombreRes','$direccion','$telefono','$esta')"); 
    
           echo '<script>swal({
                    title: "Registro",
                    text: "Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroInsumo.php";
                    
                });</script>';
           
}
else {

     ?>

<link rel="stylesheet" href="../js/toastr.min.css">
    <div class="page-wrapper" style="height: 671px;">
          
            <div class="container-fluid">
                 <div class="card" style="background: rgba(0, 101, 191,0.3)">
                      

                    <div class="card-body wizard-content">
                        <h3 class="card-title">Registro de Proveedor | Datos generales</h3>
                        <form id="example-form" action="" class="m-t-40" method="POST">
                            <div>
                                
                                <section>

                                     <div class="row mb-3">
                                    <div class="col-lg-4">
                                        <label>Nombre de Empresa<small class="text-muted"></small></label>
                                     <div class="input-group">
                                         <input type="text" name="nombre" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre"  value="" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required >  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div> 

                                    </div>

                                   <div class="col-lg-4">
                                     <label>Nombre del Responsable<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" name="nombreRes" class="form-control" autocomplete="off" id="fnamep" placeholder="Ingrese nombre" value="" onkeypress="return soloLetras(event);" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" class="mayusculas" maxlength="30" value="" required >  
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>                                    
                                    </div>

                                    <div class="col-lg-4">
                                   <label>Dirección<small class="text-muted"></small></label>
                                     <div class="input-group">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Ingrese dirección" id="direccion" name="direccion" value="" required >
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>                              
                                    </div>


                                    <div class="col-lg-4">
                                    <label style="padding-top: 12px;">Teléfono<small class="text-muted"> 9999-9999</small></label>
                                    <div class="input-group">
                                        <input type="text" name="telefono" class="form-control phone-inputmask2" id="tel" placeholder="Ingrese número telefónico" autocomplete="off" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div> 
                                </div> 
                                         <div class="col-lg-3">
                                          <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                              <button type="submit" class="btn btn-info" name="btnGuardar" id="boton">Guardar </button>
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
    
    include_once '../plantilla/pie.php';
    
    
}
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
