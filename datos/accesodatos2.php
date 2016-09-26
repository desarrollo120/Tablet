<?php
    class Conexion {
        private function conectar() {
            $direccion  = "sqlsrv:Server=PHDIEGOT;Database=almacen";
            $usuario    = "sa";
            $clave      = "sa";

            $dblink = new PDO($direccion,$usuario,$clave);
            $dblink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $dblink;
        }
        
        public function consultar($cadenaSql){
            $resultado = 0;
            try {
                $conexion = $this->conectar();
                $resultado = $conexion->query($cadenaSql);
            } catch (Exception $exc) {
                $resultado = 0;
                echo $exc->getMessage();
                exit();
            }
            
            return $resultado;
        }
    }
    
?>
