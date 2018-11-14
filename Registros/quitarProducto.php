<?php
include_once '../Conexion/conexion.php';
$id=$_GET['id'];
$factura=$_GET['fac'];
$verCompra= mysqli_query($conexion,"SELECT*FROM t_compra WHERE id_compra='$id'");
while ($x= mysqli_fetch_array($verCompra)){
    $compro=$x['cantidad'];
    $insuCompro=$x['fk_insumo'];
}
$verIventario= mysqli_query($conexion,"SELECT*FROM t_inventario WHERE insumo='$insuCompro'");
while ($y= mysqli_fetch_array($verIventario)){
    $hay=$y['inv_ecantidad_actual'];
}
$resta=$hay-$compro;
 mysqli_query($conexion, "UPDATE t_inventario SET inv_ecantidad_actual='$resta' WHERE insumo='$insuCompro'");
 
mysqli_query($conexion,"DELETE FROM t_compra WHERE t_compra.id_compra='$id'");
echo "<script>
          location.href ='nuevaCompra.php?Nfactura=$factura ';
        </script>"; 
?>
