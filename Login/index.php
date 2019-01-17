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
<html>
	<head>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- 
      <link rel="stylesheet" href="css/styleLogin.css">
      -->
      <link href="../dist/css/styleLogin.css" rel="stylesheet">



		<title>Login</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
	</head>
	

	<body>


		<div class="cont" style="background-image: url(../assets/images/ecografia.jpg);">
			<br> </br>
		<div class="container"> 
		 <div class="demo" >   
			<div class="login">     
			<div class="login__check">
        		<img src="../assets/images/SICAMOM.png">
      		</div> 
      		<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">             
				<div class="login__form">
					<div class="login__row">
						<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
           				 <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          				</svg>
						<!--<div class="panel-title">Iniciar Sesi&oacute;n</div>
					<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="recupera.php">¿Se te olvid&oacute; tu contraseña?</a></div>
						-->
						<input id="usuario" type="text" class="login__input name" placeholder="Usuario o email" name="usuario" autocomplete="off" required />
					</div> 

					<div class="login__row">
          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            				<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
         			 	</svg>
         				 <input  id= "password "type="password" class="login__input pass" placeholder="Contraseña" name="password" autocomplete="off"/>
        			</div>    
					
					<div style="padding-top:10px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						
							
						
							
							<div style="margin-top:-40px" class="form-group">
								<div class=""login__submit"">
									 <button type="submit" class="login__submit" name="Submit">Iniciar Sesión</button>
								</div>

								<div style="float:center; font-size: 90%; position: relative; top:-5px"><a href="recupera.php">¿Se te olvid&oacute; tu contraseña?</a></div>
							</div>
								<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
							
							<!--
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="registro.php">Registrate aquí</a>
									</div>
								</div>
							</div>
							-->   

							
						</form>
						<?php echo resultBlock($errors); ?>
					</div>                     
				</div>  
			</div>
		</div>
		</div>

	</div>
	</body>
</html>