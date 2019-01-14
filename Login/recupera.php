	
<?php
	require 'funcs/conexion.php';
	include 'funcs/funcs.php';
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	$errors = array();
	
	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);
		
		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}
		
		if(emailExiste($email))
		{			
			$user_id = getValor('id', 'correo', $email);
			$nombre = getValor('nombre', 'correo', $email);
			
			$token = generaTokenPass($user_id);
			
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/SICAMOM/login/cambia_pass.php?user_id='.$user_id.'&token='.$token;
			
			$asunto = 'Recuperar Password - SICAMOM';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar password</a>";
			
			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
				echo "<a href='index.php' >Iniciar Sesion</a>";
				exit;
			}
			} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
?>
<html>
	<head>

		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- 
      <link rel="stylesheet" href="css/styleLogin.css">
      -->
      <link href="../dist/css/styleLogin.css" rel="stylesheet">
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		<div class="cont" style="background-image: url(../assets/images/ecografia.jpg);">
		<div class="demo" >   
			<div class="login">                    
				 <div class="login__check">
				 	<img src="../assets/images/SICAMOM.png">
                 </div>
                 <div class="login__form">
					<div class="panel-heading">
						<div class="panel-title" >Recuperar Password</div>
					</div>     					
					<div style="padding-top:-10px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							<div class="login__form">

							<div class="login__row">
          						<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
           						 <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          						</svg>
         							 <input id="email "type="email" class="login__input name" placeholder="email" name="email" required=/>
        					</div>

							<div style="margin-top:5px" class="form-group">
								<div class="col-sm-12 controls">
										<button id="btn-login" type="submit" class="login__submit" name="Submit">Enviar</button>
										<div style="float:center; font-size: 100%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
								</div>
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