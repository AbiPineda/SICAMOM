
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
$codigo1 = '';


//sacar usuarios para bitacora

include_once '../Conexion/conexion.php';
$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora

    ?>
    
    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



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
        <h4 class="modal-title" id="myModalLabel">Ayuda | Registro de insumo.</h4> 
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
<iframe src="https://issuu.com/abitho/docs/registrar_insumo_/1?ff" 
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
                    
                        <div class="row">
                  <div class="col-md-9 col-md-push-3">
                    <h3 class="card-title" style="color: white">Registro de Insumos | Datos generales</h3></div>
                  

                     <!-- MODAL -->
  <div class="modal fade" id="confirm-imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><font font font font color="black"></font></h3> 
                </div>
             

               
                
            </div>
        </div> 
    </div>
</div>


                    <form id="example-form" action="" class="m-t-40" method="POST" autocomplete="off">
                        <div>
                            <section>

                                <div class="row mb-12"> 
                                    <div class="col-lg-2">
                                        <label style="color: white">Código<small class="text-muted" ></small></label>  
                                         <div class="input-group">
                                        <input type="text" class="form-control" id="fname"  name="codigo" placeholder="Código">
                                         <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                        </div>
                                    </div>

                                    </div>

                                    <div class="col-lg-3">
                                        <label style="color: white">Nombre Comercial<small class="text-muted" ></small></label>   
                                         <div class="input-group">                                  
                                        <input type="text" onkeyup="campos()" class="form-control" id="nombreCom"  required name="nombreCom" placeholder="Nombre del insumo" onkeypress="return soloLetras(event)"  >
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-notes-medical"></i></span>
                                        </div>
                                        </div>                                     
                                    </div>


                                    <div class="col-lg-3">
                                        <label style="color: white">Marca<small class="text-muted" ></small></label>  
                                        <div class="input-group">                                 
                                        <input type="text" onkeyup="campos()" class="form-control" id="lname" name="marca" placeholder="Marca del insumo" onkeypress="return sinCaracterEspecial(event)" value="" required>       
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-registered"></i></span>
                                        </div>
                                        </div>                              
                                    </div>

                                    <div class="col-lg-4">
                                         
                                        <label style="color: white">Descripción<small class="text-muted" ></small></label>
                                        <div class="input-group">                                    
                                        <input type="text" onkeyup="campos()" class="form-control" id="lname" name="descripcion" placeholder="Descripción de insumo" onkeypress="return sinCaracterEspecial(event)" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                        </div>
                                        </div>  
                                        
                                    </div>
                                    <div class="col-lg-4">
                                         
                                        <label style="color: white">Presentación<small class="text-muted" ></small></label>
                                        <div class="input-group">                                    
                                        <input type="text" onkeyup="campos()" class="form-control" id="lname" name="presentacion" placeholder="Presentación de insumo" onkeypress="return sinCaracterEspecial(event)" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                        </div>
                                        </div>  
                                        
                                    </div>
                                    <div class="col-lg-4">
                                         
                                        <label style="color: white">Unidades<small class="text-muted" ></small></label>
                                        <div class="input-group">                                    
                                            <input type="number" min="0" onkeyup="campos()" class="form-control" id="lname" name="unidad" placeholder="Cantidad de Unidades" onkeypress="return sinCaracterEspecial(event)" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                        </div>
                                        </div>  
                                        
                                    </div>
                                    <div class="col-lg-4">
                                         
                                        <label style="color: white">Stock Minimo por paquete<small class="text-muted" ></small></label>
                                        <div class="input-group">                                    
                                            <input type="number" min="0" onkeyup="campos()" class="form-control" id="lname" name="minimo" placeholder="Cantidad de Stock Minimo" onkeypress="return sinCaracterEspecial(event)" value="" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                        </div>
                                        </div>  
                                        
                                    </div>
                                     <div class="col-lg-4">
                                         <label style="padding-top: 12px; color: white" >Tipo de Insumo<small class="text-muted"></small></label>
                                        <select class="custom-select" name="tipoInsumo" style="width: 100%; height:36px;">
                                            <option>Seleccionar</option>
                                            <option value="Contable">Contable</option>
                                            <option value="NoContable">No Contable</option>
                                        </select> 
                                         
                                        
                                    </div>
                                   
                                    <br>
                                    <label style="color: white">*Observación: El botón "Guardar" se habilitará hasta que todos los campos sean completados</label>
                                    <div class="col-lg-12">

                                        <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                                            <button type="submit" class="btn btn-info" name="btnGuardar" id="boton">Guardar </button>
                                        </div>
                                        <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                            <button type="reset" class="btn btn-info" name="Cancelar" id="Cancelar">Cancelar </button>
                                        </div>

                                    </div> 
                                </div>
                        </div>
                    </form>
                </div>

            </div>




            <!-- ============================================================== --> 

            <?php
            if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';
    $codigo = $_REQUEST['codigo'];
    $nombre = $_REQUEST['nombreCom'];
    $marca = $_REQUEST['marca'];
    $descripcion = $_REQUEST['descripcion'];
    $presentacion = $_REQUEST['presentacion'];
    $unidad = $_REQUEST['unidad'];
    $minimo = $_REQUEST['minimo'];
    $tInsumo = $_REQUEST['tipoInsumo'];
    

    $esta = 1;
   

    
    mysqli_query($conexion, "INSERT INTO t_insumo(ins_cnombre_comercial,ins_cmarca,ins_cdescripcion,estado,codigo,presentacion,unidad,minimo,tipo) VALUES('$nombre','$marca','$descripcion','$esta','$codigo','$presentacion','$unidad','$minimo','$tInsumo')");

    echo '<script>swal({
                    title: "Exito",
                    text: "Insumo Guardado!",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function () {
                    location.href="registroInsumo.php";
                    
                });</script>';

     //bitacora
        mb_internal_encoding("UTF-8");
        ini_set('date.timezone', 'America/El_Salvador');
        $hora = date("H:i:s");
        mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
                . " VALUES('$id','$NombreUsuario','Registro de Insumo Médico',now(),'$hora')");
        //bitacora  

  
} 



            include_once '../plantilla/pie.php';
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
        </script>
        <script>
            $(function () {
                $("#tipo").change(function () {
                    if ($(this).val() === "No contable") {
                        $("#unidad").prop("disabled", true);
                    } else {
                        $("#unidad").prop("disabled", false);
                    }
                });
            });
        </script>
        <script>
            $(function () {
                $("#tipoCaducidad").change(function () {
                    if ($(this).val() === "1") {
                        $("#fecha").prop("disabled", true);
                    } else {
                        $("#fecha").prop("disabled", false);
                    }
                });
            });
        </script>    

        <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
        <script>
            $(document).ready(function () {
                $("#nombreCom").keyup(function () {

                    var value = $(this).val();
                    $cod = value.substr(0, 3).toUpperCase();
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