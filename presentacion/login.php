<?php
    $usuario = $_POST["txtusuario"];
    $clave  = $_POST["txtclave"];
    $recordar = 'N';

    if(isset($_POST["recordar"])){
        $recordar=$_POST["recordar"];
    }
    

    require_once '../negocio/sesion.php';
    require_once '../util/funciones.php';
    
    $objSesion = new Sesion();
    
   
    
    
 
    
   
    
    if ($objSesion->iniciarSesion($usuario, $clave, $recordar)){
        header("location:iniciolo.php");
    }else{
        Funciones::mensaje("Usuario o password incorrectos", "index.php", "i");
    }



?>