<?php
    class insite {

        public function listarsite($v){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select *from insite";
            $resultado = $objCon->consultar($sql);
            
            

             echo '
                 <br><br><br><br><br><br><center><div class="container">
                    <p>
                        <div class="btn-group-vertical btn-group-lg">
                ';
            
         

            foreach($resultado as $registro){

                  


                   echo '<a href="bandeja.php?tp='.$registro['idSite'].'&ta='.$v.'"><button type="button" style="width:310px; height:175px" class="btn btn-primary">'.$registro['descripcion'].'</button></a><br>';
                    
                   
            }

        
            
            echo '              </div>


                    </p>
                    
                   
                    
                </div></center>
                ';
            
        






        

            
        }
    }
    
    /*$objsite = new site();
    $resultado = $objsite->cargaralmacen();
    print_r($resultado);*/
  
    
    
?>
