<?php
    
    session_name("academico");
    session_start();
    
    if ( ! isset($_SESSION["usuario"])){
        header("location:index.php");
    }


      if (isset($_COOKIE["ru"])){
        $ur = $_COOKIE["ru"];
      }else{
        $ur = "";}
    
    
    //exit($ur);





    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="bs/ico/favicon.ico">


    <title>ALMACEN PH</title>
    <!-- Bootstrap core CSS -->
    <link href="../bs/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../bs/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="responsive-full-background-image.css">
    <style>
    #principal{
     
    
     background-color:Transparent;
     }
     #principal2{
     
    
     background-color:Transparent;
     }
     #contenido{
     
    
     background-color:Transparent;
     }
    </style>
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
            <a class="navbar-brand" href="#"><div class="label label-danger"></div></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           
            <li class="dropdown">
             
             
            </li>
            <li class="dropdown">
              
              
            </li>
            <li class="dropdown">
             
              
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
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



    <div id="contenido" class="container" >
           <?php

                      
            

            require_once '../negocio/kardex.php';
            $objkardex = new kardex();
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objkardex->listarreporte();

            
            /*require_once '../negocio/jugador.php';
            $objJugador = new Jugador();
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objJugador->listar($pagina_actual );*/
        ?>
        </div>

 

   



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bs/js/bootstrap.js"></script>
    
    <script type="text/javascript">
        
        $('#myModal').on('shown.bs.modal', function () {
            $('#txtdni').focus();
        })
        
       


        function llenaru(){
            
            var v_cod_al = $("#txtida").val();
            var v_a = <?php $v = $_GET["variable1"]; echo $v; ?>;
            
            
            $.post( "llenaru.php", { cod_al: v_cod_al, a: v_a })
            .done(function(data) {
                console.log(data);
                
                $("#txtu").html("");
                $("#txtu").html(data);
            });
            
        }


        function resu(){

            var v_cod_al = $("#txtu").val();
            $("#txtr").html("");
            $("#txtr").html(v_cod_al);


            $.post( "llenarl.php", { cod_al: v_cod_al })
            .done(function(data) {
                console.log(data);
                
                $("#contenido").html("");
                $("#txtds").html("");
                $("#txtds").html(v_cod_al);
                $("#contenido").html(data);
            });
            

            
        }

        function valida(e){
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8){
                return true;
            }
                
            // Patron de entrada, en este caso solo acepta numeros
            patron =/[0.0-9.0]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

        function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
                  
       
        

        function leerDatosPersonal(p_dni){
            $.post( "buscarjugador.php", { dni: p_dni })
            .done(function( data ) {
                data = $.parseJSON(data);
                $("#txtdni").val(data.dni);
                $("#txtapellidos").val(data.apellidos);
                $("#txtnombres").val(data.nombres);
                $("#txtclub").val(data.club);
                $("#txttelefono").val(data.telefono);
                $("#txtcorreo").val(data.correo);
                $("#txtposicion").val(data.posicion);
                
            },"json");
            
            tipoOperacion(2);

            //identificaOperacion(2);

        }
        
        
        function leerkardex(p_n,p_cp, p_l, p_s, p_u){
         
           
                
                $("#txtcp").val(p_cp);
                $("#txtlsu").val(p_l+' - '+p_s+' - '+p_u);
                $("#txtn").val(p_n);



          

        


            
        
            //identificaOperacion(2);

            /*$.post( "grabarcardex.php", { cp: p_cp , qf: p_qf , sf: p_sf })
            .done(function( data ) {
                
                
            },"json");
            
           

            //identificaOperacion(2);*/

        }

        function gc(){
         
           
                
               alert("juas");


          

        


            
        
            //identificaOperacion(2);

            /*$.post( "grabarcardex.php", { cp: p_cp , qf: p_qf , sf: p_sf })
            .done(function( data ) {
                
                
            },"json");
            
           

            //identificaOperacion(2);*/

        }


          
            
        
      
        function tipoOperacion(p_tipo){
            if(p_tipo==1){
                $("#myModalLabel").html("Agregar nuevo Jugador");
                $("#txttipooperacion").val("agregar");
                limpiarDatos();
            }else{
                $("#myModalLabel").html("Editar datos del Jugador");
                $("#txttipooperacion").val("modificar");
            }
        }
        
        function limpiarDatos(){
            $("#txtdni").val("");
            $("#txtapellidos").val("");
            $("#txtnombres").val("");
            $("#txtclub").val("");
            $("#txttelefono").val("");
            $("#txtcorreo").val("");
            $("#txtposicion").val("");
        }
        

    </script>
    
  </body>
</html>
