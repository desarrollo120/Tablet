<?php

/*$serverName = "PHDIEGOT"; //serverName\instanceName
$connectionInfo = array( "Database"=>"almacen", "UID"=>"sa", "PWD"=>"sa");


$conn = sqlsrv_connect($serverName,$connectionInfo);

if($conn) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
}

$sql = "SELECT idu, nombre FROM usuario";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['idu'].", ".$row['nombre']."<br />";
}

sqlsrv_free_stmt( $stmt);

*/
class Conexion {

        private function conectar() {

            $serverName = "SISTEMAS-PC"; //serverName\instanceName
            $connectionInfo = array( "Database"=>"almacen", "UID"=>"sa", "PWD"=>"sa");
            $conn = sqlsrv_connect($serverName,$connectionInfo);
            return $conn;
        }
        
        public function consultar($cadenaSql){
            $resultado = 0;
            $row1=array();
            try {
                $conexion = $this->conectar();
                $resultado = sqlsrv_query($conexion, $cadenaSql);

                while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {
                    array_push($row1,$row);
                }
                //$row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
            } catch (Exception $exc) {
                $resultado = 0;
                echo $exc->getMessage();
                exit();
            }
         
        return $row1; 
            
        }


    }
   
?>
