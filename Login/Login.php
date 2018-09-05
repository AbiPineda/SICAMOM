
     
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  
</head>

<body>
    <div class="page-wrapper" >
  <div class="wrapper" style="background-image: url(../assets/images/ecografia3.jpg);">
	<div class="container" >
		<h1>Bienvenido/a</h1>
		
		<form class="form" method="post" action="ValidarUsuario.php">
			<input type="text" placeholder="Usuario" name="usuario">
			<input type="password" placeholder="Contraseña" name="clave">
		</br>
	        <input class="btn btn-outline-primary" type="submit" id="login-button" name="Submit" value="Iniciar Sesión">
                </form>  
                <form method="post" action="RegistroUsuario.php">
                    <input class="btn btn-outline-info" type="submit" name="Submit" value="Registrarse">
                </form>  
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
        </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

  <script  src="../js/js_login/index.js.js"></script>




</body>

</html>
                
