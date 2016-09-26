<?php

    class kardex {
        
        public $idp;
        public $nombrep;
        public $site;
        public $ub;
        public $l;
        public $qqsis;
        public $sacossis;
        public $qqfi;
        public $sacosfis;
        public $revisado;
        public $fa;
        public $usu;
        public $cs;
        public $nota;
        public $guia;
        public $hum;
        public $rend;
        public $ob;


    
        
        public function listar($pagina_actual,$v,$p,$ub,$z,$a){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            
           


            //exit();
            $sql = "select idLugar as lugar,idAlmacen,siteid as site,idUbicacion as ub,idProducto as codigo, sum(revisado) as revisado, 
                    sum(sacos_fisico) as sf, ROUND(sum(qty_fisico),2) as qf,
                    sum(sacos_sistema) as ssis, ROUND(sum(qty_sistema),2) as qsis
                    from inkardex 
                    where idLugar='".$v."'  and siteid='".$p."' and idUbicacion='".$ub."'  
                    GROUP BY idLugar,idAlmacen,siteid,idUbicacion,idProducto";

            $sql3 = "select idLugar as lugar,idAlmacen,siteid as site,idUbicacion as ub, sum(revisado) as revisado, 
                    sum(sacos_fisico) as sf, ROUND(sum(qty_fisico),2) as qf, sum(sacos_sistema) as ssis, 
                    ROUND(sum(qty_sistema),2) as qsis from inkardex 
                    where idLugar='".$v."'  and siteid='".$p."' and idUbicacion='".$ub."'  
                    GROUP BY idLugar,idAlmacen,siteid,idUbicacion";      




                    
                         
            //echo $sql3;
            
            //exit();
       
           
         
            $total = $objCon->consultar($sql3);
     
            

                
                         
            //echo $sql;
            
            //exit();
       
            $resultado = $objCon->consultar($sql);
            

           
            //echo $sql;            
            echo '
                <div id="c1" class="panel panel-default">
                    <div id="c2" class="panel-heading"><b><center>Listado de productos</center></b></div>
                        <div id="c3" class="panel-body">
                            <div id="c4 class="table-responsive table-hover">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th colspan="1">&nbsp;</th>
                                      <th>Producto</th>
                                      <th>QQ Sistema</th>
                                      <th>Sacos Sistema</th>
                                      <th>QQ Fisico</th>
                                      <th>Sacos Fisico</th>
                                      <th>Revisado</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                ';
            
         

     

            foreach($resultado as $registro){

                    $sql2 = "select idProducto, COUNT(*) as cantidad
                    from inkardex
                     
                    where idLugar='".$v."' and siteid='".$p."' and idUbicacion='".$ub."' 
                    and idProducto='".$registro['codigo']."'

                    group by idProducto";  

                    $cantidad = $objCon->consultar($sql2);
       
                        //$registro = $resultado->fetch();
                        foreach($cantidad as $c){

                            $cr=$c['cantidad'];
                        }
                       

       
                   echo '<tr>';
                    echo '<td><a href="galmacenrup-detalle.php?r='.$registro['ub'].'&tp='.$registro['site'].'&ta='.$registro['lugar'].'&idp='.$registro['codigo'].'"><img src="../images/editar2.png"/></a></td>';
                    echo '<td>'.$registro['codigo'].'</td>';             
                    echo '<td>'.$registro['qsis'].'</td>';
                    echo '<td>'.$registro['ssis'].'</td>';
                    
                    if($registro['revisado']<$cr){
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                    }
                    else{
                        echo '<td>'.$registro['qf'].'</td>';
                        echo '<td>'.$registro['sf'].'</td>';
                        echo '<td><img src="../images/ok.png"/></td>';
                    }
                    
               echo '</tr>';
            }

            echo '<td></td>'; 
            echo '<td><b>TOTAL</b></td>'; 
            foreach($total as $totalr){

                echo '<td><b>'.$totalr['qsis'].'</b></td>';
                echo '<td><b>'.$totalr['ssis'].'</b></td>';
        
           } 

           echo '<td></td>'; 
           echo '<td></td>'; 
           echo '<td></td>'; 

            echo '              </tbody>
                          </table>
                    </div>
                </div>
            </div>
                ';
            
            
        }



        

        public function listarreporte(){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            
            $sqla = "SELECT idLugar AS lugar, idAlmacen, siteid AS site, idUbicacion AS ub
                    FROM inkardex
                    WHERE idLugar =  'CH'
                    AND siteid =  'MPCH'
                    GROUP BY idLugar, idAlmacen, siteid";
                                        
                         
            //echo $sql;
            
            //exit();
       
            $resultadoa = $objCon->consultar($sqla);



            echo '
                <div id="c1" class="panel panel-default">
                <div id="c2" class="panel-heading"><b><center>Reporte Inventario</center></b></div>';

        foreach($resultadoa as $registroa){
               
                echo '<div  class="panel-heading"><b><center>Almacen N° '.$registroa['idAlmacen'].' </center></b></div>';




            //exit();
            $sql = "SELECT idLugar AS lugar, idAlmacen, siteid AS site, idUbicacion AS ub
                    FROM inkardex
                    WHERE idLugar =  'CH'
                    AND siteid =  'MPCH' and idAlmacen='".$registroa['idAlmacen']."'
                    GROUP BY idLugar, idAlmacen, siteid, idUbicacion";
                    
                         
            //echo $sql;
            
            //exit();
       
            $resultado = $objCon->consultar($sql);
            

           
            //echo $sql;            
            




            foreach($resultado as $registro){

                echo   '<div id="c3" class="panel-body">
                            <div id="c4 class="table-responsive table-hover">
                                <table class="table">
                                
                                <div  class="panel-heading"><b>Ubicacion : '.$registro['ub'].'</b></div>
                                  <thead>
                                    <tr>
                                      <th>Producto</th>
                                      <th>QQ Sistema</th>
                                      <th>Sacos Sistema</th>
                                      <th>QQ Fisico</th>
                                      <th>Sacos Fisico</th>
                                      <th>Revisado</th>
                                    </tr>
                                  </thead>
                                  
                                  </div>
                                  <tbody>
                ';
            

                $sqlu = "SELECT idLugar AS lugar, idAlmacen, siteid AS site, idUbicacion AS ub, 
                    idProducto AS codigo, SUM( revisado ) AS revisado, SUM( sacos_fisico ) AS sf, 
                    ROUND( SUM( qty_fisico ) , 2 ) AS qf, SUM( sacos_sistema ) AS ssis, 
                    ROUND( SUM( qty_sistema ) , 2 ) AS qsis
                    FROM inkardex
                    WHERE idLugar =  'CH'
                    AND siteid =  'MPCH' AND idAlmacen =  '".$registro['idAlmacen']."'
                    AND idUbicacion =  '".$registro['ub']."'
                    GROUP BY idLugar, idAlmacen, siteid, idUbicacion, idProducto";

                         //echo $sql;
                        
                        //exit();
                   
                        $resultadou = $objCon->consultar($sqlu);



                 foreach($resultadou as $registrou){   




                    $sqlr = "select idProducto, COUNT(*) as cantidad
                    from inkardex
                     
                    where idLugar ='CH' AND siteid =  'MPCH'   and idUbicacion='".$registrou['ub']."' 
                    and idProducto='".$registrou['codigo']."'

                    group by idProducto";  



                    $cantidad = $objCon->consultar($sqlr);
       
                        //$registro = $resultado->fetch();
                        foreach($cantidad as $c){

                            $cr=$c['cantidad'];
                        }
                       

       
                   echo '<tr>';
                    
                    echo '<td>'.$registrou['codigo'].'</td>';             
                    echo '<td>'.$registrou['qsis'].'</td>';
                    echo '<td>'.$registrou['ssis'].'</td>';
                    
                    if($registrou['revisado']<$cr){
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                    }
                    else{
                        echo '<td>'.$registrou['qf'].'</td>';
                        echo '<td>'.$registrou['sf'].'</td>';
                        echo '<td><img src="../images/ok.png"/></td>';
                    }
                    
               echo '</tr>';
              }
            }
        
            
            echo '              </tbody>
                          </table>
                    </div>
                 </div>';

          }
          
          echo '       
                </div>
            </div>

                ';
            
            
        }
        
        
      
        
         public function listarb($pagina_actual,$v,$p,$ub){
             require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            
           


            //exit();
            $sql = "select idLugar as lugar,idAlmacen,siteid as site,idUbicacion as ub,idProducto as codigo, sum(revisado) as revisado, 
                    sum(sacos_fisico) as sf, ROUND(sum(qty_fisico),2) as qf,
                    sum(sacos_sistema) as ssis, ROUND(sum(qty_sistema),2) as qsis
                    from inkardex 
                    where idLugar='".$v."'  and siteid='".$p."' and idUbicacion='".$ub."'  
                    GROUP BY idLugar,idAlmacen,siteid,idUbicacion,idProducto";
     
            

           

            $sql3 = "select idLugar as lugar,idAlmacen,siteid as site,idUbicacion as ub, sum(revisado) as revisado, 
                    sum(sacos_fisico) as sf, ROUND(sum(qty_fisico),2) as qf, sum(sacos_sistema) as ssis, 
                    ROUND(sum(qty_sistema),2) as qsis from inkardex 
                    where idLugar='".$v."'  and siteid='".$p."' and idUbicacion='".$ub."'  
                    GROUP BY idLugar,idAlmacen,siteid,idUbicacion";      




                    
                         
        
       
            $resultado = $objCon->consultar($sql);
           
            $total = $objCon->consultar($sql3);
       
            //$registro = $resultado->fetch();
           

           
            //echo $sql;            
            echo '
                <div id="c1" class="panel panel-default">
                    <div id="c2" class="panel-heading"><b><center>Listado de productos</center></b></div>
                        <div id="c3" class="panel-body">
                            <div id="c4 class="table-responsive table-hover">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th colspan="1">&nbsp;</th>
                                      <th>Producto</th>
                                      <th>QQ Sistema</th>
                                      <th>Sacos Sistema</th>
                                      <th>QQ Fisico</th>
                                      <th>Sacos Fisico</th>
                                      <th>Revisado</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                ';
            
         

     

            foreach($resultado as $registro){

                   $sql2 = "select idProducto, COUNT(*) as cantidad
                    from inkardex
                     
                    where idLugar='".$v."' and siteid='".$p."' and idUbicacion='".$ub."' 
                    and idProducto='".$registro['codigo']."'

                    group by idProducto";  

                    $cantidad = $objCon->consultar($sql2);
       
                        //$registro = $resultado->fetch();
                        foreach($cantidad as $c){

                            $cr=$c['cantidad'];
                        }
                       

       
                   echo '<tr>';
                    echo '<td><a href="galmacenrup-detalle.php?r='.$registro['ub'].'&tp='.$registro['site'].'&ta='.$registro['lugar'].'&idp='.$registro['codigo'].'"><img src="../images/editar2.png"/></a></td>';
                    echo '<td>'.$registro['codigo'].'</td>';             
                    echo '<td>'.$registro['qsis'].'</td>';
                    echo '<td>'.$registro['ssis'].'</td>';
                    
                    if($registro['revisado']<$cr){
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                        echo '<td>-</td>';
                    }
                    else{
                        echo '<td>'.$registro['qf'].'</td>';
                        echo '<td>'.$registro['sf'].'</td>';
                        echo '<td><img src="../images/ok.png"/></td>';
                    }
                    
               echo '</tr>';
            }

              echo '<td></td>'; 
              echo '<td><b>TOTAL</b></td>'; 
              foreach($total as $totalr){
                echo '<td><b>'.$totalr['qsis'].'</b></td>';
                echo '<td><b>'.$totalr['ssis'].'</b></td>';
              }
        
                echo '<td></td>'; 
                echo '<td></td>'; 
                echo '<td></td>'; 
                echo '              </tbody>
                          </table>
                    </div>
                </div>
            </div>
                ';
            
            
            
        }
        
        

      /* public function llenarArea() {
            require_once '../negocio/area.php';
            $objArea = new Area();
            $resultado = $objArea->cargarArea();
            
            for ($i=1; $i<=count($resultado); $i++){
                //echo '<option value="'.$resultado[$i]["codigoarea"].'">'.$resultado[$i]["nombre"].'</option>';
                echo '<option value="'.$resultado[$i]["codigoarea"].'">'.$resultado[$i]["nombre"].'</option>';
            }
        }
        */

        public function listardetalle($pagina_actual,$v,$p,$ub,$z,$a,$idp){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            
           


            //exit();
            $sql = "select inkardex.idProducto as codigo, inkardex.idLugar as lugar, inkardex.idAlmacen as ida,
                    inkardex.siteid as site, inkardex.idUbicacion as ub, producto.descr as nombre, 
                    inkardex.FechaNR as fechanr,
                    inkardex.qty_sistema as qsis, inkardex.sacos_sistema as ssis, 
                    inkardex.sacos_fisico as sf, inkardex.qty_fisico as qf, inkardex.fechapase as fechapase,
                    inkardex.NotaR as notar, inkardex.GuiaR as guiar, inkardex.Hum as hum, inkardex.Rend as rend,
                    inkardex.revisado as revisado, inkardex.observacion as ob
                    from producto 
                    inner join inkardex on inkardex.idProducto = producto.idProducto  
                    where inkardex.idLugar='".$v."'  and inkardex.siteid='".$p."' and inkardex.idUbicacion='".$ub."' 
                    and inkardex.idProducto='".$idp."'
                    order by inkardex.FechaNR";
     
            


     
           //echo $sql;
            
            //exit();
       
            $resultado = $objCon->consultar($sql);
       
            //$registro = $resultado->fetch();
            //var_dump($resultado);
            //exit();

           
            //echo $sql;


            
            echo '
                <div id="c1" class="panel panel-default">
                    <div id="c2" class="panel-heading"><b><center>Listado de productos</center></b></div>
                        <div id="c3" class="panel-body">
                            <div id="c4" class="table-responsive table-hover">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th colspan="1">&nbsp;</th>
                                      <th>Fecha</th>
                                      <th>Nota </th>
                                      <th>Guia</th>
                                      <th>Humedad</th>
                                      <th>Rendimiento</th>
                                      <th>Sacos Sistema</th>
                                      <th>QTY Sistema</th>
                                      <th>Sacos Fisico</th>
                                      <th>QTY Fisico</th>
                                      <th colspan="1">&nbsp;</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                ';
            
         

     

            foreach($resultado as $registro){

       
                   echo '<tr>';
                    echo '<td><a href="#" onclick="leerkardex(\''.$registro['nombre'].'\',\''.$registro['codigo'].'\',\''.$registro['notar'].'\',\''.$registro['guiar'].'\',\''.$registro['hum'].'\',\''.$registro['rend'].'\',\''.$registro['lugar'].'\',\''.$registro['site'].'\',\''.$registro['ub'].'\',\''.$registro['ob'].'\')"data-toggle="modal" data-target="#myModal"><img src="../images/editar2.png"/></a></td>';
                    echo '<td>'.substr($registro['fechanr'],0,10).'</td>';             
                    echo '<td>'.$registro['notar'].'</td>';
                    echo '<td>'.$registro['guiar'].'</td>';
                    echo '<td>'.$registro['hum'].'</td>';
                    echo '<td>'.$registro['rend'].'</td>';
                    echo '<td>'.$registro['ssis'].'</td>';
                    echo '<td>'.$registro['qsis'].'</td>';
                    echo '<td>'.$registro['sf'].'</td>';
                    echo '<td>'.$registro['qf'].'</td>';
                    if($registro['revisado']==1){
                        echo '<td><img src="../images/visto.png"/></td>';
                        
                    }
                    else{
                         echo '<td>-</td>';
                    }
                    
                    
               echo '</tr>';
            }
        
            
            echo '              </tbody>
                          </table>
                    </div>
                </div>
            </div>
                ';
            
            echo '<center><a href="galmacenrup.php?r='.$registro['ub'].'&z='.substr($registro['ub'],0,3).'&variable1='.$registro['ida'].'&tp='.$registro['site'].'&ta='.$registro['lugar'].'"><button type="button"  class="btn btn-primary">Atras</button></a>              ';
            echo '<a onclick="gc(\''.$idp.'\',\''.$v.'\',\''.$ub.'\',\''.$p.'\')"><button type="button"  class="btn btn-primary">Guardar revision</button></a></center>';
            
        }




        public function agregar() {
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "insert into jugador (dni,apellidos,nombres,club,telefono,correo,clave,posicion)";
            $sql .= "values('".$this->dni."',";
            $sql .= "'".$this->apellidos."',";
            $sql .= "'".$this->nombres."',";
            $sql .= "'".$this->club."',";
            $sql .= "'".$this->telefono."',";
            $sql .= "'".$this->correo."',";
            $sql .= "'".$this->clave."',";
            $sql .= "'".$this->posicion."')";
            

      
            if ($objCon->consultar($sql)!=0){
                return 1;
            }
            
            return 0;
        }
        
        
        public function editar() {
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "update ind_kardex set ";
            $sql .= "sacos_fisico='".$this->apellidos."',";
            $sql .= "qty_fisico='".$this->nombres."',";
            $sql .= "revisado='".$this->direccion."',";
            $sql .= "fechaactualiza='".$this->telefono."',";
            $sql .= "userrevisado=".$this->codigoArea."";
            $sql .= " where invtId='".$this->idp."'";
            
            if ($objCon->consultar($sql)!=0){
                return 1;
            }
            
            return 0;
        }

         function grabarcardex(){ 

            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "update in_kardex SET sacos_fisico=".$this->sacosfis.", qty_fisico=".$this->qqfi.", revisado=1, fechaactualiza='".$this->fa."', userrevisado='".$this->usu."' WHERE invtId='".$this->idp."' and whseloc='".$this->ub."' and siteId =".$this->site."";

            if ($objCon->consultar($sql)!=0){
                return 1;
            }
            else {
              return 0;   
            }
          

            //identificaOperacion(2);

        }
        
        function grevisado(){ 



            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "update inkardex SET sacos_fisico=".$this->sacosfis.", qty_fisico=".$this->qqfi." ,
                    revisado=".$this->revisado.", fechaactualiza='".$this->fa."', UserRevisado='".$this->usu."', 
                    cs=".$this->cs.", observacion= '".$this->ob."'
                    WHERE idProducto='".$this->idp."' and idLugar='".$this->l."' and siteid='".$this->site."' 
                    and idUbicacion ='".$this->ub."' and NotaR='".$this->nota."' and GuiaR='".$this->guia."' 
                    and cast(Hum as decimal) =cast(".$this->hum." as decimal) 
                    and cast(Rend as decimal) =cast(".$this->rend." as decimal)";
            
            if ($objCon->accion($sql)!=0){
                return 1;
            }
            else {
                return 0;   
            }
          

            //identificaOperacion(2);

        }
        function grt(){ 



            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "update inkardex SET revisado=".$this->revisado.", fechaactualiza='".$this->fa."', 
                    UserRevisado='".$this->usu."', cs=".$this->cs." 
                    WHERE idProducto='".$this->idp."' and siteid='".$this->site."' and idLugar='".$this->l."' 
                    and idUbicacion='".$this->ub."' ";
            
            if ($objCon->accion($sql)!=0){
                return 1;
            }
            else {
                return 0;   
            }
          

            //identificaOperacion(2);

        }
        public function eliminar($dni){
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "delete from jugador where dni='".$dni."'";
            
            if ($objCon->consultar($sql)!=0){
                return 1;
            }
            return 0;
        }
        
        public function buscar($cp) {
            require_once '../datos/accesodatos.php';
            $objCon = new Conexion();
            $sql = "select invtId from in_kardex where invtId='".$cp."'";
            
            $resultdo = $objCon->consultar($sql);
            
         
            
            return $resultdo;


            
        }

    }

?>
