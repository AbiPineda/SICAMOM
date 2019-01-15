<?php
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+42 week' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
echo $nuevafecha;
?>