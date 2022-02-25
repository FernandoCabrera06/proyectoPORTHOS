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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../../icons/favicon.ico">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../../bootstrap/css/styles/admin_crud_usu.css">
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<script src="../../bootstrap/js/jquery-3.1.1.min.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script>		
</head>
<body>

<ul class="menu">
<li><a class="IconObs" href="../search_obs/index.php">Observación</a></li>
<li><a class="IconAju" href="../search_aju/index.php">Ajustes de Pozos</a></li>
<li><a class="IconPoz" a href="../crud_pozos/admin_crud_poz.php">Pozos</a></li>
<li><a class="IconUsu" href="#">Usuarios</a></li>
<li><a class="IconSes" href="../user_records/records.php">Registro de Sesiones</a></li>
<li class="dividir"><a href="../../in_out/logout.php" >Cerrar Sesión</a></li>
</ul>

<br><br><br>

	
<div class="container">
			<div class="row">
				<h2 style="text-align:center">Gestión de usuarios</h2>
			
			</div>
			
			<div class="row">
				<a href="../../signup/registro_usu.php" class="btn btn-success">+ Añadir usuario</a>
				
				<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
				<br>
					<b>Buscar: </b><input type= "text" id="caja_busqueda" name="caja_busqueda" style="width: 13.5em;"  placeholder=" Nombre o Nº SSO o Nº DNI"/>
				</form>
			</div>
			
			<br>
			
			<div id="datos"></div>
			
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar usuario</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este usuario?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Si, Eliminar</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		<script type="text/javascript" src="../../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../bootstrap/js/main.js"></script>
	</body>
</html>	