<?php
include_once '../Conexion/conexion.php';
$modi = $_GET['ir'];
$sacar = mysqli_query($conexion, "SELECT*FROM t_usuario WHERE id_usuario='$modi'");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['id_usuario'];
    $estadoUpdate = $fila['estado'];
}
if ($estadoUpdate == 0) {
    mysqli_query($conexion, "UPDATE t_usuario SET estado=1 WHERE id_usuario='$modificar'");
    ?>
<script type="text/javascript">
    location.href = "darBajaAltaUsuario.php";
</script>
<?php
}else{
mysqli_query($conexion, "UPDATE t_usuario SET estado=0 WHERE id_usuario='$modificar'"); 
?>
<script type="text/javascript">
    location.href = "darBajaAltaUsuario.php";
</script>
<?php
}


?>
