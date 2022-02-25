<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

$cont=0;
$fecha_rec="";
$query = "SELECT * FROM registros WHERE fecha_ini NOT LIKE '' ORDER By id DESC";
   
    $resultado = $conn->query($query);
    
    
    	while ($fila = $resultado->fetch_assoc()) {
            if($fech != $fila['fecha_ini']){

                $cont= $cont + 1;
        
                $fech = $fila['fecha_ini'];
                
            }
                }

        while($cont > 30){
        $cont= $cont - 1;
         $query = "SELECT fecha_records FROM registros LIMIT 1";
         $resultado = $conn->query($query);
         while ($fr = $resultado->fetch_assoc()) {
            $fecha_rec = $fr['fecha_records'];
            }
        $del = "DELETE FROM registros WHERE fecha_records = '$fecha_rec'";
	    $ress = $conn->query($del);
        $del_conex = "DELETE FROM conex WHERE fecha_records_conex = '$fecha_rec'";
	    $ress_conex = $conn->query($del_conex);
        }
    ?>