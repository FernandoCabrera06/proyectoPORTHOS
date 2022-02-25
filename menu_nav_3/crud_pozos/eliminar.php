<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: ../../in_out/login.php');
            
        }
    }
?>
<?php
	
	require '../../db/conexion_crud.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM pozos WHERE id = '$id'";
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
				<h3>¡Pozo eliminado!</h3>
				<?php } else { ?>
				<h3>Error al intentar eliminar pozo</h3>
				<?php } ?>
				
				<a href="admin_crud_poz.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
 