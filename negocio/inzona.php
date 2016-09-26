<?php
    class inzona {

        public function listarzona($a,$tp,$ta){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select *from inzona where idAlmacen=".$a." and idLugar='".$ta."'";
         
            $resultado = $objCon->consultar($sql);
            
            

             echo '
                 <br><br><br><br><br><br><center><div class="container">
                    <p>
                        <div class="btn-group">
                ';
            
         

            foreach($resultado as $registro){

                    if($registro['estado']=='A'){


                   echo '<a href="galmacenru.php?z='.$registro['idZona'].'&variable1='.$a.'&tp='.$tp.'&ta='.$ta.'"><button type="button" style="width:310px; height:175px" class="btn btn-primary">'.$registro['descripcion'].'</button></a>';
                    
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
