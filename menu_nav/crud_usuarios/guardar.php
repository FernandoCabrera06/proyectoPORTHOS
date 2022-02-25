<?php

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../in_out/login.php');
    }else{
        if($_SESSION['rol'] != 4){
            header('location: ../in_out/login.php');
            
        }
    }
?>
<?php
	
	require '../../db/conexion_crud.php';
	
	$username = $_POST['username'];
	$dni = $_POST['dni'];
	$sso = $_POST['sso'];
	$rol_id = $_POST['rol_id'];
	$cargo = $_POST['cargo'];
	$num_tel = $_POST['num_tel'];
	
	$sql = "INSERT INTO usuarios (username, dni, sso, rol_id, cargo, num_tel) VALUES ('$username', '$dni', '$sso', '$rol_id', '$cargo', '$num_tel')";
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
						
					<?php echo $sql; } ?>
					
					<a href="admin_crud_usu.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
