<?php
  require 'funcs/conexion.php';
  include 'funcs/funcs.php';
  
  session_start(); //Iniciar una nueva sesión o reanudar la existente
  
  if(isset($_SESSION["id_usuario"])){ //En caso de existir la sesión redireccionamos
    header("Location: /SICAMOM/html/ltr/index.html");
  }
  
  $errors = array();
  
  if(!empty($_POST))
  {
    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['password']);
    
    if(isNullLogin($usuario, $password))
    {
      $errors[] = "Debe llenar todos los campos";
    }
    
    $errors[] = login($usuario, $password); 
  }
?>
<head>
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- 
      <link rel="stylesheet" href="css/styleLogin.css">
      -->
      <link href="../dist/css/styleLogin.css" rel="stylesheet">

  
</head>

<body>
    <form class="form" method="post" action="ValidarUsuario.php">
  <div class="cont" style="background-image: url(../assets/images/ecografia.jpg);">
  <div class="demo" >
    <div class="login">
      <div class="login__check">
        <img src="../assets/images/SICAMOM.png">
      </div>
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Usuario" name="usuario" autocomplete="off"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" placeholder="Contraseña" name="clave" autocomplete="off"/>
        </div>
        <button type="submit" class="login__submit" name="Submit">Iniciar Sesión</button>
        <p class="login__signup">¿Olvidó su contraseña? &nbsp;<a href="recupera.php">¡Entra aqui!</a></p>
      </div>
    </div>

  </div>
  </div>
    </form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
</body>

