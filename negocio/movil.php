<?php
    class Movil {
        public function cargarmovil(){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select *from movil order by nombre";
            $resultado = $objCon->consultar($sql);
            
            $retorno = null;
            
            $i=0;
            while($registro = $resultado->fetch()){
                $i++;
                $retorno[$i]["ip"]  = $registro["ip"];
                $retorno[$i]["nombre"]      = $registro["nombre"];
            }
            
            return $retorno;
            
        }


        public function llenarmovil() {
            require_once '../negocio/movil.php';
            $objMovil = new Movil();
            $resultado = $objMovil->cargarmovil();
            
            for ($i=1; $i<=count($resultado); $i++){
                //echo '<option value="'.$resultado[$i]["codigoarea"].'">'.$resultado[$i]["nombre"].'</option>';
                echo '<option value="'.$resultado[$i]["ip"].'">'.$resultado[$i]["nombre"].'</option>';
            }
        }
        
    }
    /*
    $objArea = new Area();
    $resultado = $objArea->cargarArea();
    print_r($resultado);
    */
    
?>
