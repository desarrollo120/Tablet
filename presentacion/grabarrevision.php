<?php
    session_name("academico");
    session_start();
    
    if ( ! isset($_SESSION["usuario"])){
        header("location:index.php");
    }

    $idp = $_POST["idp"];
    $l = $_POST["v"];
    $ub = $_POST["ub"];
    $s = $_POST["p"];

    echo $idp;
    echo $l.$ub.$s;

    $u = $_SESSION["personal"];
    $hoy = getdate();
    
    $fechayhora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];

    

    require_once '../negocio/kardex.php';

        $objkardex = new kardex();
        $objkardex->revisado      = 1;
        $objkardex->idp          = $idp;
        $objkardex->l       = $l;
        $objkardex->ub       = $ub;
        $objkardex->site     = $s;


        $objkardex->cs       = 1;
       
        $objkardex->usu        = $u;
        $objkardex->fa        = $fechayhora;


        $resultado = $objkardex->grt();

        


        if ($objkardex->grt()==1){
            require_once '../util/funciones.php';
            Funciones::mensaje("Grabado correctamente","galmacenrup-detalle.php?r=".$ub."&tp=".$s."&ta=".$l."&idp=".$cp."", "s");
               
        } 

   
            

    
?>
