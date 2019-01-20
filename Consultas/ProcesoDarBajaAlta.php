<?php

include_once '../Conexion/conexion.php';
$modi = $_GET['ir'];
//sacar usuarios para bitacora

include_once '../Conexion/conexion.php';
$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora

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

    //bitacora

    ini_set('date.timezone', 'America/El_Salvador');
    $hora = date("H:i:s");
    mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
            . " VALUES('$id','$NombreUsuario','Paciente en Alta',now(),'$hora')");
    //bitacora
    ?>
    <?php

} else {
    mysqli_query($conexion, "UPDATE t_paciente SET estado=0 WHERE id_paciente='$modificar'");
    ?>
    <script type="text/javascript">
        location.href = "darBajaAlta.php";
    </script>
    <?php

    //bitacora

    ini_set('date.timezone', 'America/El_Salvador');
    $hora = date("H:i:s");
    mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
            . " VALUES('$id','$NombreUsuario','Paciente dado de Baja',now(),'$hora')");
    //bitacora
    ?>

    <?php

}
?>

