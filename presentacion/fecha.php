<?php 
$localtime = time();
$localtime_assoc = localtime(time(), true);
$fecha = date("Y-m-d ");

var_dump($localtime);
echo '<br>'.$fecha;


$hoy = getdate();
var_dump($hoy);


$fechayhora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
echo $fechayhora;

//print_r($localtime);
//print_r($localtime_assoc);

?>