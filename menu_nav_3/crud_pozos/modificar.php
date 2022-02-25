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
	
	$sql = "SELECT * FROM pozos WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
				
				<h2 style="text-align:center">Modificar datos de pozos</h2>
				<br>
				<br>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				
			
			
			<div class="form-group">

					<label for="nombre" class="col-xs-2 col-sm-offset-2" control-label>Nombre</label>

			<div class="col-xs-5">

					<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="ingrese nombre" oninvalid="setCustomValidity('El campo nombre es obligatorio')" oninput="setCustomValidity('')" required/>
					
			</div>
			</div>



				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />



			<div class="form-group">

				<label for="ip" class="col-xs-2 col-sm-offset-2" control-label>Nº IP</label>

			<div class="col-xs-5" >

			<input type="varchar" class="form-control" id="ip" name="ip" placeholder="ingrese N° de IP" value="<?php echo $row['ip']; ?>" oninvalid="setCustomValidity('El campo IP es obligatorio')" oninput="setCustomValidity('')" required/>
			</div>
			</div>


			<div class="form-group">

				<label for="net_mask" class="col-xs-2 col-sm-offset-2" control-label>Máscara de subred</label>

			<div class="col-xs-5" >

			<input type="varchar" class="form-control" id="net_mask" name="net_mask" placeholder="ingrese máscara de subred" value="<?php echo $row['net_mask']; ?>">
			
			</div>
			</div>
				 
			<div class="form-group">

				<label for="gw" class="col-xs-2 col-sm-offset-2" control-label>Puerta de enlace</label>

			<div class="col-xs-5" >

			<input type="varchar" class="form-control" id="gw" name="gw" placeholder="ingrese puerta de enlace" value="<?php echo $row['gw']; ?>">

			</div>
			</div>
			<div class="form-group">

				<label for="prod_est" class="col-xs-2 col-sm-offset-2" control-label>Producción estimada</label>

			<div class="col-xs-5" >

			<input type="varchar" class="form-control" id="prod_est" name="prod_est" placeholder="ingrese producción estimada del pozo" value="<?php echo $row['prod_est']; ?>">

			</div>
			</div>
				<br>
				<div>
					<div style="text-align:center">
						<a href="admin_crud_poz.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>