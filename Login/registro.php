<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	$errors = array();
	
	if(!empty($_POST))
	{
		$nombre = $mysqli->real_escape_string($_POST['nombre']);	
		$usuario = $mysqli->real_escape_string($_POST['usuario']);	
		$password = $mysqli->real_escape_string($_POST['password']);	
		$con_password = $mysqli->real_escape_string($_POST['con_password']);	
		$email = $mysqli->real_escape_string($_POST['email']);
		
				
		$activo = 0;
		$tipo_usuario = 2;
		
		if(isNull($nombre, $usuario, $password, $con_password, $email))
		{
			$errors[] = "Debe llenar todos los campos";
		}
		
		if(!isEmail($email))
		{
			$errors[] = "Dirección de correo inválida";
		}
		
		if(!validaPassword($password, $con_password))
		{
			$errors[] = "Las contraseñas no coinciden";
		}
		
		if(usuarioExiste($usuario))
		{
			$errors[] = "El nombre de usuario $usuario ya existe";
		}
		
		if(emailExiste($email))
		{
			$errors[] = "El correo electronico $email ya existe";
		}
		
		if(count($errors) == 0)
		{
			
			
				
				$pass_hash = hashPassword($password);
				$token = generateToken();
				
				$registro = registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
				
				if($registro > 0 )
				{
					
					$url = 'http://'.$_SERVER["SERVER_NAME"].'/SICAMOM/login/activar.php?id='.$registro.'&val='.$token;
					
					$asunto = 'Activar Cuenta - Sistema de Usuarios';
					$cuerpo = "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable dar click en el siguiente enlace <a href='$url'>Activar Cuenta</a>";
					
					if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
					
					echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
					
					echo "<br><a href='index.php' >Iniciar Sesion</a>";
					exit;
					
					} else {
						$erros[] = "Error al enviar Email";
					}
					
					} else {  
					$errors[] = "Error al Registrar";
				}
				
				
			
		}
		
	}
	
?>
<html>
	<head>


		<title>Registro</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- 
      <link rel="stylesheet" href="css/styleLogin.css">
      -->
      <link href="../dist/css/styleRegistrar.css" rel="stylesheet">
		
	</head>
	
	<body>
		<div class="cont" style="background-image: url(../assets/images/ecografia.jpg);">
		<div class="demo" >
			<div id="signupbox" class="login">
				<div class="panel panel-info">
					<div class="login__check">
       					 <img src="../assets/images/SICAMOM.png">
      				</div>

						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

							<div class="login__form">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="login__row">
          						<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
           						 <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          						</svg>
                                                        <input id="nombre" type="text" class="login__input name" placeholder="Nombre" name="nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
        					</div>
							
							
							<div class="login__row">
          						<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
           						 <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          						</svg>
         							 <input id="usuario" type="text" class="login__input name" placeholder="Usuario" name="usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required >
        					</div>


							<div class="login__row">
          						<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
           						 <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          						</svg>
         							 <input id="password" type="password" class="login__input name" placeholder="Contrasena" name="password"  required >
        					</div>
							


							<div class="login__row">
          						<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
           						 <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          						</svg>
         							 <input id="con_password" type="password" class="login__input name" placeholder="Confirmar contrasena" name="con_password"  required >
        					</div>



							<div class="login__row">
          						<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
           						 <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          						</svg>
         							 <input id="email" type="email" class="login__input name" placeholder="Email" name="email" value="<?php if(isset($email)) echo $email; ?>" required >
        					</div>


							
							
							
							<div style="margin-top:-15px" class="form-group">
								<div class="col-sm-12 controls">
										<button id="btn-signup" type="submit" class="login__submit" name="Submit">Registrar</button>
										
								</div>
							</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>
						
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>

</html>