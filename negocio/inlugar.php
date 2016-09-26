<?php
    class inlugar {

        public function listarlugar(){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select *from inlugar";
            $resultado = $objCon->consultar($sql);
            
            

             echo '
                 <br><br><br><br><br><br><center><div class="container">
                    <p>
                        <div class="btn-group-vertical btn-group-lg">
                ';
            
         

            foreach($resultado as $registro){

                  if($registro['estado']=='A'){


                   echo '<a href="iniciop.php?ta='.$registro['idLugar'].'"><button type="button" style="width:310px; height:175px" class="btn btn-primary">'.$registro['descripcion'].'</button></a><br>';
                    
                   }
            }

        
            
            echo '              </div>


                    </p>
                    
                   
                    
                </div></center>
                ';
            
              

            
        }


        public function listarlugarb(){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select *from inlugar";
            $resultado = $objCon->consultar($sql);
            
            

             echo '
                 <br><br><br><br><br><br><center><div class="container">
                    <p>
                        <div class="btn-group-vertical btn-group-lg">
                ';
            
         

            foreach($resultado as $registro){

                  if($registro['estado']=='A'){


                   echo '<a href="bporub.php?ta='.$registro['idLugar'].'"><button type="button" style="width:310px; height:175px" class="btn btn-primary">'.$registro['descripcion'].'</button></a><br>';
                    
                   }
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
