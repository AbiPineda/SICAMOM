
<head>
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<!-- 
      <link rel="stylesheet" href="css/styleLogin.css">
      -->
      <link href="../dist/css/styleLogin.css" rel="stylesheet">

  
</head>

<body>
    

  <div class="cont" style="background-image: url(../assets/images/ecografia.jpg);">
  <div class="demo" >
    <div class="login">
      <div class="login__check">
        <img src="../assets/images/SICAMOM.png">
      </div>

      <form class="form" action="enviar.php" method="post" >
        
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Nombre" name="nombre" required autocomplete="off"/>
        </div>
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Correo electrónico" name="correo" required autocomplete="off"/>
        </div>
       <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Mensaje" name="mensaje" required autocomplete="off"/>
        </div>
        <input type="submit" class="login__submit" id="btnEnviar" value="Enviar" >Enviar</input>
        
      </div>
    </div>

  </div>
  </div>

    </form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
</body>

