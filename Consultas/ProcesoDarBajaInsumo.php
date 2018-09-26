<?php
include_once '../Conexion/conexion.php';
$modi = $_GET['ir'];
$sacar = mysqli_query($conexion, "SELECT*FROM t_insumo WHERE ins_codigo='$modi'");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['ins_codigo'];
    $estadoUpdate = $fila['estado'];
    
}
if ($estadoUpdate == 1) {
    mysqli_query($conexion, "UPDATE t_insumo SET estado=0 WHERE ins_codigo='$modificar'");
    ?>
<script type="text/javascript">
    location.href = "darBajaInsumo.php";
</script>
<?php
}else{

?>

<?php
}


?>

