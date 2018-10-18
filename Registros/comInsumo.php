
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
    ?>
    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <div class="container-fluid">
        <div class="signup__container">
  <div class="container__child signup__thumbnail">
    <div class="thumbnail__logo">
      
      <h2 class="heading--secondary">Registro de compra</h2>
      <form>

        <div class="row mb-12"> 

        <div class="col-lg-3">
         <label style="color: black">Factura #<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

       <div class="col-lg-4">
      <label style="color: black">Fecha</label>
        <div class="input-group">
      <input type="text" class="form-control mydatepicker" name="fecha" id="fecha" placeholder="Ingrese">
       <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       </div>
        </div>
        </div>

        <div class="col-lg-4">
         <label style="color: black">Proveedor<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div> 
       </div>
           </div>

           <div class="col-lg-3">
         <label style="color: black">Insumo<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

      <div class="col-lg-4">
      <label style="color: black">Fecha de Caducidad</label>
        <div class="input-group">
      <input type="text" class="form-control mydatepicker" name="fecha" id="fecha" placeholder="Ingrese">
       <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       </div>
        </div>
        </div>

        <div class="col-lg-2">
         <label style="color: black">Cantidad<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

           <div class="col-lg-2">
         <label style="color: black">TOTAL<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="Cpaquete" name="Cpaquete" value="" required>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
        </div> 
       </div>
           </div>

           <div class="m-t-lg">
        <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Agregar" />
          </li>
          
        </ul>
      </div>

    </div>
      </form>
    </div>
    <div class="thumbnail__content text-center">
      
      
    </div>
    <div class="thumbnail__links">
      <ul class="list-inline m-b-0 text-center">
        
        <table id="tabla" >
                          <thead>
                            <tr>
                              <th>Código</th> 
                              <th>Proveedor</th>
                              <th>Insumo</th> 
                              <th>Cant</th>
                              <th>Costo</th>
                              <th>Sub Total</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>BL281</td>
                              <td>La. Lopez</td>
                              <td>Baja lenguas</td>
                              <td>15</td>
                              <td>$22.37</td>
                              <td>$335.55</td>
                              <td>---</td>
                            </tr>
                           
                            
                          </tbody>
                        </table>
      </ul>
    </div>
    <div class="signup__overlay"></div>
  </div>

  <div class="container__child signup__form">
   
     <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      <th><div>Código</div></th>
      <th><div>Nombre</div></th>
      
      <th><div></div></th>
    </thead>
    <tbody>
      <tr>
        <td>AH754</td>
        <td>Baja lengua</td>
        
      </tr>

      <tr>
        <td>AH754</td>
        <td>Gel antibacterial</td>
        
      </tr>

      <tr>
        <td>MY843</td>
        <td>Guantes</td>
        
      </tr>
      
    </tbody>
  </table>
  </div>

  <div class="col-lg-12">
          <div class="input-group">                         
          <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Buscar.." class="form-control">
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div> 
       </div>
           </div>
      
      
  </div>
</div>

          </div>


            <!-- ============================================================== --> 

            <?php
            include_once '../plantilla/pie.php';

//        ?>

            <script type="text/javascript">
                function totalPrecio(){
        var Cpaquete=document.getElementById("Cpaquete").value;
        var precio=document.getElementById("precioPa").value;
        var calculo=Cpaquete*precio;
        document.f1.Tpagar.value =calculo;
                }
                </script>
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
       
        