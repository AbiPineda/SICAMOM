<?php
include_once '../Conexion/conexion.php';
$modi = $_GET['ir'];
$sacar = mysqli_query($conexion, "SELECT*FROM t_llegada WHERE id_llegada='$modi'");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['id_llegada'];
    $estadoUpdate = $fila['estado'];
    
}
if ($estadoUpdate == 0) {
    mysqli_query($conexion, "UPDATE t_llegada SET estado=1 WHERE id_llegada='$modificar'");
    ?>
<script type="text/javascript">
    location.href = "verColaUsuario.php";
</script>
<?php
}else{
mysqli_query($conexion, "UPDATE t_llegada SET estado=0 WHERE id_llegada='$modificar'"); 
?>
<script type="text/javascript">
    location.href = "verColaUsuario.php";
</script>
<?php
}


?>

