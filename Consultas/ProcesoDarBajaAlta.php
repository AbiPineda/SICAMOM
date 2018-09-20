<?php
include_once '../Conexion/conexion.php';
$modi = $_GET['ir'];
$sacar = mysqli_query($conexion, "SELECT*FROM t_paciente WHERE id_paciente='$modi'");
while ($fila = mysqli_fetch_array($sacar)) {
    $modificar = $fila['id_paciente'];
    $estadoUpdate = $fila['estado'];
    
}
if ($estadoUpdate == 0) {
    mysqli_query($conexion, "UPDATE t_paciente SET estado=1 WHERE id_paciente='$modificar'");
    ?>
<script type="text/javascript">
    location.href = "darBajaAlta.php";
</script>
<?php
}else{
mysqli_query($conexion, "UPDATE t_paciente SET estado=0 WHERE id_paciente='$modificar'"); 
?>
<script type="text/javascript">
    location.href = "darBajaAlta.php";
</script>
<?php
}


?>

