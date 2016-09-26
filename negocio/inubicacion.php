<?php
    class inubicacion {

        public function listarubicacion($z,$a,$tp,$ta){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select *from inubicacion where idAlmacen=".$a." and idLugar='".$ta."' and idZona='".$z."'";
         
            $resultado = $objCon->consultar($sql);
            
            

             echo '
                 <br><br><br><br><br><br><center><div class="container">
                    <p>
                        <div class="btn-group">
                ';
            
         

            foreach($resultado as $registro){

                    if($registro['estado']=='A'){

                   echo '<a href="galmacenrup.php?r='.$registro['idUbicacion'].'&z='.$z.'&variable1='.$a.'&tp='.$tp.'&ta='.$ta.'"><button type="button" style="width:310px; height:175px" class="btn btn-primary">'.$registro['descripcion'].'</button></a>';
                    
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
