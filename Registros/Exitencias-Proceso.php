<?php

include_once '../Conexion/conexion.php';

//sacar usuarios para bitacora

$usuario = mysqli_query($conexion, "SELECT*FROM usuarios");
while ($row = mysqli_fetch_array($usuario)) {
    $id = $row['id'];
    $NombreUsuario = $row['usuario'];
}
//sacar usuarios para bitacora

$auxInsumo = $_GET['in'];
$factura = $_GET['voy'];
//unidades a insertar
$unidades = mysqli_query($conexion, "SELECT *FROM t_insumo WHERE ins_codigo='$auxInsumo'");
while ($U = mysqli_fetch_array($unidades)) {
    $un = $U['unidad'];
    $ayuda = $U['ins_cnombre_comercial'];
}
//*************
//id inventatio para fk inventario unidades
$idInv = mysqli_query($conexion, "SELECT *FROM t_inventario WHERE insumo='$auxInsumo'");
while ($U1 = mysqli_fetch_array($idInv)) {
    $id = $U1['id_inventario'];
    $ExitenteInvOriginal = $U1['inv_ecantidad_actual'];
}
//validar para que solo cuando no este ese registro lo ingrese y 
//si ya esta que solo lo actualice
$invalido = mysqli_query($conexion, "SELECT *FROM inventario_unidades WHERE tipo='$ayuda'");
if (mysqli_num_rows($invalido) > 0) {
    //por si hay todavia algunos en el inventario y kiere decrementar otro
    $otroSi = mysqli_query($conexion, "SELECT *FROM inventario_unidades WHERE tipo='$ayuda'");
    while ($yes = mysqli_fetch_array($otroSi)) {
        $unidadesExistente = $yes['decremento'];
    }
    $suma = $un + $unidadesExistente;
    mysqli_query($conexion, "UPDATE inventario_unidades SET decremento='$suma' WHERE tipo='$ayuda'");
} else {
    mysqli_query($conexion, "INSERT INTO inventario_unidades(fk_inventarioGeneral,decremento,tipo) VALUES('$id','$un','$ayuda')");
}

//decrementar en el inventario original el paquete que se utilizo
$restaOriginal = $ExitenteInvOriginal - 1;
mysqli_query($conexion, "UPDATE t_inventario SET inv_ecantidad_actual='$restaOriginal' WHERE insumo='$auxInsumo'");
//***************************
//decrementar en el campo reduccion de la tabla compra
$sacarCompra = mysqli_query($conexion, "SELECT *FROM t_compra WHERE fk_insumo='$auxInsumo' AND factura='$factura'");
while ($xz = mysqli_fetch_array($sacarCompra)) {
    $redu = $xz['reduccion'];
}
$restar = $redu - 1;
mysqli_query($conexion, "UPDATE t_compra SET reduccion='$restar' WHERE fk_insumo='$auxInsumo' AND factura='$factura'");
///FIN
echo "<script>
          location.href ='Existencias.php';
        </script>";

//bitacora
ini_set('date.timezone', 'America/El_Salvador');
$hora = date("H:i:s");
mysqli_query($conexion, "INSERT INTO t_bitacora(fk_usuario,bit_cusuario,bit_cactividad,bit_ffecha,bit_hhora)"
        . " VALUES('$id','$NombreUsuario','Se prepararon insumos',now(),'$hora')");
//bitacora
?>
