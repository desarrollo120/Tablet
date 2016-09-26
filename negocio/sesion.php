<?php
    class Sesion {
        function iniciarSesion($usuario, $clave, $recordar) {
            require_once '../datos/accesodatos.php';


            $objConexion = new Conexion();

            //$sql = "SELECT Id, Activo FROM Prueba ";
            $sql = "select id, nombres, apellidos, usu, clave, tipou from usuario where usu='".$usuario."'";

            $resultado = $objConexion->consultar($sql);

            if(count($resultado)>0){
                if (rtrim(ltrim($resultado[0]['clave'])) == $clave){
                    session_name("academico");
                    session_start();
                    $_SESSION["tu"] = $resultado[0]['tipou'];
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["personal"] = $usuario;
                    if ($recordar=="S"){ 
                        setcookie("recordardatos", $usuario);
                    }else{
                        setcookie("recordardatos", "");
                    }
                    return TRUE;
                }else{
                    return FALSE;
                }

            }                
        }

       


        
    }
?>
