<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: ../../ut/login.php');
            
        }
    }
?>
<?php
	
	require '../../db/conexion_crud.php';

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$ip = $_POST['ip'];
	$net_mask = $_POST['net_mask'];
	$gw = $_POST['gw'];
	$prod_est = $_POST['prod_est'];
	
	$sql = "UPDATE pozos SET nombre='$nombre', ip='$ip', net_mask='$net_mask', gw='$gw', prod_est='$prod_est'  WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../../bootstrap/js/jquery-3.1.1.min.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>¡Datos guardados!</h3>
				<?php } else { ?>
				<h3>Error al guardar</h3>
				<?php } ?>
				
				<a href="admin_crud_poz.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
