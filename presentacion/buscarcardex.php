<?php
    session_name("academico");
    session_start();
    
    if ( ! isset($_SESSION["usuario"])){
        header("location:index.php");
    }

$ub = $_POST["ub"];
$l = $_POST["ta"];
$s = $_POST["s"];






       
  

            
            

            require_once '../negocio/kardex.php';
            $objkardex = new kardex();
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objkardex->listarb($pagina_actual,$l,$s,$ub);

            
            /*require_once '../negocio/jugador.php';
            $objJugador = new Jugador();
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objJugador->listar($pagina_actual );*/
        

    
?>
