<?php

    session_name("academico");
    session_start();
    
    if ( ! isset($_SESSION["usuario"])){
        header("location:index.php");
    }


   
    
    
  

        $cp = $_POST["txtcp"];
        $nota = $_POST["txtnota"];
        $guia = $_POST["txtguia"];
        $hum = $_POST["txthum"];
        $rend = $_POST["txtrend"];
        $l = substr($_POST["txtlsu"], 0, 2);
        $s = substr($_POST["txtlsu"], 5, 4);
        $ub = substr($_POST["txtlsu"], 12, 9);
   
        
        $r=substr($ub, 3, 2);
        if($r<10){
            $r=substr($r, 1, 1);
        }
        $z=substr($ub, 2, 1);
        $na=substr($ub, 0, 2);
        if($na<10){
            $na=substr($na, 1, 1);
        }
        

        $qf = $_POST["txtqf"];
        $sf = $_POST["txtsf"];
        $u = $_SESSION["personal"];
        $ob = $_POST["txtob"];


        $hoy = getdate();
    
        $fechayhora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
        



        require_once '../negocio/kardex.php';

        $objkardex = new kardex();
        $objkardex->revisado      = 1;
        $objkardex->idp          = $cp;
        $objkardex->site     = $s;
        $objkardex->ub       = $ub;
        $objkardex->l       = $l;
        $objkardex->cs       = 1;
        $objkardex->nota       = $nota;
        $objkardex->guia       = $guia;
        $objkardex->hum       = $hum;
        $objkardex->rend       = $rend;

        $objkardex->qqfi     = $qf;
        $objkardex->sacosfis      = $sf;
        $objkardex->usu        = $u;
        $objkardex->fa        = $fechayhora;
        $objkardex->ob       = $ob;

        


       

        $resultado = $objkardex->grevisado();

        


        if ($objkardex->grevisado()==1){
            require_once '../util/funciones.php';
            Funciones::mensaje("Grabado correctamente","galmacenrup-detalle.php?r=".$ub."&tp=".$s."&ta=".$l."&idp=".$cp."", "s");
               
        } 


        


            
    
    
?>