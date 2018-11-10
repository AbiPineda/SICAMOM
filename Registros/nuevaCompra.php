
<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';



if (isset($_REQUEST['btnGuardar'])) {
    include_once '../Conexion/conexion.php';

    $FeActual = $_REQUEST['FeActual'];
    $proveedor = $_REQUEST['proveedor'];

    $insumo = $_REQUEST['insumo'];
    $precio = $_REQUEST['precio'];
    $caducidad = $_REQUEST['caducidad'];
    $cantidad = $_REQUEST['cantidad'];
    $factura = $_REQUEST['factura'];
    $subTotal = $_REQUEST['precio']*$_REQUEST['cantidad'];
    
    echo $factura;

    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();
    
     $validar = mysqli_query($conexion, "SELECT factura FROM t_compra WHERE estado='EnProceso' AND factura='$factura'");
     if (mysqli_num_rows($validar)>0) {
         
         $OtroNo = mysqli_query($conexion, "SELECT * FROM t_compra WHERE fk_insumo='$insumo' AND factura='$factura'");
         
         if(mysqli_num_rows($OtroNo)>0){
             //es porque ya hay uno
         }else{
              mysqli_query($conexion, "INSERT INTO t_compra(fk_proveedor,fk_insumo,fecha_caducidad,precio_unitario,cantidad,fecha_actual,factura,subtotal,estado) VALUES('$proveedor','$insumo','$caducidad','$precio','$cantidad','$FeActual','$factura','$subTotal','EnProceso')");
     
         }
         }else{
              mysqli_query($conexion, "INSERT INTO t_compra(fk_proveedor,fk_insumo,fecha_caducidad,precio_unitario,cantidad,fecha_actual,factura,subtotal,estado) VALUES('$proveedor','$insumo','$caducidad','$precio','$cantidad','$FeActual','$factura','$subTotal','EnProceso')");
     
         }
           

          
    echo "<script>
          location.href ='nuevaCompra.php?Nfactura=$factura ';
        </script>";
}
if (isset($_REQUEST['Cancelar'])) {
    include_once '../Conexion/conexion.php';
 
    $factura = $_REQUEST['factura'];

    Conexion::abrir_conexion();
    $conexionx = Conexion::obtener_conexion();

    mysqli_query($conexion, "UPDATE t_compra SET estado='Finalizado' WHERE factura='$factura' AND estado='EnProceso'");

    echo "<script>
          location.href ='nuevaCompra.php?Nfactura=$factura ';
        </script>";
} 
else {
     if (isset($_REQUEST['Nfactura'])) {
         $valor = $_REQUEST['Nfactura'];
        
    }
   
    
    ?>

    <div class="page-wrapper" style="height: 671px;">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 



        <div class="container-fluid">
            <div class="signup__container">
                <div class="container__child signup__thumbnail">
                    <div class="thumbnail__logo">

                        <h2 class="heading--secondary">Registro de compra</h2>
                        <form action="nuevaCompra.php" method="POST" >

                            <div class="row mb-12"> 

                                <div class="col-lg-3">
                                   
                                    <label style="color: black">Factura #<small class="text-muted" ></small></label>
                                    <div class="input-group">                         
                                        <input type="text" class="form-control" id="factura" name="factura"  <?php if (isset($_REQUEST['Nfactura'])) {?> value="<?php echo "$valor"; ?> "  <?php }?> >
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div> 
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <?php
                                    date_default_timezone_set('America/El_Salvador');
                                    ?>
                                    <label style="color: black">Fecha de Compra</label>
                                    <?php if (isset($_GET['Nfactura'])){
                                         include_once '../Conexion/conexion.php';
                                        $Abi=$_GET['Nfactura'];
                 $fechita= mysqli_query($conexion,"SELECT fecha_actual FROM t_compra WHERE factura='$Abi' LIMIT 1");
                 while ($z= mysqli_fetch_array($fechita)){
                     $fe=$z['fecha_actual'];
                 }
                                        ?>
                                    <div class="input-group">
                                        <input type="date" name="FeActual" value="<?php echo $fe;?>" class="form-control" id="FeActual" min="<?php echo $fe;?>" max="<?php echo $fe;?>" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                    </div>
                                    <?php }else{?>
                                    <div class="input-group">
                                        <input type="date" name="FeActual" class="form-control" id="FeActual" min="<?= date('d/m/y g:ia'); ?>" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                    </div>
                                    <?php }?>
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
                                            echo '<option value=' . "$row[0]" . '>' . $row[1] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-4">
                                    <label style="color: black">Insumo<small class="text-muted" ></small></label>
                                      <select class="custom-select" name="insumo" id="insumo">
                                        <?php
                                        include_once '../Conexion/conexion.php';
                                        $pro = mysqli_query($conexion, "SELECT*from t_insumo");
                                        ?>
                                        <option>Insumo</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($pro)) {
                                               echo '<option value=' . "$row[0]" . '>' . $row[5] . " - " . $row[1]. " " . $row[3] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    
                                 
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
                                    <?php if (isset($_GET['Nfactura'])){
                                         include_once '../Conexion/conexion.php';
                                        $Abi2=$_GET['Nfactura'];
                 $fechita2= mysqli_query($conexion,"SELECT fecha_caducidad FROM t_compra WHERE factura='$Abi2' LIMIT 1");
                 while ($z2= mysqli_fetch_array($fechita2)){
                     $fe2=$z2['fecha_caducidad'];
                 }
                                        ?>
                                    <div class="input-group">
                                        <input type="date" name="caducidad" value="<?php echo $fe2;?>" class="form-control" id="caducidad" max="<?php echo $fe2;?>" min="<?php echo $fe2;?>" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                    </div>
                                    <?php } else {?>
                                    <div class="input-group">
                                        <input type="date" name="caducidad" class="form-control" id="caducidad" max="2020-01-01" min="<?= date('d/m/y g:ia'); ?>"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>

                                    </div>
                                    <?php }?>
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
                                     <?php
                                        include_once '../Conexion/conexion.php';
                                        if(isset($_GET['Nfactura'])){
                                        $factura = $_GET['Nfactura'];
                                        $pro = mysqli_query($conexion, "SELECT SUM(subtotal) as total FROM t_compra WHERE factura='$factura'");
                                    while ($row = mysqli_fetch_array($pro)) {
                                        $total = $row['total'];
                                    }
                                        
                                    ?>
                                    <label style="color: black">TOTAL<small class="text-muted" ></small></label>
                                    <div class="input-group">                         
                                        <input type="text" class="form-control" id="total" name="total" value="<?php echo "$total"; ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div> 
                                    </div>
                                         <?php }?>
                                        
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
                                        <button type="submit" class="btn btn-info" value="OK" id="btnGuardar" name="btnGuardar" >Agregar</button>
                                    </div>
                                    <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                        <button type="submit" class="btn btn-info" name="Cancelar" id="Cancelar">Finalizar</button>
                                    </div>
                                </div>


                            </div>
                        </form>

                         <div id="bodywrap">


  <div class="scroll-window-wrapper">
  <div class="scroll-window">
  <table class="table table-striped table-hover user-list fixed-header">
    <thead>
      
<!--      <th><div>Código</div></th>-->
      <th><div>Proveedor</div></th>
      <th><div>Insumo</div></th>
      <th><div>Cantidad Unitaria</div></th>
  <th><div>Precio Unitario</div></th>
  <th><div>Sub Total</div></th>
  <th><div>Acciones</div></th>
<!--  <th><div>Unidades</div></th>-->
     
    
      
      
      
    </thead>
    <tbody  class="buscar"> 
   <?php
            if (isset($_REQUEST['Nfactura'])) {
                $facturaActual = $_REQUEST['Nfactura'];
                $sacar = mysqli_query($conexion, "SELECT
                    id_compra,
                    factura,
                    ins_codigo,
                    pro_cnombre_empresa,
                    ins_cnombre_comercial,
                    precio_unitario,
                    cantidad,
                    total,
                    fecha_actual,
                    subtotal
                    FROM
                    t_insumo
                    INNER JOIN t_compra ON fk_insumo = ins_codigo
                    INNER JOIN t_proveedor ON fk_proveedor = id_proveedor
                    WHERE factura = '$facturaActual' AND t_compra.estado='EnProceso'");
                while ($fila = mysqli_fetch_array($sacar)) {
                    $id=$fila['id_compra'];
                    $fac=$fila['factura'];
                    $codigoTabla = $fila['ins_codigo'];
                    $proveedirTabla = $fila['pro_cnombre_empresa'];
                    $insumoTabla = $fila['ins_cnombre_comercial'];
                    $precioTab = $fila['precio_unitario'];
                    $canatidadTab = $fila['cantidad'];
                    $fecCompra = $fila['fecha_actual'];
                    $subTotalTabla = $fila['precio_unitario'] * $fila['cantidad'];

                    ?>
                    <tr>
            <!--        <th scope="row"><?php echo $codigoTabla; ?></th>-->
                        <td data-title="Worldwide Gross" data-type="currency"><?php echo $proveedirTabla; ?></td>
                        <td data-title="Domestic Gross" data-type="currency"><?php echo $insumoTabla; ?></td>
                        <td data-title="Domestic Gross" data-type="currency"><?php echo $canatidadTab; ?></td>
                        <td data-title="Domestic Gross" data-type="currency"><?php echo $precioTab; ?></td>
                        <td data-title="Domestic Gross" data-type="currency"><?php echo $subTotalTabla; ?></td>
                        <td class="text"><a href="../Registros/quitarProducto.php?id=<?php echo $id; ?>&fac=<?php echo $fac; ?>" class="btn btn-youtube fas fa-trash-alt"></a>

                        <?php } ?>

                </tr>
                <?php
                    }
                    ?>

    </tbody>
  </table>
  </div> <!-- Div scroll-window -->
</div> <!-- Div scroll-window-wrapper-->


</div> <!-- Div bodywrap -->
                    </div>


                  
                </div>




<!-- ============================================================== 
                <div class="container__child signup__form">
                    

                   

                </div>

            </div>
 ============================================================== --> 

            <!-- ============================================================== --> 

    <?php
    include_once '../plantilla/pie.php';
}
?>

      


        


