<?php

            
            $cod_al = $_POST["cod_al"];
            require_once '../negocio/kardex.php';
            $objkardex = new kardex();

            session_name("academico");
            session_start();
            
            setcookie("ru", $cod_al);
            
            if (isset($_GET["pagina_actual"])){
                $pagina_actual = $_GET["pagina_actual"];
            }else{
                $pagina_actual = 1;
            }
            
            $objkardex->listar($pagina_actual,$cod_al);
?>



