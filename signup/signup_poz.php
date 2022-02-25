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

  include '../db/database.php';

  $message = '';

  if (!empty($_POST['nombre']) && !empty($_POST['ip'])){

    $db = new Database();
    $sql = "INSERT INTO pozos (nombre, ip, net_mask, gw, prod_est) VALUES (:nombre, :ip, :net_mask, :gw, :prod_est)";
    $stmt = $db->connect()->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':ip', $_POST['ip']);
    $stmt->bindParam(':net_mask', $_POST['net_mask']);
    $stmt->bindParam(':gw', $_POST["gw"]);
    $stmt->bindParam(':prod_est', $_POST["prod_est"]);
    $stmt->execute();
  }else{
   echo "los campos nombre e IP no pueden estar vacios";
  }
?>


<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../bootstrap/js/jquery-3.1.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../bootstrap/css/styles/signup_usu.css">	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($stmt) { ?>
						<h3>¡Pozo creado con éxito!</h3>
						<?php } else { ?>
						<h3 class="error_crear">Error al crear pozo</h3>
						
					<?php } ?>
					
					<a href="../menu_nav/crud_pozos/admin_crud_poz.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>

