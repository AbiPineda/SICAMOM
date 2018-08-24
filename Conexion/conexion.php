<?php

function conectar()
{
    $user = "root";
    $pass = "";
    $server = "localhost";
    $db = "clinica";
    $con = mysqli_connect($server, $user, $pass) or die ("Error al conectar la BD: ".  mysqli_connect_error());
    mysqli_select_db($con, $db) or die ("Error al conectar la BD: ".  mysqli_connect_error());
    return $con;
}
?>