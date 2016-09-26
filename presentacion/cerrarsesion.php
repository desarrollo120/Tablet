<?php

    session_name("academico");
    session_start();
    
    unset($_SESSION["usuario"]);
    unset($_SESSION["personal"]);
    unset($_SESSION["tu"]);
    
    
    header("location:index.php");

?>
