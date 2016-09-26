<?php
    if (isset($_COOKIE["recordardatos"])){
        $correoAnterior = $_COOKIE["recordardatos"];
    }else{
        $correoAnterior = "";
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../bs/ico/ph.ico">

    <title>PERHUSA - GIA</title>

    
    <!-- Bootstrap core CSS -->
    <link href="../bs/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bs/css/bootstrap.css" rel="stylesheet">
     <link href="../bs/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bs/css/signin.css" rel="stylesheet">
    <link rel="stylesheet" href="responsive-full-background-image.css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

        <form class="form-signin" role="form" action="login.php" method="post">
        
        <br><h2 class="form-signin-heading"><center>Inicio de sesion</center></h2>
        
        <input type="text" class="form-control" placeholder="Usuario" name="txtusuario" value="<?php echo $correoAnterior; ?>" required autofocus>
        <input type="password" class="form-control" placeholder="Contraseña" name="txtclave" required>
        <label class="checkbox">
            <input type="checkbox" name="recordar" value="S" > Recuerdar mis datos
        </label>
        <button class="btn btn-lg btn btn-primary btn-block" type="submit">Ingresar</button>
        </form>

    </div> <!-- /container -->


    
  </body>
</html>
