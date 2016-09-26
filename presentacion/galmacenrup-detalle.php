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
            <a class="navbar-brand" href="#"><div class="label label-danger"><?php $idp = $_GET["idp"]; echo 'Detalle del producto : '.$idp;?></div></a>
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

            $r = $_GET["r"];
            $z = substr($r, 0, 3); 
            $a = substr($r, 0, 2);  
            $tp = $_GET["tp"]; 
            $ta = $_GET["ta"];
            $idp = $_GET["idp"];


        
                      
            

            require_once '../negocio/kardex.php';
            $objkardex = new kardex();
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objkardex->listardetalle($pagina_actual,$ta,$tp,$r,$z,$a,$idp);

            
            /*require_once '../negocio/jugador.php';
            $objJugador = new Jugador();
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objJugador->listar($pagina_actual );*/
        ?>
     
<!--        <p>
            <button onclick="tipoOperacion(1)" class="btn btn-danger" data-toggle="modal" data-target="#myModal" type="button">
                  Agregar Personal
            </button>
        </p>-->
        
        <!-- Modal -->
        <form name="frmgrabar" id="frmgrabar" method="post" action="grabarcardex.php">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Insertar datos</h4>
                  </div>
                  <div class="modal-body">
                    
                      <label class="col-md-2 control-label" for="txtAgentState">Codigo: </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtcp" id="txtcp" class="form-control" placeholder="" readonly="readonly" ><p>
                        </div>
                       <label class="col-md-2 control-label" for="txtAgentState">Producto: </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtn" id="txtn" class="form-control" placeholder="" readonly="readonly"><p>
                        </div> 
                       <label class="col-md-2 control-label" for="txtAgentState">Ubicacion: </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtlsu" id="txtlsu" class="form-control" placeholder="" required="" readonly="readonly"><p>
                        </div>
                       <label class="col-md-2 control-label" for="txtAgentState">Nota R: </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtnota" id="txtnota" class="form-control" placeholder="" required="" readonly="readonly"><p>
                        </div> 
                       <label class="col-md-2 control-label" for="txtAgentState">Guia : </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtguia" id="txtguia" class="form-control" placeholder="" required="" readonly="readonly"><p>
                        </div> 
                       <label class="col-md-2 control-label" for="txtAgentState">Humedad: </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txthum" id="txthum" class="form-control" placeholder="" required="" readonly="readonly"><p>
                        </div>
                       <label class="col-md-2 control-label" for="txtAgentState">Rendimiento: </label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtrend" id="txtrend" class="form-control" placeholder="" required="" readonly="readonly"><p>
                        </div>
                        <label class="col-md-2 control-label" for="txtAgentState">Sacos :</label>
                        <div class="col-md-10">
                            <p><input type="number" name="txtsf" id="txtsf" step="0.01" class="form-control" placeholder="Sacos en fisico" required=""  ><p>
                        </div>
                        <label class="col-md-2 control-label" for="txtAgentState">QQ:</label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtqf" id="txtqf" step="0.01" class="form-control" placeholder="Quintales en fisico" required=""  ><p>

                        </div>
                        <label class="col-md-2 control-label" for="txtAgentState">Observacion:</label>
                        <div class="col-md-10">
                            <p><input type="text" name="txtob" id="txtob" class="form-control" placeholder="Observacion" required=""  ><p>

                        </div>

                     <p>
                          
                       </p>
                    
                      
                     
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger" aria-hidden="true">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
        
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
        
        
        function leerkardex(p_n,p_cp,p_nota,p_guia,p_h,p_r, p_l, p_s, p_u,p_ob){
         
           
                $("#txtcp").val(p_cp);
                $("#txtnota").val(p_nota);
                $("#txtguia").val(p_guia);
                $("#txtn").val(p_n);
                $("#txthum").val(p_h);
                $("#txtrend").val(p_r);
                $("#txtlsu").val(p_l+' - '+p_s+' - '+p_u);
                $("#txtob").val(p_ob);



          

        


            
        
            //identificaOperacion(2);

            /*$.post( "grabarcardex.php", { cp: p_cp , qf: p_qf , sf: p_sf })
            .done(function( data ) {
                
                
            },"json");
            
           

            //identificaOperacion(2);*/

        }

        function gc(idp,v,ub,p){
         
           if(confirm("Desea guardar la revision?"))
                {
                           
                    $.post( "grabarrevision.php", { ub: ub, v:v, idp:idp, p:p})
                    .done(function(data) {
                        console.log(data);
                        
                        alert("Revision Guardada");
                    });
                        
                
                       
                }
              
               
               javascript:location.reload()


          

        


            
        
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
