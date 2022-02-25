<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 4){
            header('location: ../../in_out/login.php');
            
        }
    }
?>
<?php
    $con_ip = $_POST['con_ip'];

    $mysqli = new mysqli('localhost', 'root', 'porthos*13100', 'porthos');
    $sql = "SELECT * FROM pozos WHERE ip = '$con_ip'";
	$resultado = $mysqli->query($sql);
    $row = $resultado->fetch_array(MYSQLI_ASSOC);
    $con_pozo=  $row['nombre'];
    
	$fecha_ini_conex = $_SESSION['fecha'];
	$fecha_records_conex = $_SESSION['fecha_r'];
	$hora_ini_conex = $_SESSION['hora'];
	$fecha_conex=date('l j F Y');
	$hora_conex=date("H:i:s");
	 $conexion=mysqli_connect('localhost','root','porthos*13100','porthos');
     $sql="INSERT INTO conex (fecha_ini_conex, fecha_records_conex, hora_ini_conex, fecha_conex, pozo_conex, ip_conex, hora_conex) VALUES ('$fecha_ini_conex', '$fecha_records_conex', '$hora_ini_conex', '$fecha_conex', '$con_pozo', '$con_ip', '$hora_conex')";
     $result=mysqli_query($conexion,$sql);
	?> 

