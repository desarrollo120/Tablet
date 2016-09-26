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
/*$usuario = 'dtch10';
$link = mysql_connect('localhost', 'diego', '123');
   
mysql_select_db('almacen');

// Realizar una consulta MySQL
$query = "select id, nombres, apellidos, usu, clave from usuario where usu='".$usuario."'";
$resultado = mysql_query($query,$link);

$row1=array();


while ($row=mysql_fetch_array($resultado)) { //Bucle para ver todos los registros
                      array_push($row1,$row);

                       
}

var_dump($row1);*/


class Conexion {

        private function conectar() {

            /*$serverName = "SISTEMAS-PC"; //serverName\instanceName
            $connectionInfo = array( "Database"=>"almacen", "UID"=>"sa", "PWD"=>"sa");
            $conn = sqlsrv_connect($serverName,$connectionInfo);
            return $conn;*/

            $link = mysql_connect('localhost', 'root', '');
            
   
            mysql_select_db('almacen');
            mysql_query("SET NAMES 'utf8'");
            return $link;

        }
        
        public function consultar($cadenaSql){
            $resultado = 0;
            $row1=array();
            try {
                $conexion = $this->conectar();
                //$resultado = sqlsrv_query($conexion, $cadenaSql);
                $resultado = mysql_query($cadenaSql, $conexion);

                while ($row=mysql_fetch_array($resultado)) { //Bucle para ver todos los registros
                      array_push($row1,$row);

                } 

                //while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {
                    //array_push($row1,$row);
                //}
                //$row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC);
            } catch (Exception $exc) {
                $resultado = 0;
                echo $exc->getMessage();
                exit();
            }
         
        return $row1; 
            
        }

        public function accion($cadenaSql){
            $resultado = 0;
            $row1=1;
            try {
                $conexion = $this->conectar();
                //$resultado = sqlsrv_query($conexion, $cadenaSql);
                mysql_query($cadenaSql, $conexion);
            } catch (Exception $exc) {
                $resultado = 0;
                echo $exc->getMessage();
                exit();
            }
         
        return $row1; 
            
        }


    }
   
?>
