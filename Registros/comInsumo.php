
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';
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
            <?php
            include_once '../Conexion/conexion.php';
            $pro = mysqli_query($conexion, "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'clinica' AND TABLE_NAME = 't_compra'");
            $row = $pro->fetch_array();
            ?>
         <label style="color: black">Factura #<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="factura" name="factura" value="<?php echo $row['AUTO_INCREMENT'] ?>" disabled>
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

       <div class="col-lg-4">
           <?php
           date_default_timezone_set('America/El_Salvador');
           ?>
      <label style="color: black">Fecha</label>
        <div class="input-group">
      <input type="text" class="form-control" aria-describedby="basic-addon1" id="FeActual" value="<?=date('d/m/y g:ia');?>" disabled>
       <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
       </div>
        </div>
        </div>

        <div class="col-lg-4">
         <label style="color: black">Proveedor<small class="text-muted" ></small></label>
         <select class="custom-select" name="proveedor" id="proveedor">
                                             <?php
                                          include_once '../Conexion/conexion.php';
                                          $pro= mysqli_query($conexion,"SELECT*from t_proveedor WHERE estado=1");
                              ?>
                            <option>Proveedor</option>
                            <?php
                             while ($row = mysqli_fetch_array($pro)) {
                                         $prove=$row['id_proveedor'];
                                           echo '<option value='."$row[0]".'>'.$row['1'].'</option>';
                                    }
                                    ?>
                                        </select>
           </div>

           <div class="col-lg-4">
         <label style="color: black">Insumo<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="insumo" name="insumo">
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

           <div class="col-lg-2">
         <label style="color: black">Cantidad<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="insumo" name="insumo">
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

      <div class="col-lg-4">
          <?php
           date_default_timezone_set('America/El_Salvador');
           ?>
          <label style="color: black">Fecha de Caducidad<small class="text-muted"></small></label>
          <div class="input-group">
              <!--<input type="date" name="fecha" class="form-control mydatepicker" placeholder="Ingrese fecha de nacimiento">-->
              <input type="date" name="user_date" class="form-control" id="user_date" max="2020-01-01" min="<?=date('d/m/y g:ia');?>" onChange="javascript:calcularEdad();"/>
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
        
        <table id="tablaCompra" >
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
  </div>

  <div class="container__child signup__form">
   <div class="wrap">
              <script src="../html/js/jquery.min.js" ></script>
            <script src="../html/js/buscaresc.js"></script>
         <div class="search" center>
            <input type="text" name="buscar" id="filtrar" class="searchTerm" placeholder="Que está buscando?">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
      </div>
      
     <div class="table-responsive">
         <table class="table table-striped" id="tabla">
    <thead>
      <th><div>Código</div></th>
      <th><div>Nombre</div></th>
      
     <tbody class="buscar"> 
     <br>
    <?php
        $sacar1 = mysqli_query($conexion, "SELECT * FROM t_insumo WHERE estado=1");
            while ($fila = mysqli_fetch_array($sacar1)) {
                $cod=$fila['codigo'];
                $nom=$fila['ins_cnombre_comercial'];  
                      
        ?> 
        <tr>
                <td data-title="Relea"><?php echo $cod; ?></td>
                <th scope="row"><?php echo $nom; ?></th>
                
                </td>

       <?php  }?>
      
      </tr>

    </tbody>  
    </thead>
    
  </table>
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
 
                <script>
            var table = document.getElementById('tabla');
            for(var i = 1; i<table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                    document.getElementById("insumo").value = this.cells[1].innerHTML;
               };
            }
            </script>
        