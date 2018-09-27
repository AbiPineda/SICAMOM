<?php
include_once '../Conexion/conexion.php';
$modi = $_GET['ir'];
$sacar = mysqli_query($conexion, "SELECT*FROM t_proveedor WHERE id_proveedor='$modi'");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['id_proveedor'];
    $estadoUpdate = $fila['estado'];
    
}
if ($estadoUpdate == 0) {
    mysqli_query($conexion, "UPDATE t_proveedor SET estado=1 WHERE id_proveedor='$modificar'");
    ?>
<script type="text/javascript">
    location.href = "darBajaAltaProveedor.php";
</script>
<?php
}else{
mysqli_query($conexion, "UPDATE t_proveedor SET estado=0 WHERE id_proveedor='$modificar'"); 
?>
<script type="text/javascript">
    location.href = "darBajaAltaProveedor.php";
</script>
<?php
}


?>

