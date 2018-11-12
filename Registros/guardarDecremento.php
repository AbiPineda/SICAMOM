<?php

include_once '../plantilla/cabecera.php';
include_once '../plantilla/menu.php';
include_once '../plantilla/menu_lateral.php';
include_once '../Conexion/conexion.php';

$insumo   = $_POST['insumo'];
$marca   = $_POST['marca'];
$existencia   = $_POST['existencia'];
$preparadas  = $_POST['preparadas'];

//$mensaje = "";

        $val = mysqli_query($conexion, "SELECT*from t_inventario WHERE $insumo = insumo");
            if($val){
                $valorE =parseInt($val[2]) + parseInt($existencia);
                $valorP =parseInt($val[2]) + parseInt($preparadas);
                
                $consulta = "UPDATE t_inventario SET inv_ecantidad_actual = $valorE,inv_ecantidad_saliente= $valorP";
                 if ($resultado) {
              //$mensaje="Se agregaron los datos correctamente";
              header('Location: ../Registros/DecrementoIn.php?guardo=1');
          } else {
              echo "<script type='text/javascript'>";
    echo"alert('Tu puedes');";
    echo "</script>";
              //$mensaje="Error al insertar los datos";
          }//fin if resultado
            }else{
        $consulta  = "INSERT INTO t_inventario VALUES('null','" .$insumo. "','" .$existencia. "','" .$preparadas. "','" .$marca."')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              //$mensaje="Se agregaron los datos correctamente";
              header('Location: ../Registros/DecrementoIn.php?guardo=1');
          } else {
              //$mensaje="Error al insertar los datos";
          }//fin if resultado
            }
        

?>
