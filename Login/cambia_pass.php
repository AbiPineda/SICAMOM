<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	if(empty($_GET['user_id'])){
		header('Location: index.php');
	}
	
	if(empty($_GET['token'])){
		header('Location: index.php');
	}
	
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
echo 'No se pudo verificar los Datos';
exit;
	}
	
	
?>

<html>
	<head>
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- 
      <link rel="stylesheet" href="css/styleLogin.css">
      -->
      <link href="../dist/css/styleLogin.css" rel="stylesheet">
		<title>Cambiar Password</title>
		
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
				<div class="panel-title">Cambiar Password</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
			</div>     
			
			<div style="padding-top:30px" class="panel-body" >
				
				<form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
					
					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					
					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
					
					<div class="login__form">
					<div class="login__row">
          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
           				 <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          				</svg>
          					<input type="password" class="login__input pass" placeholder="Nueva contrasena" name="password" required />
        			</div>

					<div class="login__row">
          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
           				 <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          				</svg>
          					<input type="password" class="login__input pass" placeholder="Confirmar contrasena" name="con_password" required />
        			</div>
					
					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
						</div>
					</div>  
					</div> 
					</div> 
				</form>
			</div>                     
		</div>  
		</div>
		</div>
		</div>
	</body>
</html>	