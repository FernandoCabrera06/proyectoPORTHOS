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
	require '../../db/conexion_crud.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
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
				
				<h2 style="text-align:center">Modificar datos de usuario</h2>
				<br>
				<br>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">

					<label for="username" class="col-xs-2 col-sm-offset-2" control-label>Nombre</label>

					<div class="col-xs-5">

					<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="ingrese nombre" oninvalid="setCustomValidity('El campo nombre es obligatorio')" oninput="setCustomValidity('')" required/>
					
					</div>
				</div>

                <div class="form-group">

					<label for="dni" class="col-xs-2 col-sm-offset-2" control-label>Nº de DNI</label>

					<div class="col-xs-5">

					<input type="text" class="form-control" id="dni" name="dni" value="<?php echo $row['dni']; ?>" placeholder="ingrese DNI" oninvalid="setCustomValidity('El campo DNI es obligatorio')" oninput="setCustomValidity('')" required/>
					
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

				<div class="form-group">

			<label for="cargo" class="col-xs-2 col-sm-offset-2" control-label>Cargo</label>

				<div class="col-xs-5">

				<select name="cargo" class="form-control">
				<?php 
								if($row['cargo']== 1){
									$cargo ='Asistente';
								}else{
									if($row['cargo']== 2){
										$cargo ='Operador';
								}else{
									if($row['cargo']== 3){
										$cargo ='Supervisor';
								}else{
									if($row['cargo']== 4){
										$cargo ='Ingeniero';
									}else{
										if($row['cargo']== 5){
											$cargo ='Otros';
										}}}}}?>
				<?php 
								$cargo_num= $row['cargo'];?>

				<option value="<?php echo $cargo_num?>" hidden><?php echo $cargo." (opción asignada)"; ?></option>
				<option value="1">Asistente</option> 
				<option value="2">Operador</option> 
				<option value="3">Supervisor</option>
				<option value="4">Ingeniero</option>  
				<option value="5">Otros</option>  
				</select>
				</div>
				</div>
				
				<div class="form-group">

					<label for="sso" class="col-xs-2 col-sm-offset-2" control-label>Nº de SSO</label>

					<div class="col-xs-5" >

						<input type="varchar" class="form-control" id="sso" name="sso" placeholder="ingrese Nº de SSO" value="<?php echo $row['sso']; ?>">
					</div>
				</div>
				<div class="form-group">

				<label for="num_tel" class="col-xs-2 col-sm-offset-2" control-label>Nº de teléfono</label>

					<div class="col-xs-5" >

						<input type="varchar" class="form-control" id="num_tel" name="num_tel" placeholder="ingrese Nº de teléfono" value="<?php echo $row['num_tel']; ?>">
					</div>
				</div>

				<div class="form-group">

				<label for="rol_id" class="col-xs-2 col-sm-offset-2" control-label>Nivel de seguridad</label>

				<div class="col-xs-5">

				<select name="rol_id" class="form-control">
				<?php 
								if($row['rol_id']== 1){
									$rol ='Observador';
								}else{
									if($row['rol_id']== 2){
										$rol ='Usuario Operador';
								}else{
									if($row['rol_id']== 3){
										$rol ='Usuario Avanzado';
								}else{
									if($row['rol_id']== 4){
										$rol ='Administrador';
								}}}}?>
				<?php 
								$rol_num= $row['rol_id'];?>

				<option value="<?php echo $rol_num?>" hidden><?php echo $rol." (opción asignada)"; ?></option>
				<option value="1">Observador</option> 
				<option value="2">Usuario Operador</option> 
				<option value="3">Usuario Avanzado</option>
				<option value="4">Administrador</option>  
				</select>
 				</div>
				 </div>
				<br>
				<div>
					<div style="text-align:center">
						<a href="admin_crud_usu.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>