
<?php
    session_name("academico");
    session_start();
    
    if ( ! isset($_SESSION["usuario"])){
        header("location:index.php");
    }

 
   
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="bs/ico/favicon.ico">

   

    <title>PERHUSA - GIA</title>
    <!-- Bootstrap core CSS -->
    <link href="../bs/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bs/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="responsive-full-background-image.css">

  </head>
  <body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#"><div class="label label-danger">PERHUSA</div></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="reportepa.php">Almacenes</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              
              
            </li>
            <li class="dropdown">
             
              
            </li>
          </ul>
            
          <ul class="nav navbar-nav navbar-right" >
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucwords(strtolower($_SESSION["personal"])); ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Cambiar Contraseña</a></li>
                <li class="divider"></li>
                <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </div>



    <div class="container">
      <div class="page-header">
        <h1>¡Bienvenido!</h1>
      </div>
      
        
     <div class="alert alert-danger fade in">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4>Aplicacion GIA para la toma de inventarios</h4>
      <p>Logeo exitoso, ahora empieza...</p>
      <p>
          &nbsp;
      </p>
      <p>
          &nbsp;
      </p>
    </div>
        
    </div>

   
  
     
     
    


 

  



   



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bs/js/bootstrap.js"></script>
    <script type="text/javascript">

     function gc(){
         
           
                
               alert("juas");


          

        


            
        

        }






    </script>
  </body>
</html>
