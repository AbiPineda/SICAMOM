
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';


if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';
    
//    $factura = $_REQUEST['factura'];
//    $feActual = $_REQUEST['FeActual'];
    $proveedor = $_REQUEST['proveedor'];
    echo $proveedor;
    $insumo = $_REQUEST['insumo'];
    $precio = $_REQUEST['precio'];
    $caducidad = $_REQUEST['caducidad'];
    $cantidad = $_REQUEST['cantidad'];
    
      Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();

    mysqli_query($conexion, "INSERT INTO t_compra(fk_proveedor,fk_insumo,fecha_caducidad,precio_unitario,cantidad) VALUES('$proveedor','$insumo','$caducidad','$precio','$cantidad')");
} else {

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
            //<?php
//            include_once '../Conexion/conexion.php';
//            $pro = mysqli_query($conexion, "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'clinica' AND TABLE_NAME = 't_compra'");
//            $row = $pro->fetch_array();
//            ?>
         <label style="color: black">Factura #<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="factura" name="factura" >
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
      <input type="text" class="form-control" aria-describedby="basic-addon1" id="FeActual" name="FeActual" value="<?=date('d/m/y g:ia');?>" disabled>
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
             $pro = mysqli_query($conexion, "SELECT*from t_proveedor WHERE estado=1");
             ?>
             <option>Proveedor</option>
             <?php
             while ($row = mysqli_fetch_array($pro)) {
                 $prove = $row['id_proveedor'];
                 echo '<option value=' . "$row[1]" . '>' . $row['1'] . '</option>';
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
         <label style="color: black">Precio<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="precio" name="precio">
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
              <input type="date" name="caducidad" class="form-control" id="caducidad" max="2020-01-01" min="<?=date('d/m/y g:ia');?>"/>
              <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>

          </div>
        </div>

        <div class="col-lg-2">
         <label style="color: black">Cantidad<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="cantidad" name="cantidad" value="">
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
        </div> 
       </div>
           </div>

           <div class="col-lg-2">
         <label style="color: black">TOTAL<small class="text-muted" ></small></label>
          <div class="input-group">                         
          <input type="text" class="form-control" id="total" name="total" value="" >
         <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
        </div> 
       </div>
           </div>
            
            <div class="col-lg-2">
         <div class="input-group">                         
              <input type="hidden" class="form-control" id="codInsumo" name="codInsumo" >
         <div class="input-group-append">
         </div> 
       </div>
           </div>

            <div class="col-lg-12">

                <div class="row mb-12" style="float: right; margin-right: 10px; margin-top: 15px;">
                    <button type="button" class="btn btn-info" id="agregar" name="agregar" onClick="agregarTabla()">Agregar</button>
                </div>
                <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                    <button type="reset" class="btn btn-info" name="Cancelar" id="Cancelar" onClick="total()">Finalizar</button>
                </div>
            </div>
<!--           <div class="m-t-lg">
          <ul class="list-inline">
          <li>
            <input class="btn btn--form" type="submit" value="Agregar" />
          </li>
        </ul>
      
      </div>-->

    </div>
      </form>
    </div>
    <div class="thumbnail__content text-center">
      
      
    </div>
    <div class="thumbnail__links">
      <ul class="list-inline m-b-0 text-center">
        
        <table id="tablaCompra">
                          <thead>
                            <tr>
                              <th>Código</th> 
                              <th>Proveedor</th>
                              <th>Insumo</th> 
                              <th>Cant</th>
                              <th>Costo</th>
                              <th class="subTotal" id="subTotal">Sub Total</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                              
                          </tbody>
                          <tfoot>
                              <tr>
                        <th class="Tot" id="Tot">Total</th>
                        </tr>
                </tfoot>
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
        }
        ?>

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
                    document.getElementById("codInsumo").value = this.cells[0].innerHTML;
                    document.getElementById("insumo").value = this.cells[1].innerHTML;
               };
            }
            </script>
            
            
        
             <script type="text/javascript">
                function Total(){
        var cantidad=document.getElementById("cantidad").value;
        var precio=document.getElementById("precio").value;
        var calculo=cantidad*precio;
        document.f1.Tpagar.value =calculo;
                }
                </script>
            
            <script>
               function agregarTabla(){
                   //alert('si');
                    var factura = $('#factura').val();
                    var FeActual = $('#FeActual').val();
                    var proveedor = $('#proveedor').val();
                    var insumo = $('#insumo').val();
                    var precio = $('#precio').val();
                    var caducidad = $('#caducidad').val();
                    var cantidad = $('#cantidad').val();
                    var resul = $('#cantidad').val() * $('#precio').val();
                    var codigo =$('#codInsumo').val();
                    var cond =$('#total').val();
                    if(cond == 0.00){
                        var valor = 0;
                    }else{       
                        var valor = parseFloat(cond);
                    }
                    
                   
                  
                   
                    var tabla = $('#tablaCompra');
                    
                    var datos = "<tr>"+
                            "<td>"+codigo+"</td>"+
                            "<td>"+proveedor+"</td>"+
                            "<td>"+insumo+"</td>"+
                            "<td>"+cantidad+"</td>"+
                            "<td>"+precio+"</td>"+
                            "<td>"+resul+"</td>"+
                            "<td>"+"tot"+"</td>"+
                            "</tr>";
                    
                    tabla.append(datos);
                    valor += parseFloat(resul);
                    $('#total').val(valor.toFixed(2));
                            
                    
                    }
                    
                </script>
<!--             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<script>
$(document).ready(function() {
    var re;
    var valor = 0
    $('form').find('.subTotal').each(function(){
        re = $(this).val();
        valor += parseFloat(re)
        alert("valor");
    });
    $('#total').val(valor.toFixed(2));
});
</script>
                
                
                
                