<?php
include_once '../Conexion/conexion.php';
$id=$_GET['id'];
$factura=$_GET['fac'];
mysqli_query($conexion,"DELETE FROM t_compra WHERE t_compra.id_compra='$id'");
 echo "<script>
          location.href ='nuevaCompra.php?Nfactura=$factura ';
        </script>";
?>
